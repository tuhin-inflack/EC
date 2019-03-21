<?php

namespace Modules\RMS\Http\Controllers;

use App\Constants\DesignationShortName;
use App\Entities\Sharing\ShareConversation;
use App\Services\Sharing\ShareConversationService;
use App\Services\TaskService;
use App\Services\workflow\DashboardWorkflowService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Modules\HRM\Services\EmployeeServices;
use Modules\RMS\Services\ResearchProposalSubmissionService;
use Modules\RMS\Services\ResearchRequestService;

class RMSController extends Controller
{
    private $dashboardService;
    /**
     * @var ResearchProposalSubmissionService
     */
    private $researchProposalSubmissionService;
    /**
     * @var ResearchRequestService
     */
    private $researchRequestService;
    private $employeeService;
    /**
     * @var TaskService
     */
    private $taskService;

    /*
     * @var $shareConversationService;
     */
    private $shareConversationService;


    /**
     * Create a new controller instance.
     *
     * @param DashboardWorkflowService $dashboardService
     */
    public function __construct(DashboardWorkflowService $dashboardService, ResearchProposalSubmissionService $researchProposalSubmissionService, ResearchRequestService $researchRequestService, EmployeeServices $employeeService,
                                TaskService $taskService, ShareConversationService $shareConversationService)
    {
        $this->dashboardService = $dashboardService;
        $this->researchProposalSubmissionService = $researchProposalSubmissionService;
        $this->researchRequestService = $researchRequestService;
        $this->employeeService = $employeeService;
        $this->taskService = $taskService;
        $this->shareConversationService = $shareConversationService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $chartData = $this->taskService->getTasksBarChartData();
        $tasks = $this->taskService->getAllResearchTasks();
        $invitations = $this->researchRequestService->getResearchInvitationByDeadline();
        $proposals = $this->researchProposalSubmissionService->getResearchProposalBySubmissionDate();
        //Research proposal items
        $featureName = Config::get('constants.research_proposal_feature_name');
        $pendingTasks = $this->dashboardService->getDashboardWorkflowItems($featureName);

        $rejectedItems = $this->dashboardService->getDashboardRejectedWorkflowItems($featureName);
//       Research Items
        $researchFeatureName = Config::get('rms.research_feature_name');
//        $researchRejectedItems = $this->dashboardService->getDashboardRejectedWorkflowItems($researchFeatureName);


        $user = Auth::user();
        $employee = $this->employeeService->findOne($user->reference_table_id);
//        $shareConversations = $this->shareConversationService->getShareConversationByDesignation($employee->designation_id);
//        dd($shareConversations[0]->researchProposal);
        if (is_null($employee)) {
            $researchPendingTasks = [];
        } elseif ($employee->designation->short_name == DesignationShortName::RD) {
            $researchPendingTasks = $this->dashboardService->getDashboardWorkflowItems($researchFeatureName);
        } else {
            $researchPendingTasks = [];
        }

        $shareConversations = (is_null($employee)) ? null : $this->shareConversationService->getShareConversationByDesignation($employee->designation_id);


        return view('rms::index', compact('pendingTasks', 'chartData', 'invitations', 'proposals',
            'rejectedItems', 'tasks', 'researchPendingTasks', 'researchRejectedItems', 'shareConversations'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('rms::create');
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
        return view('rms::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('rms::edit');
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
}
