<?php

namespace Modules\PMS\Http\Controllers;

use App\Services\workflow\DashboardWorkflowService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PMS\Services\ProjectProposalService;
use Modules\PMS\Services\ProjectRequestService;

class PMSController extends Controller
{
    private $dashboardService;
    /**
     * @var ProjectProposalService
     */
    private $projectProposalService;
    /**
     * @var ProjectRequestService
     */
    private $projectRequestService;

    public function __construct(DashboardWorkflowService $dashboardService, ProjectProposalService $projectProposalService, ProjectRequestService $projectRequestService)
    {
        $this->dashboardService = $dashboardService;
        $this->projectProposalService = $projectProposalService;
        $this->projectRequestService = $projectRequestService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $pendingTasks = $this->dashboardService->getDashboardWorkflowItems(config('constants.project_proposal_feature_name'));
        $chartData = $this->projectProposalService->getProjectProposalByStatus();
        $invitations = $this->projectRequestService->getProjectInvitationByDeadline();
        $proposals = $this->projectProposalService->getProjectProposalBySubmissionDate();
        return view('pms::index', compact('pendingTasks', 'chartData', 'invitations', 'proposals'));
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
}
