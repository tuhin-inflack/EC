<?php

namespace Modules\PMS\Http\Controllers;

use App\Constants\WorkflowStatus;
use App\Services\Remark\RemarkService;
use App\Services\Sharing\ShareConversationService;
use App\Services\Sharing\ShareRulesService;
use App\Services\UserService;
use App\Services\workflow\DashboardWorkflowService;
use App\Services\workflow\FeatureService;
use App\Services\workflow\WorkflowService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Http\Requests\CreateProjectProposalRequest;
use Modules\PMS\Http\Requests\CreateProposalSubmissionAttachmentRequest;
use Modules\PMS\Http\Requests\ReviewRequest;
use Modules\PMS\Services\ProjectDetailProposalService;
use Modules\PMS\Services\ProjectProposalDetailReviewerAttachmentService;
use Modules\PMS\Services\ProjectProposalReviewerAttachmentService;

class ProjectDetailsProposalController extends Controller
{
    private $projectDetailsProposalService;
    private $remarkService;
    private $workflowService;
    private $shareRuleService;
    private $userService;
    private $dashboardService;
    private $shareConversationService;
    private $featureService;
    private $projectProposalDetailReviewerAttachmentService;


    public function __construct(ProjectDetailProposalService $projectDetailProposalService,
                                RemarkService $remarkService,
                                WorkflowService $workflowService,
                                ShareRulesService $shareRuleService,
                                UserService $userService,
                                DashboardWorkflowService $dashboardService,
                                ShareConversationService $shareConversationService,
                                FeatureService $featureService,
                                ProjectProposalDetailReviewerAttachmentService $projectProposalDetailReviewerAttachmentService)
    {
        $this->projectDetailsProposalService = $projectDetailProposalService;
        $this->remarkService = $remarkService;
        $this->workflowService = $workflowService;
        $this->shareRuleService = $shareRuleService;
        $this->userService = $userService;
        $this->dashboardService = $dashboardService;
        $this->shareConversationService = $shareConversationService;
        $this->featureService = $featureService;
        $this->projectProposalDetailReviewerAttachmentService = $projectProposalDetailReviewerAttachmentService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $proposals = $this->projectDetailsProposalService->getProposalsForUser(Auth::user());

        return view('pms::proposal-submission.details.index', compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($projectRequestId)
    {
        return view('pms::proposal-submission.details.create', compact('projectRequestId'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateProjectProposalRequest $request)
    {
        $projectDetailProposal = $this->projectDetailsProposalService->store($request->all());
        Session::flash('success', trans('labels.save_success'));

        return $request->all()['to_budget'] ? redirect()->route('project-detail-proposal-budget.index', ['projectDetailProposal' => $projectDetailProposal->id]): redirect()->route('pms');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('pms::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('pms::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /*
     * Functions related to Project Detail Proposal workflow
     */
    public function review($proposalId, $wfMasterId, $wfConvId, $feature_id, $ruleDetailsId, $viewOnly = 0)
    {
        $proposal = $this->projectDetailsProposalService->findOrFail($proposalId);
        $wfData = ['wfMasterId' => $wfMasterId, 'wfConvId' => $wfConvId];
        $remarks = $this->remarkService->findBy(['feature_id' => $feature_id, 'ref_table_id' => $proposal->id]);
        $ruleDetails = $this->workflowService->getRuleDetailsByRuleId($ruleDetailsId);

        if ($ruleDetails->is_shareable) {
            $shareRule = $this->shareRuleService->findOne($ruleDetails->share_rule_id);
            $wfConversation = $this->workflowService->getWorkflowConversationById($wfConvId);
            $wfDetailsId = $wfConversation->workflow_details_id;
        } else {
            $shareRule = [];
            $wfDetailsId = 0;
        };
        $authDesignation = $this->userService->getDesignationId(Auth::user()->username);

        return view('pms::proposal-submitted.detail.review.review', compact('proposal', 'pendingTasks', 'wfData', 'remarks', 'ruleDetails', 'shareRule', 'feature_id', 'wfDetailsId', 'authDesignation'));
    }

    public function reviewUpdate($proposalId, ReviewRequest $request)
    {
        //Generating notification
//        $event = ($request->input('status') == 'REJECTED') ? 'project_proposal_send_back' : 'project_proposal_review';
//        $this->projectProposalService->generatePMSNotification(
//            [
//                'ref_table_id' => $proposalId,
//                'status' => $request->input('status')
//            ],
//            $event,
//            $request->input('reviewUrl')
//        );
        // Notification generation done

        if($request->input('status') == 'SHARE') return $this->share($request);   // Sending to share method if user shares an item instead of approval
        if ($request->input('status') == 'CLOSED') {
            $proposal = $this->projectDetailsProposalService->findOrFail($proposalId);
            $this->projectDetailsProposalService->update($proposal, ['status' => 'REJECTED']);
            return redirect(route('project-proposal-submitted-close', $request->input('wf_master')));
        } else {
            $proposal = $this->projectDetailsProposalService->findOrFail($proposalId);
            //$this->projectProposalService->update($proposal, ['status' => $request->input('status')]);
            $feature_name = config('constants.project_details_proposal_feature_name');
            $data = array(
                'feature' => $feature_name,
                'workflow_master_id' => $request->input('wf_master'),
                'workflow_conversation_id' => $request->input('wf_conv'),
                'status' => $request->input('status'),
                'message' => $request->input('message'),
                'remarks' => $request->input('remarks'),
                'item_id' => $proposalId,
            );
            $this->dashboardService->updateDashboardItem($data);
            Session::flash('message', __('labels.update_success'));

            return redirect(route('pms'));
        }
    }

    public function share(Request $request)
    {
        $data = $request->all();
        unset($data['status']);
        $this->shareConversationService->shareFromWorkflow($data);
        Session::flash('message', trans('labels.save_success'));

        return redirect(route('pms'));
    }

    public function shareReview($projectProposalSubmissionId, $workflowMasterId, $shareConversationId)
    {
        $shareConversation = $this->shareConversationService->findOne($shareConversationId);
        if (isset($shareConversation->shareRuleDesignation->sharable_id)) {
            $shareRule = $this->shareRuleService->findOne($shareConversation->shareRuleDesignation->sharable_id);
            $ruleDesignations = $shareRule->rulesDesignation;
        } else {
            $ruleDesignations = null;
        }
        $proposal = $this->projectDetailsProposalService->findOne($projectProposalSubmissionId);
        $featureName = config('constants.project_details_proposal_feature_name');
        $feature = $this->featureService->findBy(['name' => $featureName])->first();
        $remarks = $this->remarkService->findBy(['feature_id' => $feature->id, 'ref_table_id' => $projectProposalSubmissionId]);
        //$shareRuleDesignation = $this->shareConversationService;
        $authDesignation = $this->userService->getDesignationId(Auth::user()->username);

        return view('pms::proposal-submitted.detail.review.shareable-review', compact('proposal', 'feature',
            'remarks', 'projectProposalSubmissionId', 'shareConversationId', 'ruleDesignations', 'shareConversation', 'authDesignation'));
    }

    public function shareFeedback(ReviewRequest $request, $shareConversationId)
    {
        $data = $request->all();
        $data['from_user_id'] = Auth::user()->id;
        $currentConv = $this->shareConversationService->findOne($shareConversationId);
        if ($request->status == WorkflowStatus::REVIEW) {
            $data['request_ref_id'] = $currentConv->request_ref_id;
            $this->shareConversationService->saveShareConversation($data, $currentConv);
        }
        elseif ($request->status == WorkflowStatus::APPROVED){
            $workflowDetail = $currentConv->workflowDetails;
            $this->workflowService->approveWorkflow($workflowDetail->workflow_master_id);
            $this->projectDetailsProposalService->findOrFail($data['ref_table_id'])->update(['status'=> 'APPROVED']);
            $this->remarkService->save($data);

        }
        elseif ($request->status == WorkflowStatus::REJECTED){

            $workflowDetail = $currentConv->workflowDetails;
            $this->workflowService->closeWorkflow($workflowDetail->workflow_master_id);
            $this->projectDetailsProposalService->findOrFail($data['ref_table_id'])->update(['status'=> 'REJECTED']);
            $this->remarkService->save($data);
        }
        $this->shareConversationService->updateConversation($data, $shareConversationId);

        Session::flash('success', trans('labels.save_success'));
        return redirect('/pms');
    }

    public function addAttachment(CreateProposalSubmissionAttachmentRequest $createProposalSubmissionAttachmentRequest)
    {
        $this->projectProposalDetailReviewerAttachmentService->store($createProposalSubmissionAttachmentRequest->all());

        return redirect()->back();
    }

    public function close($wfMasterId)
    {
        $this->projectDetailsProposalService->closeProjectDetailProposalWorkflow($wfMasterId);
        Session::flash('message', __('labels.update_success'));

        return redirect(route('pms'));
    }

    public function resubmit($proposalId, $featureId)
    {
        $proposal = $this->projectDetailsProposalService->findOne($proposalId);

        return view('pms::proposal-submission.details.resubmit', compact('proposal', 'featureId'));
    }

    public function storeResubmit($proposalId, Request $request)
    {
        $proposal = $this->projectDetailsProposalService->findOrFail($proposalId);
        $updateData = [
            'status' => 'PENDING',
            'title' => $request->input('title')
        ];
        $this->projectDetailsProposalService->update($proposal, $updateData);

        // Reinitialising Workflow
        $data = [
            'feature_id' => $request->input('feature_id'),
            'message' => $request->input('message'),
            'ref_table_id' => $proposalId
        ];
        $this->workflowService->reinitializeWorkflow($data);

        //Generating notification
        $this->projectDetailsProposalService->generatePMSNotification(
            [
                'ref_table_id' => $proposalId,
                'status' => WorkflowStatus::REINITIATED
            ],
            'project_proposal_submission',
            $this->reviewUrlGenerator->getReviewUrl(
                'project-details-proposal-submitted-review',
                $this->featureService->findOne($request->input('feature_id')),
                $proposal
            )
        );
        // Notification generation done

        Session::flash('message', __('labels.save_success'));

        return redirect(route('pms'));
    }

}
