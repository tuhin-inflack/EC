<?php

namespace Modules\RMS\Http\Controllers;

use App\Services\workflow\DashboardWorkflowService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\RMS\Services\ResearchProposalSubmissionService;

class RMSController extends Controller
{
    private $dashboardService;
    /**
     * @var ResearchProposalSubmissionService
     */
    private $researchProposalSubmissionService;


    /**
     * Create a new controller instance.
     *
     * @param DashboardWorkflowService $dashboardService
     */
    public function __construct(DashboardWorkflowService $dashboardService, ResearchProposalSubmissionService $researchProposalSubmissionService)
    {
        $this->dashboardService = $dashboardService;
        $this->researchProposalSubmissionService = $researchProposalSubmissionService;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        //TODO:get the feature name from config file
        $pendingTasks = $this->dashboardService->getDashboardWorkflowItems('Research Proposal');
        $chartData = $this->researchProposalSubmissionService->getResearchProposalByStatus();
        return view('rms::index', compact('pendingTasks', 'chartData'));
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
