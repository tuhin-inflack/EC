<?php
/**
 * Created by PhpStorm.
 * User: tuhin
 * Date: 10/18/18
 * Time: 5:18 PM
 */

namespace Modules\PMS\Services;

use App\Constants\NotificationType;
use App\Entities\User;
use App\Entities\workflow\WorkflowMaster;
use App\Events\NotificationGeneration;
use App\Models\NotificationInfo;
use App\Services\Notification\ReviewUrlGenerator;
use App\Services\Remark\RemarkService;
use App\Services\Sharing\ShareConversationService;
use App\Services\UserService;
use App\Services\workflow\DashboardWorkflowService;
use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkFlowConversationService;
use App\Services\workflow\WorkflowMasterService;
use App\Services\workflow\WorkflowService;
use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\HRM\Services\EmployeeServices;
use Modules\PMS\Entities\ProjectProposal;
use Modules\PMS\Entities\ProjectProposalFile;
use Modules\PMS\Repositories\ProjectProposalRepository;
use Illuminate\Support\Facades\Session;

class ProjectProposalService
{
    use CrudTrait;
    use FileTrait;
    private $projectProposalRepository;
    private $featureService;
    private $workflowService;
    private $userService;
    private $dashboardService;
    private $employeeService;
    private $shareConversationService;
    private $remarkService;
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

    /**
     * ProjectRequestService constructor.
     * @param ProjectDetailProposalRepository $projectProposalRepository
     * @param FeatureService $featureService
     * @param WorkflowService $workflowService
     * @param UserService $userService
     * @param ReviewUrlGenerator $reviewUrlGenerator
     */

    public function __construct(
        ProjectProposalRepository $projectProposalRepository,
        FeatureService $featureService,
        WorkflowService $workflowService,
        UserService $userService,
        ReviewUrlGenerator $reviewUrlGenerator,
        EmployeeServices $employeeService,
        ShareConversationService $shareConversationService,
        RemarkService $remarkService,
        WorkflowMasterService $workflowMasterService
    )
    {
        $this->projectProposalRepository = $projectProposalRepository;
        $this->workflowService = $workflowService;
        $this->featureService = $featureService;
        $this->userService = $userService;
        $this->employeeService = $employeeService;
        $this->shareConversationService = $shareConversationService;
        $this->remarkService = $remarkService;
        $this->workflowMasterService = $workflowMasterService;

        $this->setActionRepository($projectProposalRepository);
        $this->reviewUrlGenerator = $reviewUrlGenerator;
    }

    /**
     * @param User $user
     * @return \App\Repositories\Contracts\Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getProposalsForUser(User $user)
    {
        if ($this->userService->isDirectorGeneral() || $this->userService->isProjectDivisionUser($user)) {
            return $this->findAll();
        } else {
            return $this->findBy(['auth_user_id' => $user->id]);
        }
    }

    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {
            $data['status'] = 'PENDING';

            $proposalSubmission = $this->save($data);

            foreach ($data['attachments'] as $file) {
                $fileName = $file->getClientOriginalName();
                $path = $this->upload($file, 'project-submissions');

                $file = new ProjectProposalFile([
                    'proposal_id' => $proposalSubmission->id,
                    'attachments' => $path,
                    'file_name' => $fileName
                ]);

                $proposalSubmission->projectProposalFiles()->save($file);
            }

            // Initiating Workflow
            $divisionalDirector = $this->employeeService->getDivisionalDirectorByDepartmentId(Auth::user()->employee->department_id);
            if(is_null($divisionalDirector)) {
                Session::flash('error', 'Divisional Director is not defined for your department');
                return redirect()->back();
            }
            $featureName = config('constants.project_proposal_feature_name');
            $feature = $this->featureService->findBy(['name' => $featureName])->first();
            $workflowData = [
                'feature_id' => $feature->id,
                'rule_master_id' => $feature->workflowRuleMaster->id,
                'ref_table_id' => $proposalSubmission->id,
                'message' => $data['message'],
                'designationTo' => ['1'=> $divisionalDirector->designation_id] ,
            ];
            if($this->userService->isProjectDivisionUser(Auth::user())) $workflowData['skipped'] = [1];
            $this->workflowService->createWorkflow($workflowData);
            // Workflow initiate done

            //Generating Notification
            $this->generatePMSNotification(
                [
                    'ref_table_id' => $proposalSubmission->id,
                    'status' => 'SUBMITTED'
                ],
                'project_proposal_submission',
                $this->reviewUrlGenerator->getReviewUrl(
                    'project-proposal-submitted-review',
                    $feature,
                    $proposalSubmission
                )
            );
            // Notification generation done

            return $proposalSubmission;
        });
    }

    public function getProposalById($id)
    {
        $proposal = $this->findOne($id);
        if (is_null($proposal)) {
            abort(404);
        } else {
            return $proposal;
        }
    }

    public function getZipFilePath($proposalId)
    {
        $researchProposal = $this->findOne($proposalId);

        $filePaths = $researchProposal->projectProposalFiles->map(function ($attachment) {
            return Storage::disk('internal')->path($attachment->attachments);
        })->toArray();

        $fileName = time() . '.zip';

        $zipFilePath = Storage::disk('internal')->getAdapter()->getPathPrefix() . $fileName;

        Zipper::make($zipFilePath)->add($filePaths)->close();

        return $zipFilePath;
    }

    public function getProjectProposalByStatus()
    {
        $projectProposal = new ProjectProposal();
        return [
            $projectProposal->where('status', '=', 'pending')->count(),
            $projectProposal->where('status', '=', 'in progress')->count(),
            $projectProposal->where('status', '=', 'reviewed')->count()
        ];
    }

    public function getProjectProposalBySubmissionDate()
    {
        return ProjectProposal::orderBy('id', 'DESC')->limit(5)->get();
    }

    public function bulkReviewFeedbackUpdate($data)
    {
        foreach ($data['id'] as $approval)
        {
            $idArray = explode('-',$approval);
            $shareConvId = $idArray[0];
            $proposalId = $idArray[1];
            $wfMaster = $this->workflowMasterService->findBy(['ref_table_id' => $proposalId])[0];
            if($data['status'] == 'APPROVED') $this->workflowService->approveWorkflow($wfMaster->id); elseif($data['status'] == 'REJECTED') $this->workflowService->closeWorkflow($wfMaster->id);
            $this->shareConversationService->updateConversation(['ref_table_id' => $proposalId], $shareConvId);

            //$this->remarkService->save(['feature_id' => $wfMaster->feature_id, 'ref_table_id' => $proposalId, 'from_user_designation' => $this->userService->getDesignationId(Auth::user()->username)]);

            $item = $this->findOne($proposalId);
            $item->update(['status' => $data['status']]);
        }
    }

    // Methods for triggering notifications
    public function generatePMSNotification($notificationData, $event, $url): void
    {
        $projectProposal = $this->findOne($notificationData['ref_table_id']);
        $activityBy = (array_key_exists('activity_by', $notificationData)) ? $notificationData['activity_by'] : $this->userService->getDesignation(Auth::user()->username);
        $dynamicValues['notificationData'] = [
            'ref_table_id' => $notificationData['ref_table_id'],
            'from_user_id' => Auth::user()->id,
            'message' => $projectProposal->title . ' has been ' . $notificationData['status'] . ' by ' . $activityBy,
            'is_read' => 0,
            'url' => $url
        ];
        $dynamicValues['event'] = $event;
        event(new NotificationGeneration(new NotificationInfo(NotificationType::PROJECT_PROPOSAL_SUBMISSION, $dynamicValues)));
    }
}
