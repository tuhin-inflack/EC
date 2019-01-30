<?php

namespace Modules\PMS\Http\Controllers;

use App\Services\workflow\DashboardWorkflowService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PMS\Services\ProjectProposalService;
use Illuminate\Support\Facades\Session;

class PMSController extends Controller
{
    private $dashboardService;
    private $projectProposalService;

    public function __construct(DashboardWorkflowService $dashboardService, ProjectProposalService $projectProposalService)
    {
        $this->dashboardService = $dashboardService;
        $this->projectProposalService = $projectProposalService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $featureName = config('constants.project_proposal_feature_name');
        $pendingTasks = $this->dashboardService->getDashboardWorkflowItems($featureName);
        $rejectedTasks = $this->dashboardService->getDashboardRejectedWorkflowItems($featureName);

        return view('pms::index', compact('pendingTasks', 'rejectedTasks', 'rejectedTasks'));
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
    public function review($proposalId, $wfMasterId, $wfConvId)
    {
        $proposal = $this->projectProposalService->findOrFail($proposalId);
        $wfData = ['wfMasterId' => $wfMasterId, 'wfConvId' =>$wfConvId];

        return view('pms::proposal-submitted.review', compact('proposal', 'pendingTasks', 'wfData'));
    }

    public function reviewUpdate($proposalId, Request $request)
    {
        $feature_name = config('constants.project_proposal_feature_name');

        $data = array(
            'feature' => $feature_name,
            'workflow_master_id' => $request->input('wf_master'),
            'workflow_conversation_id' => $request->input('wf_conv'),
            'status' => $request->input('status'),
            'message' =>$request->input('message_to_receiver'),
            'remarks' =>$request->input('approval_remark'),
            'item_id' =>$proposalId,
        );
        $this->dashboardService->updateDashboardItem($data);

        Session::flash('message', __('labels.update_success'));

        return redirect(route('pms'));
    }
}
