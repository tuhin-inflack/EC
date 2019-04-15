<?php
/**
 * Created by PhpStorm.
 * User: bs-205
 * Date: 03/04/19
 * Time: 16:40
 */

namespace Modules\RMS\Services;


use App\Constants\WorkflowStatus;
use App\Entities\workflow\WorkflowMaster;
use App\Services\Sharing\ShareConversationService;
use App\Services\UserService;
use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkflowMasterService;
use App\Services\workflow\WorkflowService;
use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\RMS\Entities\ResearchDetailSubmission;
use Modules\RMS\Entities\ResearchDetailSubmissionAttachment;
use Modules\RMS\Repositories\ResearchDetailSubmissionRepository;
use Prophecy\Doubler\Generator\TypeHintReference;

class ResearchDetailSubmissionService
{
    use CrudTrait;
    use FileTrait;
    /**
     * @var ResearchDetailSubmissionRepository
     */
    private $researchDetailSubmissionRepository;

    /*
     * @var featureService;
     */
    private $featureService;
    private $workflowService;
    private $userService;
    private $workflowMasterService;
    private $shareConversationService;

    /**
     * ResearchDetailSubmissionService constructor.
     * @param ResearchDetailSubmissionRepository $researchDetailSubmissionRepository
     */

    public function __construct(ResearchDetailSubmissionRepository $researchDetailSubmissionRepository, FeatureService $featureService,
                                WorkflowService $workflowService, UserService $userService,
                                WorkflowMasterService $workflowMasterService, ShareConversationService $shareConversationService)
    {
        $this->researchDetailSubmissionRepository = $researchDetailSubmissionRepository;
        $this->featureService = $featureService;
        $this->workflowService = $workflowService;
        $this->userService = $userService;
        $this->workflowMasterService = $workflowMasterService;
        $this->shareConversationService = $shareConversationService;
        $this->setActionRepository($this->researchDetailSubmissionRepository);
    }

    public function storeResearchDetails($data, $divisionalDirector)
    {
        return DB::transaction(function () use ($data, $divisionalDirector) {
            $data['status'] = 'PENDING';
            $data['auth_user_id'] = Auth::user()->id;

            $researchDetailSubmission = $this->save($data);

            foreach ($data['attachments'] as $file) {
                $fileName = $file->getClientOriginalName();
                $path = $this->upload($file, 'research-detail-submissions');

                $file = new ResearchDetailSubmissionAttachment([
                    'attachments' => $path,
                    'research_detail_invitation_id' => $researchDetailSubmission->id,
                    'file_name' => $fileName
                ]);
                $researchDetailSubmission->researchDetailSubmissionAttachment()->save($file);
            }


//            //Save workflow

            $featureName = config('rms.research_proposal_detail_feature');
            $feature = $this->featureService->findBy(['name' => $featureName])->first();

            $workflowData = [
                'feature_id' => $feature->id,
                'rule_master_id' => $feature->workflowRuleMaster->id,
                'ref_table_id' => $researchDetailSubmission->id,
                'message' => $data['message'],
                'designationTo' => [1 => $divisionalDirector->designation_id]
            ];

            if ($this->isProposalSubmitFromResearchDept()) {
                $workflowData['skipped'] = [1];
            }
//            dd($workflowData);
            $this->workflowService->createWorkflow($workflowData);
//
//            //Send Notifications
//            $notificationData = [
//                'ref_table_id' => $proposalSubmission->id,
//                'message' => Config::get('rms-notification.research_proposal_submitted'),
//                'to_users_designation' => Config::get('constants.research_proposal_submission'),
//
//            ];
//            event(new NotificationGeneration(new NotificationInfo(NotificationType::RESEARCH_PROPOSAL_SUBMISSION, $notificationData)));


            return $researchDetailSubmission;
        });
    }

    private function isProposalSubmitFromResearchDept()
    {
        return $this->userService->isResearchDivisionUser(Auth::user());
    }

    public function researchDetailApproved($shareAndProposalDetailId)
    {

//        foreach ($shareAndProposalDetailIds as $shareAndProposalId) {
            $shareConversationId = explode('-', $shareAndProposalDetailId)[0];
            $researchProposalDetailId = explode('-', $shareAndProposalDetailId)[1];
            $workflowMaster = $this->workflowMasterService->findBy(['ref_table_id' => $researchProposalDetailId])->first();
            //approving workflow
            $this->workflowService->approveWorkflow($workflowMaster->id);
            //closing share conversation
            $this->shareConversationService->updateConversation(['ref_table_id' => $researchProposalDetailId], $shareConversationId);

            //update main item
            $researchDetail = $this->researchDetailSubmissionRepository->findOne($researchProposalDetailId);
            $researchDetail->update(['status' => WorkflowStatus::APPROVED]);

//        }
    }

    public function researchDetailReject($shareAndProposalIds)
    {
            $shareConversationId = explode('-', $shareAndProposalIds)[0];
            $researchProposalId = explode('-', $shareAndProposalIds)[1];

            //closing workflow
            $workflowMaster = $this->workflowMasterService->findBy(['ref_table_id' => $researchProposalId])->first();
            $this->workflowService->closeWorkflow($workflowMaster->id);

            //closing share conversation
            $this->shareConversationService->updateConversation(['ref_table_id' => $researchProposalId], $shareConversationId);

            //update main item
            $researchProposal = $this->researchDetailSubmissionRepository->findOne($researchProposalId);
            $researchProposal->update(['status' => WorkflowStatus::REJECTED]);
    }

    public function updateReInitiate(array $data, $researchDetailId)
    {
        return DB::transaction(function () use ($data, $researchDetailId) {
            $data['status'] = 'PENDING';
            $researchDetail = $this->researchDetailSubmissionRepository->findOne($researchDetailId);
            $proposalSubmission = $researchDetail->update($data);

            foreach ($data['attachments'] as $file) {

                $fileName = $file->getClientOriginalName();
                $path = $this->upload($file, 'research-submissions');

                $file = new ResearchDetailSubmissionAttachment([
                    'attachments' => $path,
                    'research_detail_submission_id' => $researchDetailId,
                    'file_name' => $fileName
                ]);

                $researchDetail->researchDetailSubmissionAttachment()->save($file);
            }
            $DetailFeatureName = config('rms.research_proposal_detail_feature');
            $feature = $this->featureService->findBy(['name' => $DetailFeatureName])->first();

            $reInitializeData = [
                'feature_id' => $feature->id,
                'ref_table_id' => $researchDetailId,
                'message' => $data['message'],
            ];

            $this->workflowService->reinitializeWorkflow($reInitializeData);

            //Send Notifications
//            $notificationData = [
//                'ref_table_id' => $researchDetail->id,
//                'message' => Config::get('rms-notification.research_proposal_reinitiated'),
//                'to_users_designation' => Config::get('constants.research_proposal_submission'),
//                'url' => $this->reviewUrlGenerator->getReviewUrl(
//                    'research-proposal-details/review',
//                    $feature,
//                    $researchDetail
//                ),
//            ];
//            event(new NotificationGeneration(new NotificationInfo(NotificationType::RESEARCH_PROPOSAL_SUBMISSION, $notificationData)));
            return new Response(trans('rms::research_proposal.re_initiate_success'));
        });
    }

    public function getZipFilePath(ResearchDetailSubmission $researchDetailSubmission)
    {
        $filePaths = $researchDetailSubmission->researchDetailSubmissionAttachment->map(function($attachment) {
            return Storage::disk('internal')->path($attachment->attachments);
        })->toArray();

        $fileName = time() . '.zip';

        $zipFilePath = Storage::disk('internal')->getAdapter()->getPathPrefix() . $fileName;

        Zipper::make($zipFilePath)->add($filePaths)->close();

        return $zipFilePath;
    }

    public function getResearchDetailProposalForUser(User $user)
    {
        return $this->researchDetailSubmissionRepository->findAll()
            ->filter(function ($researchDetailProposal) use ($user){

                return $user->employee->designation->short_name == "DG"
                    || ($user->employee->employeeDepartment->department_code == "RMS"
                        && $user->employee->designation->short_name != "FM")
                    || ($user->employee->designation->short_name == "FM"
                        && $researchDetailProposal->auth_user_id == $user->id);
            });
    }
}