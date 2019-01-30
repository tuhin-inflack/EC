<?php

namespace Modules\RMS\Http\Controllers;

use App\Services\UserService;
use App\Services\workflow\DashboardWorkflowService;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Modules\RMS\Entities\ResearchProposalSubmission;
use Modules\RMS\Entities\ResearchProposalSubmissionAttachment;
use Modules\RMS\Entities\ResearchRequest;
use Modules\RMS\Http\Requests\CreateProposalSubmissionRequest;
use Modules\RMS\Services\ResearchProposalSubmissionService;

class ProposalSubmitController extends Controller
{
    private $userService;
    private $researchProposalSubmissionService;
    private $dashboardWorkflowService;

    public function __construct(UserService $userService, ResearchProposalSubmissionService $researchProposalSubmissionService,
                                DashboardWorkflowService $dashboardWorkflowService)
    {
        $this->userService = $userService;
        $this->researchProposalSubmissionService = $researchProposalSubmissionService;
        $this->dashboardWorkflowService = $dashboardWorkflowService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $proposals = $this->researchProposalSubmissionService->getAll();
        return view('rms::proposal.submission.index', compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     * @param ResearchRequest $researchRequest
     * @return Response
     */
    public function create(ResearchRequest $researchRequest)
    {
        $auth_user_id = Auth::user()->id;
        return view('rms::proposal.submission.create', compact('researchRequest', 'auth_user_id'));
    }


    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateProposalSubmissionRequest $request)
    {

        $this->researchProposalSubmissionService->store($request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('research-proposal-submission.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $research = $this->researchProposalSubmissionService->findOne($id);
        $organizations = $research->organizations;
        if (!is_null($research)) $tasks = $research->tasks; else $tasks = array();

        $ganttChart = $this->researchProposalSubmissionService->getGanttChartData($tasks);

        return view('rms::proposal.submission.show', compact('research', 'tasks', 'organizations', 'ganttChart'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(ResearchProposalSubmission $researchProposal)
    {
        $username = Auth::user()->username;
        $name = Auth::user()->name;
        $auth_user_id = Auth::user()->id;
        $departmentName = $this->userService->getDepartmentName($username);
        $designation = $this->userService->getDesignation($username);
        return view('rms::proposal.submission.edit', compact('researchProposal', 'departmentName', 'designation', 'name', 'auth_user_id'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @param ResearchProposalSubmission $researchProposalSubmission
     * @return void
     */
    public function update(Request $request, ResearchProposalSubmission $researchProposalSubmission)
    {
        /** @var ResearchProposalSubmission $researchProposalSubmission */
        $this->researchProposalSubmissionService->updateRequest($request->all(), $researchProposalSubmission);
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('research-proposal-submission.index');
    }


    public function submissionAttachmentDownload(ResearchProposalSubmission $researchProposalSubmission)
    {
        return response()->download($this->researchProposalSubmissionService->getZipFilePath($researchProposalSubmission->id));
    }

    public function fileDownload(ResearchProposalSubmissionAttachment $researchSubmissionAttachment)
    {
        $basePath = Storage::disk('internal')->path($researchSubmissionAttachment->attachments);
        return response()->download($basePath);
    }

    public function review($researchProposalSubmissionId, $featureName, $workflowMasterId, $workflowConversationId)
    {
        $research = $this->researchProposalSubmissionService->findOne($researchProposalSubmissionId);
        $organizations = $research->organizations;
        if (!is_null($research)) $tasks = $research->tasks; else $tasks = array();
        return view('rms::proposal.review.show', compact('researchProposalSubmissionId', 'research', 'tasks', 'organizations', 'featureName', 'workflowMasterId', 'workflowConversationId'));

    }

    public function reviewUpdate(Request $request)
    {
        $data = $request->except('_token');
        //TODO: set appropriate data
//        $data = ['feature' => '', 'workflow_master_id' => '', 'workflow_conversation_id' => '', 'status' => '', 'item_id'=>'',
//            'remarks' => '', 'message' => ''];
        $this->dashboardWorkflowService->updateDashboardItem($data);
        //Send user to research dashboard
        return redirect('/rms');

    }

    public function reInitiate($researchProposalSubmissionId, $featureName, $workflowMasterId, $workflowConversationId)
    {
        $username = Auth::user()->username;
        $name = Auth::user()->name;
        $auth_user_id = Auth::user()->id;
        $researchProposal = $this->researchProposalSubmissionService->findOne($researchProposalSubmissionId);
        return view('rms::proposal.reinitiate.research-re-initiate', compact('researchProposal', 'name', 'auth_user_id', 'researchRequest'));
    }

    public function storeInitiate(Request $request, $researchProposalId)
    {

        $this->researchProposalSubmissionService->updateReInitiate($request->all(), $researchProposalId);
    }
}
