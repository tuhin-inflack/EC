<?php

namespace Modules\PMS\Http\Controllers;

use App\Services\Remark\RemarkService;
use App\Services\UserService;
use App\Services\workflow\DashboardWorkflowService;
use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkflowService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\PMS\Services\ProjectProposalService;
use Modules\PMS\Services\ProjectRequestService;
use Illuminate\Support\Facades\Session;


class PMSController extends Controller
{
    private $dashboardService;
    private $workflowService;
    private $remarksService;
    private $featureService;
    private $userService;
    /**
     * @var ProjectProposalService
     */
    private $projectProposalService;
    /**
     * @var ProjectRequestService
     */
    private $projectRequestService;

    public function __construct(DashboardWorkflowService $dashboardService,
                                ProjectProposalService $projectProposalService,
                                WorkflowService $workflowService,
                                RemarkService $remarksService,
                                FeatureService $featureService,
                                ProjectRequestService $projectRequestService,
                                UserService $userService)
    {
        $this->dashboardService = $dashboardService;
        $this->projectRequestService = $projectRequestService;
        $this->projectProposalService = $projectProposalService;
        $this->workflowService = $workflowService;
        $this->remarksService =  $remarksService;
        $this->featureService = $featureService;
        $this->userService = $userService;
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
        $featureName = config('constants.project_proposal_feature_name');
        $pendingTasks = $this->dashboardService->getDashboardWorkflowItems($featureName);
        $rejectedTasks = $this->dashboardService->getDashboardRejectedWorkflowItems($featureName);
        $loggedUserDesignation = $this->userService->getDesignation(Auth::user()->username);

        if($loggedUserDesignation == "Project Director")
            $reviewedTasks = $this->projectProposalService->findBy(['status' => 'REVIEWED']);
        else
            $reviewedTasks = [];

        return view('pms::index', compact('pendingTasks', 'rejectedTasks', 'chartData', 'invitations', 'proposals', 'reviewedTasks'));
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
    public function review($proposalId, $wfMasterId, $wfConvId, $feature_id)
    {
        $proposal = $this->projectProposalService->findOrFail($proposalId);
        $wfData = ['wfMasterId' => $wfMasterId, 'wfConvId' =>$wfConvId];

        $remarks = $this->remarksService->findBy(['feature_id' => $feature_id,'ref_table_id' => $proposal->id]);

        return view('pms::proposal-submitted.review', compact('proposal', 'pendingTasks', 'wfData', 'remarks'));
    }

    public function reviewUpdate($proposalId, Request $request)
    {
        if($request->input('status') == 'CLOSED')
        {
            $proposal = $this->projectProposalService->findOrFail($proposalId);
            $this->projectProposalService->update($proposal, ['status' => 'REJECTED']);
            return redirect(route('project-proposal-submitted-close', $request->input('wf_master')));
        }
        else
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

    public function resubmit($proposalId , $featureId)
    {
        $proposal = $this->projectProposalService->findOne($proposalId);

        return view('pms::proposal-submission.resubmit', compact('proposal', 'featureId'));
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
        $data = ['feature_id' => $request->input('feature_id')
            , 'message' => $request->input('message'),
            'ref_table_id' => $proposalId];
        $this->workflowService->reinitializeWorkflow($data);
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
        $proposal = $this->projectProposalService->findOrFail($proposalId);
        $data = [
            'status' => $request->input('status'),
        ];

        $this->projectProposalService->update($proposal, $data);

        Session::flash('message', __('labels.update_success'));

        return redirect(route('pms'));
    }
}
