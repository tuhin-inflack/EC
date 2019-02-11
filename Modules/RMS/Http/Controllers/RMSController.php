<?php

namespace Modules\RMS\Http\Controllers;

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
     * Create a new controller instance.
     *
     * @param DashboardWorkflowService $dashboardService
     */
    public function __construct(DashboardWorkflowService $dashboardService, ResearchProposalSubmissionService $researchProposalSubmissionService, ResearchRequestService $researchRequestService, EmployeeServices $employeeService)
    {
        $this->dashboardService = $dashboardService;
        $this->researchProposalSubmissionService = $researchProposalSubmissionService;
        $this->researchRequestService = $researchRequestService;
        $this->employeeService = $employeeService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $featureName = Config::get('constants.research_proposal_feature_name');
        $pendingTasks = $this->dashboardService->getDashboardWorkflowItems($featureName);
        $rejectedItems = $this->dashboardService->getDashboardRejectedWorkflowItems('Research Proposal');
        $chartData = $this->researchProposalSubmissionService->getResearchProposalByStatus();
        $invitations = $this->researchRequestService->getResearchInvitationByDeadline();
        $proposals = $this->researchProposalSubmissionService->getResearchProposalBySubmissionDate();

        $user = Auth::user();

        $employee = $this->employeeService->findOne($user->reference_table_id);
//        dd($employee);
        if (is_null($employee)) {
            $reviewedProposals = [];
        } elseif ($employee->designation->short_name == 'RD') {
            $reviewedProposals = $this->researchProposalSubmissionService->findBy(['status' => 'REVIEWED']);
        } else {
            $reviewedProposals = [];
        }
        return view('rms::index', compact('pendingTasks', 'chartData', 'invitations', 'proposals', 'rejectedItems', 'reviewedProposals'));
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
