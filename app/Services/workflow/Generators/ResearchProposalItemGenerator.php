<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/28/19
 * Time: 11:16 AM
 */

namespace App\Services\workflow\Generators;


use App\Models\DashboardItem;
use App\Models\DashboardItemSummary;
use App\Services\UserService;
use App\Services\workflow\WorkflowService;
use Modules\RMS\Services\ResearchProposalSubmissionService;

class ResearchProposalItemGenerator extends BaseDashboardItemGenerator
{
    private $workflowService;
    private $userService;
    private $proposalSubmissionService;

    /**
     * ResearchProposalItemGenerator constructor.
     * @param WorkflowService $workflowService
     * @param UserService $userService
     * @param ResearchProposalSubmissionService $proposalSubmissionService
     */
    public function __construct(WorkflowService $workflowService, UserService $userService, ResearchProposalSubmissionService $proposalSubmissionService)
    {
        $this->workflowService = $workflowService;
        $this->userService = $userService;
        $this->proposalSubmissionService = $proposalSubmissionService;
    }


    public function generateItems(): DashboardItemSummary
    {

        $dashboardItemSummary = new DashboardItemSummary();
        $dashboardItems = array();
        $user = $this->userService->getLoggedInUser();
//        dd($user);
        $designationId = $this->userService->getDesignationId($user->username);
//        dd($designationId);
        $workflows = $this->workflowService->getWorkflowDetailsByUser($user->id, [$designationId]);
//        dd($workflows);
        foreach ($workflows as $key => $workflow) {
            $dashboardItem = new DashboardItem();
            $workflowMaster = $workflow->workflowMaster;
//            dd($workflowMaster);
//            dd($workflowMaster->researchProposalSubmission->requester);
            $researchData = [
                'proposal_title' => $workflowMaster->researchProposalSubmission->title,
                'research_title' => $workflowMaster->researchProposalSubmission->requester->title,
                'remarks' => $workflowMaster->researchProposalSubmission->requester->remarks,
            ];



            $workflowConversation = $workflow->workflowConversations[0];
            $dashboardItem->setFeatureItemId($workflow->workflowMaster->feature->id);
            $dashboardItem->setFeatureName($workflowMaster->feature->name);
            $dashboardItem->setWorkFlowConversationId($workflowConversation->id);
            //TODO: set appropriate url (done)
            $dashboardItem->setCheckUrl('/rms/research-proposal-submission/review/' . $workflowMaster->ref_table_id);
            $dashboardItem->setWorkFlowMasterId($workflowMaster->id);
            $dashboardItem->setWorkFlowMasterStatus($workflowMaster->status);
            $dashboardItem->setMessage($workflowConversation->message);
            //TODO: add dynamic items as array. Receive data from $workflowMaster reference id (done)
            $dashboardItem->setDynamicValues($researchData);
            array_push($dashboardItems, $dashboardItem);
        }

        $dashboardItemSummary->setDashboardItems($dashboardItems);
        return $dashboardItemSummary;
    }

    public function updateItem($itemId, $status)
    {
        $proposal = $this->proposalSubmissionService->findOne($itemId);
        $this->proposalSubmissionService->update($proposal, $status);
    }
}
