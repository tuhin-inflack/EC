<?php

namespace Modules\RMS\Services;

use App\Constants\DesignationShortName;
use App\Constants\NotificationType;
use App\Constants\WorkflowStatus;
use App\Entities\User;
use App\Events\NotificationGeneration;
use App\Models\NotificationInfo;
use App\Services\Notification\ReviewUrlGenerator;
use App\Services\Sharing\ShareConversationService;
use App\Services\UserService;
use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkFlowConversationService;
use App\Services\workflow\WorkflowMasterService;
use App\Services\workflow\WorkflowService;
use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\HRM\Repositories\EmployeeRepository;
use Modules\RMS\Entities\ResearchProposalSubmission;
use Modules\RMS\Entities\ResearchProposalSubmissionAttachment;
use Modules\RMS\Repositories\ResearchProposalSubmissionRepository;


class ResearchProposalSubmissionService
{
    use CrudTrait;
    use FileTrait;

    private $researchProposalSubmissionRepository;
    private $workflowService;
    private $featureService;
    private $userService;
    /**
     * @var WorkflowMasterService
     */
    private $workflowMasterService;
    /**
     * @var WorkFlowConversationService
     */
    private $workFlowConversationService;
    /**
     * @var ReviewUrlGenerator
     */
    private $reviewUrlGenerator;
    /*
     * @var $
     */
    private $employeeRepository;

    private $shareConversationService;

    /**
     * ResearchProposalSubmissionService constructor.
     * @param ResearchProposalSubmissionRepository $researchProposalSubmissionRepository
     * @param WorkflowService $workflowService
     * @param FeatureService $featureService
     * @param UserService $userService
     * @param ReviewUrlGenerator $reviewUrlGenerator
     */
    public function __construct(
        ResearchProposalSubmissionRepository $researchProposalSubmissionRepository, WorkflowService $workflowService,
        FeatureService $featureService, UserService $userService, ReviewUrlGenerator $reviewUrlGenerator,
        EmployeeRepository $employeeRepository, WorkflowMasterService $workflowMasterService, ShareConversationService $shareConversationService)
    {
        $this->researchProposalSubmissionRepository = $researchProposalSubmissionRepository;
        $this->workflowService = $workflowService;
        $this->featureService = $featureService;
        $this->userService = $userService;
        $this->setActionRepository($researchProposalSubmissionRepository);
        $this->reviewUrlGenerator = $reviewUrlGenerator;
        $this->employeeRepository = $employeeRepository;
        $this->workflowMasterService = $workflowMasterService;
        $this->shareConversationService = $shareConversationService;
    }

    public function store(array $data, $divisionalDirector)
    {
        return DB::transaction(function () use ($data, $divisionalDirector) {
            $data['status'] = 'PENDING';

            $proposalSubmission = $this->save($data);

            foreach ($data['attachments'] as $file) {
                $fileName = $file->getClientOriginalName();
                $path = $this->upload($file, 'research-submissions');

                $file = new ResearchProposalSubmissionAttachment([
                    'attachments' => $path,
                    'submissions_id' => $proposalSubmission->id,
                    'file_name' => $fileName
                ]);

                $proposalSubmission->researchProposalSubmissionAttachments()->save($file);
            }

            //Save workflow

            $featureName = Config::get('constants.research_proposal_feature_name');
            $feature = $this->featureService->findBy(['name' => $featureName])->first();

            $workflowData = [
                'feature_id' => $feature->id,
                'rule_master_id' => $feature->workflowRuleMaster->id,
                'ref_table_id' => $proposalSubmission->id,
                'message' => $data['message'],
                'designationTo' => [1 => $divisionalDirector->designation_id]
            ];
            if ($this->isProposalSubmitFromResearchDept()) {
                $workflowData['skipped'] = [1];
            }
            $this->workflowService->createWorkflow($workflowData);

            //Send Notifications
            $notificationData = [
                'ref_table_id' => $proposalSubmission->id,
                'message' => Config::get('rms-notification.research_proposal_submitted'),
                'to_users_designation' => Config::get('constants.research_proposal_submission'),
                'url' => $this->reviewUrlGenerator->getReviewUrl(
                    'research-proposal-submission-review',
                    $feature,
                    $proposalSubmission
                ),
            ];
            event(new NotificationGeneration(new NotificationInfo(NotificationType::RESEARCH_PROPOSAL_SUBMISSION, $notificationData)));


            return $proposalSubmission;
        });
    }

    public function getAll()
    {
        return $this->researchProposalSubmissionRepository->findAll();
    }

    public function updateRequest(array $data, ResearchProposalSubmission $researchProposalSubmission)
    {
        return DB::transaction(function () use ($data, $researchProposalSubmission) {
            $data['status'] = 'PENDING';
            $proposalSubmission = $this->update($researchProposalSubmission, $data);

            foreach ($data['attachments'] as $file) {
                $fileName = $file->getClientOriginalName();
                $path = $this->upload($file, 'research-submissions');

                $file = new ResearchProposalSubmissionAttachment([
                    'attachments' => $path,
                    'submissions_id' => $researchProposalSubmission->id,
                    'file_name' => $fileName
                ]);

                $researchProposalSubmission->researchProposalSubmissionAttachments()->save($file);
            }
            return $proposalSubmission;
        });
    }

    public function getZipFilePath($proposalId)
    {
        $researchProposal = $this->findOne($proposalId);

        $filePaths = $researchProposal->researchProposalSubmissionAttachments->map(function ($attachment) {
            return Storage::disk('internal')->path($attachment->attachments);
        })->toArray();

        $fileName = time() . '.zip';

        $zipFilePath = Storage::disk('internal')->getAdapter()->getPathPrefix() . $fileName;

        Zipper::make($zipFilePath)->add($filePaths)->close();

        return $zipFilePath;
    }

    public function updateReInitiate(array $data, $researchProposalId)
    {
        return DB::transaction(function () use ($data, $researchProposalId) {
            $data['status'] = 'PENDING';
            $researchProposal = $this->researchProposalSubmissionRepository->findOne($researchProposalId);
            $proposalSubmission = $researchProposal->update($data);

            foreach ($data['attachments'] as $file) {

                $fileName = $file->getClientOriginalName();
                $path = $this->upload($file, 'research-submissions');

                $file = new ResearchProposalSubmissionAttachment([
                    'attachments' => $path,
                    'submissions_id' => $researchProposalId,
                    'file_name' => $fileName
                ]);

                $researchProposal->researchProposalSubmissionAttachments()->save($file);
            }
            $featureName = Config::get('constants.research_proposal_feature_name');
            $feature = $this->featureService->findBy(['name' => $featureName])->first();

            $reInitializeData = [
                'feature_id' => $feature->id,
                'ref_table_id' => $researchProposalId,
                'message' => $data['message'],
            ];

            $this->workflowService->reinitializeWorkflow($reInitializeData);

            //Send Notifications
            $notificationData = [
                'ref_table_id' => $researchProposal->id,
                'message' => Config::get('rms-notification.research_proposal_reinitiated'),
                'to_users_designation' => Config::get('constants.research_proposal_submission'),
                'url' => $this->reviewUrlGenerator->getReviewUrl(
                    'research-proposal-submission-review',
                    $feature,
                    $researchProposal
                ),
            ];
            event(new NotificationGeneration(new NotificationInfo(NotificationType::RESEARCH_PROPOSAL_SUBMISSION, $notificationData)));
            return new Response(trans('rms::research_proposal.re_initiate_success'));
        });
    }

    public function closeWorkflow($workflowMasterId)
    {
        $response = $this->workflowService->closeWorkflow($workflowMasterId);
        return Response(trans('labels.research_closed'));
    }

    public function getResearchProposalByStatus()
    {
        $projectProposalSubmission = new ResearchProposalSubmission();
        return [
            $projectProposalSubmission->where('status', '=', 'pending')->count(),
            $projectProposalSubmission->where('status', '=', 'in progress')->count(),
            $projectProposalSubmission->where('status', '=', 'reviewed')->count()
        ];
    }

    public function getResearchProposalBySubmissionDate()
    {
        return ResearchProposalSubmission::orderBy('id', 'DESC')
            ->limit(5)
            ->get()
            ->filter(function ($researchProposal) {

                return auth()->user()->employee->designation->short_name == "DG"
                    || (auth()->user()->employee->employeeDepartment->department_code == "RMS"
                        && auth()->user()->employee->designation->short_name != "FM")
                    || ($researchProposal->auth_user_id == auth()->user()->id);
            });
    }

    public function apcApproved($status, $researchProposalSubmissionId)
    {
        $researchProposal = $this->findOne($researchProposalSubmissionId);
        $researchProposal->update(['status' => $status]);

        //Send Notifications
        $notificationData = [
            'ref_table_id' => $researchProposalSubmissionId,
            'proposal_id' => $researchProposalSubmissionId,
            'to_users_designation' => Config::get('constants.research_approved_apc'),

        ];
        if ($status == WorkflowStatus::REJECTED) {
            $notificationData['message'] = Config::get('rms-notification.research_proposal_rejected_from_apc');
        } else {
            $notificationData['message'] = Config::get('rms-notification.research_proposal_approved_from_apc');
        }

        event(new NotificationGeneration(new NotificationInfo(NotificationType::RESEARCH_PROPOSAL_SUBMISSION, $notificationData)));


        return Response(trans('labels.apc_approved_message'));

    }

    //send notification while review, approve & short list for apc. called from @ProposalSubmissionController
    public function sendNotification($request)
    {

        $loggedInUserDesignationShortName = $this->userService->getLoggedInUser()->employee->designation->short_name;
        $messageBy = ' by ' . $this->userService->getLoggedInUser()->name;
        $notificationData = [
            'ref_table_id' => $request->item_id,
            'proposal_id' => $request->item_id, //sending notification to initiator

        ];
        if ($request->status == WorkflowStatus::REJECTED) {
            $notificationData['message'] = config('rms-notification.research-proposal-review');
            $notificationData['to_users_designation'] = config('constants.research_proposal_send_back');
        }
        if ($request->status == WorkflowStatus::APPROVED) {
            if (DesignationShortName::RD == $loggedInUserDesignationShortName) {
                $notificationData['message'] = config('rms-notification.research_proposal_shortlisted_for_apc') . $messageBy;
                $notificationData['to_users_designation'] = Config::get('constants.research_short_listed');

            } else {
                $notificationData['message'] = config('rms-notification.research_proposal_approved') . $messageBy;
                $notificationData['to_users_designation'] = Config::get('constants.research_proposal_approved');

            }
        } else {
            $notificationData['message'] = $request->message;
        }
        $notificationData['url'] = $request['url'];
        event(new NotificationGeneration(new NotificationInfo(NotificationType::RESEARCH_PROPOSAL_SUBMISSION, $notificationData)));
    }

    public function getResearchProposalForUser(User $user)
    {
        return $this->researchProposalSubmissionRepository->findAll()
            ->filter(function ($researchProposal) use ($user) {

                return $user->employee->designation->short_name == "DG"
                    || ($user->employee->employeeDepartment->department_code == "RMS"
                        && $user->employee->designation->short_name != "FM")
                    || ($researchProposal->auth_user_id == $user->id);
            });
    }

    public function researchProposalApproved($shareAndProposalIds)
    {
            $shareConversationId = explode('-', $shareAndProposalIds)[0];
            $researchProposalId = explode('-', $shareAndProposalIds)[1];

            $workflowMaster = $this->workflowMasterService->findBy(['ref_table_id' => $researchProposalId])->first();
            //approving workflow
            $this->workflowService->approveWorkflow($workflowMaster->id);
            //closing share conversation
            $this->shareConversationService->updateConversation(['ref_table_id' => $researchProposalId], $shareConversationId);

            //update main item
            $researchProposal = $this->researchProposalSubmissionRepository->findOne($researchProposalId);
            $researchProposal->update(['status' => WorkflowStatus::APPROVED]);
    }

    public function researchProposalReject($shareAndProposalIds)
    {
            $shareConversationId = explode('-', $shareAndProposalIds)[0];
            $researchProposalId = explode('-', $shareAndProposalIds)[1];

            //closing workflow
            $workflowMaster = $this->workflowMasterService->findBy(['ref_table_id' => $researchProposalId])->first();
            $this->workflowService->closeWorkflow($workflowMaster->id);

            //closing share conversation
            $this->shareConversationService->updateConversation(['ref_table_id' => $researchProposalId], $shareConversationId);

            //update main item
            $researchProposal = $this->researchProposalSubmissionRepository->findOne($researchProposalId);
            $researchProposal->update(['status' => WorkflowStatus::REJECTED]);
    }

    private function isProposalSubmitFromResearchDept()
    {
        return $this->userService->isResearchDivisionUser(Auth::user());
    }
}
