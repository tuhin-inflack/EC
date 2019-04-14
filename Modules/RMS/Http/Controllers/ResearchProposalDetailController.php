<?php

namespace Modules\RMS\Http\Controllers;

use App\Constants\WorkflowStatus;
use App\Services\Remark\RemarkService;
use App\Services\Sharing\ShareConversationService;
use App\Services\Sharing\ShareRulesService;
use App\Services\workflow\DashboardWorkflowService;
use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkflowService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Modules\HRM\Services\EmployeeServices;
use Modules\RMS\Entities\ResearchDetailSubmission;
use Modules\RMS\Entities\ResearchDetailSubmissionAttachment;
use Modules\RMS\Http\Requests\UpdateReviewDetail;
use Modules\RMS\Services\ResearchDetailSubmissionService;
use mysql_xdevapi\CrudOperationBindable;

class ResearchProposalDetailController extends Controller
{

    /**
     * @var ResearchDetailSubmissionService
     */
    private $researchDetailSubmissionService;

    /**
     * ResearchProposalDetailController constructor.
     * @param ResearchDetailSubmissionService $researchDetailSubmissionService
     */
    private $employeeService;
    private $featureService;
    private $remarksService;
    private $workflowService;
    private $shareRuleService;
    private $shareConversationService;
    private $dashboardWorkflowService;

    public function __construct(ResearchDetailSubmissionService $researchDetailSubmissionService,
                                EmployeeServices $employeeService, FeatureService $featureService, RemarkService $remarkService,
                                WorkflowService $workflowService, ShareRulesService $shareRulesService,
                                ShareConversationService $shareConversationService, DashboardWorkflowService $dashboardWorkflowService)
    {
        $this->employeeService = $employeeService;
        $this->featureService = $featureService;
        $this->researchDetailSubmissionService = $researchDetailSubmissionService;
        $this->remarksService = $remarkService;
        $this->workflowService = $workflowService;
        $this->shareRuleService = $shareRulesService;
        $this->shareConversationService = $shareConversationService;
        $this->dashboardWorkflowService = $dashboardWorkflowService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $researchDetails = $this->researchDetailSubmissionService->findAll();
        return view('rms::research-details.index', compact('researchDetails'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($researchDetailInvitationId)
    {

        return view('rms::research-details.create', compact('researchDetailInvitationId'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $divisionalDirector = $this->employeeService->getDivisionalDirectorByDepartmentId(Auth::user()->employee->department_id);
        if (is_null($divisionalDirector)) {
            Session::flash('error', 'Your divisional director is not defined');
            return redirect()->back();
        }
        $this->researchDetailSubmissionService->storeResearchDetails($request->all(), $divisionalDirector);
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('research.list');
    }

    public function review($researchProposalDetailId, $featureName, $workflowMasterId, $workflowConversationId, $workflowRuleDetailsId)
    {

        $researchDetail = $this->researchDetailSubmissionService->findOne($researchProposalDetailId);

        $researchDetailInvitation = $researchDetail->researchDetailInvitation;

//        $organizations = $researchDetail->organizations;
        $featureName = config('rms.research_proposal_detail_feature');;

        $feature = $this->featureService->findBy(['name' => $featureName])->first();
        $remarks = $this->remarksService->findBy(['feature_id' => $feature->id, 'ref_table_id' => $researchProposalDetailId]);

        $workflowRuleDetails = $this->workflowService->getRuleDetailsByRuleId($workflowRuleDetailsId);

        $workflowRuleMaster = $workflowRuleDetails->ruleMaster;

        if ($workflowRuleDetails->flow_type == 'review') {
            $approveButton = false;
        } else {
            $approveButton = true;
        }

        if ($workflowRuleDetails->is_shareable) {
            $shareRule = $this->shareRuleService->findOne($workflowRuleDetails->share_rule_id);
            $ruleDesignations = $shareRule->rulesDesignation->where('designation_id', '!=', Auth::user()->employee->designation_id);
        } else {
            $ruleDesignations = null;
        }

        return view('rms::research-details.review.show', compact('researchProposalDetailId', 'researchDetail',
            'featureName', 'workflowMasterId', 'workflowConversationId', 'remarks', 'workflowRuleMaster',
            'workflowRuleDetails', 'ruleDesignations', 'feature', 'approveButton', 'researchDetailInvitation'));

    }


    public function reviewUpdate(UpdateReviewDetail $request)
    {

        if ($request->status == WorkflowStatus::REVIEW) {
            $response = $this->shareConversationService->shareFromWorkflow($request->all());
        } else {
//            $research = $this->researchDetailSubmissionService->findOrFail($request->input('item_id'));
            $data = $request->except('_token');
            $this->dashboardWorkflowService->updateDashboardItem($data);
            // Send Notifications
//            $this->researchProposalSubmissionService->sendNotification($request);

        }
        Session::flash('success', trans('labels.save_success'));
        return redirect('/rms');
    }

    public function getResearchDetailFeedbackForm($researchProposalDetailId, $workflowMasterId, $shareConversationId)
    {
        $shareConversation = $this->shareConversationService->findOne($shareConversationId);

        if (isset($shareConversation->shareRuleDesignation->sharable_id)) {
            $shareRule = $this->shareRuleService->findOne($shareConversation->shareRuleDesignation->sharable_id);
            $ruleDesignations = $shareRule->rulesDesignation;
        } else {
            $ruleDesignations = null;
        }

        $researchDetail = $this->researchDetailSubmissionService->findOne($researchProposalDetailId);
        $featureName = config('rms.research_proposal_detail_feature');
        $feature = $this->featureService->findBy(['name' => $featureName])->first();
        $remarks = $this->remarksService->findBy(['feature_id' => $feature->id, 'ref_table_id' => $researchProposalDetailId]);
        return view('rms::research-details.review.share-review', compact('researchDetail', 'feature',
            'remarks', 'researchProposalDetailId', 'workflowMasterId', 'shareConversationId', 'ruleDesignations', 'shareConversation'));
    }

    public function postResearchDetailFeedback(Request $request, $shareConversationId)
    {
        $data = $request->all();
        $data['from_user_id'] = Auth::user()->id;
        $currentConv = $this->shareConversationService->findOne($shareConversationId);

        if ($request->status == WorkflowStatus::REVIEW) {
            $data['request_ref_id'] = $currentConv->request_ref_id;
            $response = $this->shareConversationService->saveShareConversation($data, $currentConv);
        }

        if ($request->status == WorkflowStatus::APPROVED) {
            $workflowDetail = $currentConv->workflowDetails;
            $this->workflowService->approveWorkflow($workflowDetail->workflow_master_id);
            $researchDetail = $this->researchDetailSubmissionService->findOrFail($request->input('ref_table_id'));
            $this->researchDetailSubmissionService->update($researchDetail, ['status' => 'APPROVED']);

        }
        $this->shareConversationService->updateConversation($data, $shareConversationId);
        Session::flash('success', trans('labels.save_success'));
        return redirect('/rms');
    }

    public function reInitiate($researchDetailSubmissionId)
    {
        $username = Auth::user()->username;
        $name = Auth::user()->name;
        $auth_user_id = Auth::user()->id;
        $researchDetail = $this->researchDetailSubmissionService->findOne($researchDetailSubmissionId);
        return view('rms::research-details.reinitiate.research-detail-re-initiate', compact('researchDetail', 'name', 'auth_user_id'));
    }

    public function storeInitiate(Request $request, $researchDetailId)
    {
        $response = $this->researchDetailSubmissionService->updateReInitiate($request->all(), $researchDetailId);
        Session::flash('success', $response->getContent());
        return redirect()->route('rms.index');
    }

    public function closeWorkflowByInitiator($workflowMasterId, $researchDetailId)
    {
        $proposal = $this->researchDetailSubmissionService->findOne($researchDetailId);
        $proposal->update(['status' => 'CLOSED']);
        $this->workflowService->closeWorkflow($workflowMasterId);

        Session::flash('success', trans('labels.save_success'));
        return redirect('/rms');

    }

    public function closeWorkflowByReviewer($workflowMasterId, $researchDetailId, $shareConversationId = null)
    {

        $researchDetail = $this->researchDetailSubmissionService->findOne($researchDetailId);
        $researchDetail->update(['status' => 'REJECTED']);
        $this->workflowService->closeWorkflow($workflowMasterId);

        if (!is_null($shareConversationId)) {
            $this->shareConversationService->updateConversation([], $shareConversationId);
        }
        Session::flash('success', trans('labels.save_success'));
        return redirect('/rms');
    }

    public function attachmentDownload(ResearchDetailSubmission $researchDetailSubmission)
    {
        return response()->download($this->researchDetailSubmissionService->getZipFilePath($researchDetailSubmission));
    }

    public function fileDownload($attachmentId)
    {

        $researchDetailSubmission = ResearchDetailSubmissionAttachment::findOrFail($attachmentId);

        $basePath = Storage::disk('internal')->path($researchDetailSubmission->attachments);
        return response()->download($basePath);
    }
}
