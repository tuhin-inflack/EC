<?php

namespace Modules\RMS\Http\Controllers;

use App\Constants\DesignationShortName;
use App\Constants\NotificationType;
use App\Constants\WorkflowStatus;
use App\Events\NotificationGeneration;
use App\Models\NotificationInfo;
use App\Services\Remark\RemarkService;
use App\Services\UserService;
use App\Services\workflow\DashboardWorkflowService;
use App\Services\workflow\FeatureService;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Modules\HRM\Services\EmployeeServices;
use Modules\RMS\Entities\ResearchProposalSubmission;
use Modules\RMS\Entities\ResearchProposalSubmissionAttachment;
use Modules\RMS\Entities\ResearchRequest;
use Modules\RMS\Http\Requests\CreateProposalSubmissionRequest;
use Modules\RMS\Services\ResearchProposalSubmissionService;


class ProposalSubmitController extends Controller
{
    private $researchProposalSubmissionService;
    private $dashboardWorkflowService;
    private $remarksService;
    private $featureService;
    private $employeeService;

    public function __construct(ResearchProposalSubmissionService $researchProposalSubmissionService,
                                DashboardWorkflowService $dashboardWorkflowService, RemarkService $remarkService, FeatureService $featureService, EmployeeServices $employeeService)
    {

        $this->researchProposalSubmissionService = $researchProposalSubmissionService;
        $this->dashboardWorkflowService = $dashboardWorkflowService;
        $this->remarksService = $remarkService;
        $this->featureService = $featureService;
        $this->employeeService = $employeeService;
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

    public function review($researchProposalSubmissionId, $featureName, $workflowMasterId, $workflowConversationId, $workflowRuleDetailsId)

    {
        $research = $this->researchProposalSubmissionService->findOne($researchProposalSubmissionId);
        $organizations = $research->organizations;
        $featureName = Config::get('constants.research_proposal_feature_name');
        $feature = $this->featureService->findBy(['name' => $featureName])->first();

        $remarks = $this->remarksService->findBy(['feature_id' => $feature->id, 'ref_table_id' => $researchProposalSubmissionId]);

        if (!is_null($research)) $tasks = $research->tasks; else $tasks = array();
        return view('rms::proposal.review.show', compact('researchProposalSubmissionId', 'research', 'tasks', 'organizations', 'featureName', 'workflowMasterId', 'workflowConversationId', 'remarks'));

    }

    public function reviewUpdate(Request $request)
    {
        $research = $this->researchProposalSubmissionService->findOrFail($request->input('item_id'));
        $this->researchProposalSubmissionService->update($research, ['status' => $request->input('status')]);

        $data = $request->except('_token');
        $this->dashboardWorkflowService->updateDashboardItem($data);
//        Send Notifications

        $this->researchProposalSubmissionService->sendNotification($request);
        //Send user to research dashboard
        return redirect('/rms');

    }

    public function reInitiate($researchProposalSubmissionId)
    {
        $username = Auth::user()->username;
        $name = Auth::user()->name;
        $auth_user_id = Auth::user()->id;
        $researchProposal = $this->researchProposalSubmissionService->findOne($researchProposalSubmissionId);
        return view('rms::proposal.reinitiate.research-re-initiate', compact('researchProposal', 'name', 'auth_user_id', 'researchRequest'));
    }

    public function storeInitiate(Request $request, $researchProposalId)
    {

        $response = $this->researchProposalSubmissionService->updateReInitiate($request->all(), $researchProposalId);
        Session::flash('success', $response->getContent());
        return redirect()->route('rms.index');
    }

    public function closeWorkflowByOwner($workflowMasterId, $researchProposalSubmissionId)
    {
//        dd($workflowMasterId);
        $proposal = $this->researchProposalSubmissionService->findOne($researchProposalSubmissionId);
        $proposal->update(['status' => 'CLOSED']);
        $response = $this->researchProposalSubmissionService->closeWorkflow($workflowMasterId);


        Session::flash('success', $response->getContent());
        return redirect()->route('rms.index');

    }

    public function closeWorkflowByReviewer($workflowMasterId, $researchProposalSubmissionId)
    {
        $proposal = $this->researchProposalSubmissionService->findOne($researchProposalSubmissionId);
        $proposal->update(['status' => 'REJECTED']);
        $response = $this->researchProposalSubmissionService->closeWorkflow($workflowMasterId);

        Session::flash('success', $response->getContent());
        return redirect()->route('rms.index');
    }

    public function apcReview($researchProposalSubmissionId)
    {
        $research = $this->researchProposalSubmissionService->findOne($researchProposalSubmissionId);
        return view('rms::proposal.apc-review.show', compact('research'));
    }

    public function approveApcReview(Request $request, $researchProposalSubmissionId)
    {
        $response = $this->researchProposalSubmissionService->apcApproved($request->status, $researchProposalSubmissionId);
        Session::flash('success', $response->getContent());
        return redirect()->route('rms.index');
    }
}
