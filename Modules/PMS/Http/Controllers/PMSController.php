<?php

namespace Modules\PMS\Http\Controllers;

use App\Constants\DesignationShortName;
use App\Constants\WorkflowStatus;
use App\Repositories\workflow\WorkflowRuleDetailRepository;
use App\Services\Notification\ReviewUrlGenerator;
use App\Services\Remark\RemarkService;
use App\Services\Sharing\ShareConversationService;
use App\Services\Sharing\ShareRulesService;
use App\Services\UserService;
use App\Services\workflow\DashboardWorkflowService;
use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkflowService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use function Matrix\trace;
use Modules\HRM\Services\EmployeeServices;
use Modules\PMS\Http\Requests\CreateProposalSubmissionAttachmentRequest;
use Modules\PMS\Services\PMSService;
use Modules\PMS\Services\ProjectProposalReviewerAttachmentService;
use Modules\PMS\Services\ProjectProposalService;
use Modules\PMS\Services\ProjectRequestService;
use Illuminate\Support\Facades\Session;
use App\Constants\NotificationType;
use App\Events\NotificationGeneration;
use App\Models\NotificationInfo;


class PMSController extends Controller
{
    private $dashboardService;
    private $workflowService;
    private $remarksService;
    private $featureService;
    private $userService;
    private $shareRuleService;
    private $shareConversationService;
    private $employeeService;
    private $projectProposalReviewerAttachmentService;
    private $pmsService;

    /**
     * @var ProjectProposalService
     */
    private $projectProposalService;
    /**
     * @var ProjectRequestService
     */
    private $projectRequestService;
    /**
     * @var ReviewUrlGenerator
     */
    private $reviewUrlGenerator;

    /**
     * PMSController constructor.
     * @param DashboardWorkflowService $dashboardService
     * @param ProjectProposalService $projectProposalService
     * @param WorkflowService $workflowService
     * @param RemarkService $remarksService
     * @param FeatureService $featureService
     * @param ProjectRequestService $projectRequestService
     * @param UserService $userService
     * @param ShareRulesService $shareRuleService
     * @param ShareConversationService $shareConversationService
     * @param EmployeeServices $employeeService
     * @param ReviewUrlGenerator $reviewUrlGenerator
     * @param ProjectProposalReviewerAttachmentService $projectProposalReviewerAttachmentService
     */
    public function __construct(
        DashboardWorkflowService $dashboardService,
        ProjectProposalService $projectProposalService,
        WorkflowService $workflowService,
        RemarkService $remarksService, FeatureService $featureService,
        ProjectRequestService $projectRequestService,
        UserService $userService, ShareRulesService $shareRuleService,
        ShareConversationService $shareConversationService,
        EmployeeServices $employeeService,
        ReviewUrlGenerator $reviewUrlGenerator,
        ProjectProposalReviewerAttachmentService $projectProposalReviewerAttachmentService,
        PMSService $pmsService
    )
    {
        $this->dashboardService = $dashboardService;
        $this->projectRequestService = $projectRequestService;
        $this->projectProposalService = $projectProposalService;
        $this->workflowService = $workflowService;
        $this->remarksService = $remarksService;
        $this->featureService = $featureService;
        $this->userService = $userService;
        $this->shareRuleService = $shareRuleService;
        $this->shareConversationService = $shareConversationService;
        $this->employeeService = $employeeService;
        $this->projectProposalReviewerAttachmentService = $projectProposalReviewerAttachmentService;
        $this->reviewUrlGenerator = $reviewUrlGenerator;
        $this->pmsService = $pmsService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $chartData = $this->projectProposalService->getProjectProposalByStatus();
        $invitations = $this->projectRequestService->getProjectInvitationByDeadline();
        $proposals = $this->projectProposalService->getProjectProposalBySubmissionDate();
        $pendingTasks = $this->pmsService->getPendingTasks();
        $rejectedTasks = $this->pmsService->getRejectedTasks();
        $shareConversations = $this->pmsService->getShareConversations();
        if(Auth::user()->user_type == 'Employee')
        {
            $employee = $this->employeeService->findOne(Auth::user()->reference_table_id);
            $bulkAction = in_array($employee->designation->short_name, [DesignationShortName::DG]);
        }
        else $bulkAction = false;

        return view('pms::index', compact('pendingTasks', 'rejectedTasks', 'chartData', 'invitations',
            'proposals', 'shareConversations', 'bulkAction'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('pms::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('pms::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('pms::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    // Methods implemented for integrating workflow
    public function review($proposalId, $wfMasterId, $wfConvId, $feature_id, $ruleDetailsId, $viewOnly = 0)
    {
        $proposal = $this->projectProposalService->findOrFail($proposalId);
        $wfData = ['wfMasterId' => $wfMasterId, 'wfConvId' => $wfConvId];
        $remarks = $this->remarksService->findBy(['feature_id' => $feature_id, 'ref_table_id' => $proposal->id]);
        $ruleDetails = $this->workflowService->getRuleDetailsByRuleId($ruleDetailsId);

        if ($ruleDetails->is_shareable) {
            $shareRule = $this->shareRuleService->findOne($ruleDetails->share_rule_id);
            $wfConversation = $this->workflowService->getWorkflowConversationById($wfConvId);
            $wfDetailsId = $wfConversation->workflow_details_id;
        } else {
            $shareRule = [];
            $wfDetailsId = 0;
        };
        $authDesignation = $this->userService->getDesignationId(Auth::user()->username);

        return view('pms::proposal-submitted.brief.review.review', compact('proposal', 'pendingTasks', 'wfData', 'remarks', 'ruleDetails', 'shareRule', 'feature_id', 'wfDetailsId', 'authDesignation'));
    }

    public function reviewUpdate($proposalId, Request $request)
    {
        //Generating notification
        $event = ($request->input('status') == 'REJECTED') ? 'project_proposal_send_back' : 'project_proposal_review';
        $this->projectProposalService->generatePMSNotification(
            [
                'ref_table_id' => $proposalId,
                'status' => $request->input('status')
            ],
            $event,
            $request->input('reviewUrl')
        );
        // Notification generation done
        if($request->input('status') == 'SHARE') return $this->share($request);

        if ($request->input('status') == 'CLOSED') {
            $proposal = $this->projectProposalService->findOrFail($proposalId);
            $this->projectProposalService->update($proposal, ['status' => 'REJECTED']);
            return redirect(route('project-proposal-submitted-close', $request->input('wf_master')));
        } else {
            $proposal = $this->projectProposalService->findOrFail($proposalId);
            //$this->projectProposalService->update($proposal, ['status' => $request->input('status')]);
            $feature_name = config('constants.project_proposal_feature_name');
            $data = array(
                'feature' => $feature_name,
                'workflow_master_id' => $request->input('wf_master'),
                'workflow_conversation_id' => $request->input('wf_conv'),
                'status' => $request->input('status'),
                'message' => $request->input('message'),
                'remarks' => $request->input('remarks'),
                'item_id' => $proposalId,
            );
            $this->dashboardService->updateDashboardItem($data);
            Session::flash('message', __('labels.update_success'));

            return redirect(route('pms'));
        }
    }

    public function resubmit($proposalId, $featureId)
    {
        $proposal = $this->projectProposalService->findOne($proposalId);

        return view('pms::proposal-submission.brief.resubmit', compact('proposal', 'featureId'));
    }

    public function storeResubmit($proposalId, Request $request)
    {
        $proposal = $this->projectProposalService->findOrFail($proposalId);
        $updateData = [
            'status' => 'PENDING',
            'title' => $request->input('title')
        ];
        $this->projectProposalService->update($proposal, $updateData);

        // Reinitialising Workflow
        $data = [
            'feature_id' => $request->input('feature_id'),
            'message' => $request->input('message'),
            'ref_table_id' => $proposalId
        ];
        $this->workflowService->reinitializeWorkflow($data);

        //Generating notification
        $this->projectProposalService->generatePMSNotification(
            [
                'ref_table_id' => $proposalId,
                'status' => WorkflowStatus::REINITIATED
            ],
            'project_proposal_submission',
            $this->reviewUrlGenerator->getReviewUrl(
                'project-proposal-submitted-review',
                $this->featureService->findOne($request->input('feature_id')),
                $proposal
            )
        );
        // Notification generation done

        Session::flash('message', __('labels.save_success'));

        return redirect(route('pms'));
    }

    public function close($wfMasterId)
    {
        $this->workflowService->closeWorkflow($wfMasterId);
        Session::flash('message', __('labels.update_success'));

        return redirect(route('pms'));
    }

    public function approve($proposalId)
    {
        $proposal = $this->projectProposalService->findOne($proposalId);

        return view('pms::proposal-submitted.approve', compact('proposal'));
    }

    public function storeApprove($proposalId, Request $request)
    {
        //Generating notification
        $this->projectProposalService->generatePMSNotification(['ref_table_id' => $proposalId, 'status' => $request->input('status'), 'activity_by' => 'APC'], 'project_proposal_apc_approved');
        // Notification generation done

        $proposal = $this->projectProposalService->findOrFail($proposalId);
        $data = [
            'status' => $request->input('status'),
        ];

        $this->projectProposalService->update($proposal, $data);
        Session::flash('message', __('labels.update_success'));

        return redirect(route('pms'));
    }

    // New methods for sharing project from workflow
    public function share(Request $request)
    {
        //Generating notification
        //$event =  ($request->input('designation') == 'REJECTED') ? 'project_proposal_send_back' : 'project_proposal_review';
        //$this->projectProposalService->generatePMSNotification(['ref_table_id' =>  $proposalId, 'status' => $request->input('status')], $event);
        // Notification generation done

        $data = $request->all();
        unset($data['status']);
        $this->shareConversationService->shareFromWorkflow($data);
        Session::flash('message', trans('labels.save_success'));

        return redirect(route('pms'));
    }

    public function shareReview($projectProposalSubmissionId, $workflowMasterId, $shareConversationId)
    {
        $shareConversation = $this->shareConversationService->findOne($shareConversationId);
        if (isset($shareConversation->shareRuleDesignation->sharable_id)) {
            $shareRule = $this->shareRuleService->findOne($shareConversation->shareRuleDesignation->sharable_id);
            $ruleDesignations = $shareRule->rulesDesignation;
        } else {
            $ruleDesignations = null;
        }
        $proposal = $this->projectProposalService->findOne($projectProposalSubmissionId);
        $featureName = config('constants.project_proposal_feature_name');
        $feature = $this->featureService->findBy(['name' => $featureName])->first();
        $remarks = $this->remarksService->findBy(['feature_id' => $feature->id, 'ref_table_id' => $projectProposalSubmissionId]);
        //$shareRuleDesignation = $this->shareConversationService;
        $authDesignation = $this->userService->getDesignationId(Auth::user()->username);

        return view('pms::proposal-submitted.brief.review.shareable-review', compact('proposal', 'feature',
            'remarks', 'projectProposalSubmissionId', 'shareConversationId', 'ruleDesignations', 'shareConversation', 'authDesignation'));
    }

    public function shareFeedback(Request $request, $shareConversationId)
    {
        $data = $request->all();
        $data['from_user_id'] = Auth::user()->id;
        $currentConv = $this->shareConversationService->findOne($shareConversationId);
        if ($request->status == WorkflowStatus::REVIEW) {
            $data['request_ref_id'] = $currentConv->request_ref_id;
            $this->shareConversationService->saveShareConversation($data, $currentConv);
        }
        elseif ($request->status == WorkflowStatus::APPROVED){
            $workflowDetail = $currentConv->workflowDetails;
            $this->workflowService->approveWorkflow($workflowDetail->workflow_master_id);
            $this->projectProposalService->findOrFail($data['ref_table_id'])->update(['status'=> 'APPROVED']);

        }
        elseif ($request->status == WorkflowStatus::REJECTED){

            $workflowDetail = $currentConv->workflowDetails;
            $this->workflowService->closeWorkflow($workflowDetail->workflow_master_id);
        }
        $data['remarks'] = $request->approval_remark;
        $this->shareConversationService->updateConversation($data, $shareConversationId);
        $this->remarksService->save($data);

        Session::flash('success', trans('labels.save_success'));
        return redirect('/pms');
    }

    public function reviewBulk(Request $request)
    {
        $this->pmsService->bulkReviewFeedbackUpdate($request->all());
        Session::flash('message', trans('labels.save_success'));

        return redirect('/pms');
    }

    public function addAttachment(CreateProposalSubmissionAttachmentRequest $createProposalSubmissionAttachmentRequest)
    {
        $this->projectProposalReviewerAttachmentService->store($createProposalSubmissionAttachmentRequest->all());

        return redirect()->back();
    }
}
