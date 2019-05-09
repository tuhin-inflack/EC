<?php

namespace Modules\RMS\Http\Controllers;

use App\Constants\WorkflowStatus;
use App\Services\Remark\RemarkService;
use App\Services\Sharing\ShareConversationService;
use App\Services\Sharing\ShareRulesService;
use App\Services\TaskService;
use App\Services\UserService;
use App\Services\workflow\DashboardWorkflowService;
use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkflowService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Services\EmployeeServices;
use Modules\RMS\Entities\Research;
use Modules\RMS\Http\Requests\CreateResearchRequest;
use Modules\RMS\Http\Requests\PostResearchBriefFeedbackRequest;
use Modules\RMS\Services\ResearchDetailSubmissionService;
use Modules\RMS\Services\ResearchService;
use Prophecy\Doubler\Generator\TypeHintReference;

/**
 * @property  userService
 * @property  researchService
 */
class ResearchController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;
    private $researchService;
    /**
     * @var TaskService
     */
    private $taskService;
    private $remarksService;
    private $dashboardWorkflowService;
    private $featureService;
    private $researchDetailSubmissionService;
    private $workflowService;
    private $shareRuleService;
    private $employeeService;
    private $shareConversationService;
    /**
     * ResearchController constructor.
     * @param UserService $userService
     * @param ResearchService $researchService
     * @param TaskService $taskService
     * @param RemarkService $remarkService
     * @param DashboardWorkflowService $dashboardWorkflowService ;
     * @param FeatureService $featureService ;
     */
    public function __construct(UserService $userService, ResearchService $researchService, TaskService $taskService,
                                RemarkService $remarkService, DashboardWorkflowService $dashboardWorkflowService, FeatureService $featureService,
                                ResearchDetailSubmissionService $researchDetailSubmissionService,
                                WorkflowService $workflowService,
                                ShareRulesService $shareRuleService,
                                EmployeeServices $employeeService,
                                ShareConversationService $shareConversationService)
    {

        $this->userService = $userService;
        $this->researchService = $researchService;
        $this->taskService = $taskService;
        $this->remarksService = $remarkService;
        $this->dashboardWorkflowService = $dashboardWorkflowService;
        $this->featureService = $featureService;
        $this->researchDetailSubmissionService = $researchDetailSubmissionService;
        $this->workflowService = $workflowService;
        $this->shareRuleService = $shareRuleService;
        $this->employeeService = $employeeService;
        $this->shareConversationService = $shareConversationService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $researches = $this->researchService->getResearchesForUser(Auth::user());
        return view('rms::research.index', compact('researches'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $username = Auth::user()->username;
        $name = Auth::user()->name;
        $auth_user_id = Auth::user()->id;
        $departmentName = $this->userService->getDepartmentName($username);
        $designation = $this->userService->getDesignation($username);
        $proposals = $this->researchDetailSubmissionService->getRemainingApprovedDetailProposal();

        return view('rms::research.create', compact('auth_user_id', 'name', 'designation', 'departmentName', 'proposals'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateResearchRequest $request)
    {
        $research = $this->researchService->store($request->all());

        foreach (Config::get('default-values.tasks') as $task) {
            $this->taskService->store($research, $task);
        }

        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('research.index');
    }

    /**
     * Show the specified resource.
     * @param Research $research
     * @return Response
     */
    public function show(Research $research)
    {
        $ganttChart = $this->taskService->getTasksGanttChartData($research->tasks);
        return view('rms::research.show', compact('research', 'ganttChart'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('rms::edit');
    }

    public function review($researchId, $featureId, $workflowMasterId, $workflowConversationId, $ruleDetailsId)
    {
        $research = $this->researchService->findOne($researchId);
        $remarks = $this->remarksService->findBy(['feature_id' => $featureId, 'ref_table_id' => $researchId]);
        $feature = $this->featureService->findOne($featureId);
        $ruleDetails = $this->workflowService->getRuleDetailsByRuleId($ruleDetailsId);

        if ($ruleDetails->is_shareable) {
            //$shareRule = $this->shareRuleService->findOne($ruleDetails->share_rule_id);
            $ruleDesignations =  $this->employeeService->getEmployeesForDropdown(function ($employee){
                $designation = !is_null($employee->designation) ? $employee->designation->name : 'No Designation';
                return $employee->first_name. ' ' . $employee->last_name . ' - ' . $designation . ' - ' . $employee->employeeDepartment->name;
            });
            $wfConversation = $this->workflowService->getWorkflowConversationById($workflowConversationId);
            $wfDetailsId = $wfConversation->workflow_details_id;
        } else {
            $ruleDesignations = [];
            $wfDetailsId = 0;
        };

        return view('rms::research.review.show', compact('researchId', 'research', 'feature', 'featureId', 'workflowMasterId', 'workflowConversationId', 'remarks', 'ruleDetails', 'ruleDesignations'));
    }

    public function reviewUpdate(Request $request)
    {
        $employeeDesignation = $this->employeeService->findOne($request->input('employee_id'));
        $designationId = $employeeDesignation->designation_id;
        $request->merge(['designation_id'=> $designationId]);
        if($request->input('status') == "SHARE") return $this->share($request);

        $research = $this->researchService->findOrFail($request->input('item_id'));
        $this->researchService->update($research, ['status' => $request->input('status')]);

        $data = $request->except('_token');
        $this->dashboardWorkflowService->updateDashboardItem($data);
//        Send Notifications
//        $this->researchService->sendNotification($request);
        //Send user to research dashboard
        return redirect('/rms');
    }

    public function share(Request $request)
    {
        $data = $request->all();
        unset($data['status']);
        $this->shareConversationService->shareFromWorkflow($data);
        Session::flash('message', trans('labels.save_success'));

        return redirect(route('pms'));
    }

    public function shareReview($researchId, $workflowMasterId, $shareConversationId)
    {
        $shareConversation = $this->shareConversationService->findOne($shareConversationId);
        if (isset($shareConversation->shareRuleDesignation->sharable_id)) {
            $shareRule = $this->shareRuleService->findOne($shareConversation->shareRuleDesignation->sharable_id);
            $ruleDesignations = $shareRule->rulesDesignation;
        } else {
            $ruleDesignations = null;
        }
        $research = $this->researchService->findOne($researchId);
        $featureName = Config::get('rms.research_feature_name');
        $feature = $this->featureService->findBy(['name' => $featureName])->first();
        $remarks = $this->remarksService->findBy(['feature_id' => $feature->id, 'ref_table_id' => $researchId]);

        return view('rms::research.review.shareable-review', compact('research', 'feature',
            'remarks', 'researchId', 'workflowMasterId', 'shareConversationId', 'ruleDesignations', 'shareConversation'));
    }

    public function shareFeedback(Request $request, $shareConversationId)
    {

        $data = $request->all();
        //dd($data);
        $data['from_user_id'] = Auth::user()->id;
        $currentConv = $this->shareConversationService->findOne($shareConversationId);

        if ($request->status == WorkflowStatus::REVIEW) {
            $data['request_ref_id'] = $currentConv->request_ref_id;
            $this->shareConversationService->saveShareConversation($data, $currentConv);
        }

        if ($request->status == WorkflowStatus::APPROVED) {
            $workflowDetail = $currentConv->workflowDetails;
            $this->workflowService->approveWorkflow($workflowDetail->workflow_master_id);
            $research = $this->researchService->findOrFail($request->input('ref_table_id'));
            $this->researchService->update($research, ['status' => 'APPROVED']);

        }
        $this->shareConversationService->updateConversation($data, $shareConversationId);
        Session::flash('success', trans('labels.save_success'));
        return redirect('/rms');
    }

    public function createPublication($researchId)
    {
        $research = $this->researchService->findOne($researchId);

        return view('rms::research.create-publication', compact('research'));
    }

    public function storePublication(Request $request, $researchId)
    {

        $save = $this->researchService->savePublication($request->all(), $researchId);
        Session::flash('success', trans('labels.save_success'));

        return redirect(route('research.show', $researchId));
    }

    public function reInitiate($researchId)
    {
        $username = Auth::user()->username;
        $name = Auth::user()->name;
        $auth_user_id = Auth::user()->id;
        $research = $this->researchService->findOne($researchId);
        $publication = $research->publication;

        return view('rms::research.re-initiate.re_initiate_research', compact('research', 'name', 'auth_user_id', 'publication'));
    }

    public function storeReInitiate(Request $request, $publicationId)
    {

//      publication update
        $this->researchService->updatePublicationForReInitialize($request->all(), $publicationId);

//      Reinitialize research
        $proposal = $this->researchService->findOne($request->research_id);
        $proposal->update(['status' => WorkflowStatus::REINITIATED]);

//      Reinitialize Workflow
        $response = $this->researchService->updateReInitiate($request->all(), $request->research_id);

        Session::flash('success', $response->getContent());
        return redirect()->route('rms.index');
    }

    public function closeWorkflowByReviewer($workflowMasterId, $researchId)
    {

        $proposal = $this->researchService->findOne($researchId);
        $proposal->update(['status' => WorkflowStatus::CLOSED]);
        $response = $this->researchService->closeWorkflow($workflowMasterId);


        Session::flash('success', $response->getContent());
        return redirect()->route('rms.index');
    }
}
