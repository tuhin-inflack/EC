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
use App\Repositories\workflow\FeatureRepository;
use App\Repositories\workflow\WorkflowConversationRepository;
use App\Services\UserService;
use App\Services\workflow\WorkflowService;
use Modules\PMS\Services\ProjectProposalService;

class ProjectProposalItemGenerator extends BaseDashboardItemGenerator
{
    private $workflowService;
    private $userService;
    private $projectProposalService;
    private $featureRepository;
    private $flowConversationService;


    public function __construct(WorkflowService $workflowService,
                                UserService $userService,
                                ProjectProposalService $projectProposalService,
                                FeatureRepository $featureRepository,
                                WorkflowConversationRepository $workflowConversationRepository)
    {
        $this->workflowService = $workflowService;
        $this->userService = $userService;
        $this->projectProposalService = $projectProposalService;
        $this->featureRepository = $projectProposalService;
        $this->projectProposalService = $projectProposalService;
    }

    public function generateItems(): DashboardItemSummary
    {
        $dashboardItemSummary = new DashboardItemSummary();
        $dashboardItems = array();
        $user = $this->userService->getLoggedInUser();
        $designationId = $this->userService->getDesignationId($user->username);
        $feature = $this->featureRepository->findOneBy(['name' => config('constants.project_proposal_feature_name')]);
        $workflows = $this->workflowService->getWorkflowDetailsByUserAndFeature($user->id, [$designationId], $feature->id);
        foreach ($workflows as $key => $workflow) {
            $dashboardItem = new DashboardItem();
            $workflowMaster = $workflow->workflowMaster;
            $proposal = $this->projectProposalService->findOne($workflowMaster->ref_table_id);

            $projectData = [
                'feature_name' => $feature->name,
                'project_title' => $proposal->title,
                'requested_by' => $proposal->proposalSubmittedBy->name,
            ];

            $workflowConversation = $workflow->workflowConversations[0];
            $dashboardItem->setFeatureItemId($workflow->workflowMaster->feature->id);
            $dashboardItem->setFeatureName($workflowMaster->feature->name);
            $dashboardItem->setWorkFlowConversationId($workflowConversation->id);
            //TODO: set appropriate url
            $dashboardItem->setCheckUrl(route('project-proposal-submitted-review', ['proposalId' => $workflowMaster->ref_table_id, 'wfMasterId' => $workflowMaster->id, 'wfConvId' => $workflowConversation->id ]));
            $dashboardItem->setWorkFlowMasterId($workflowMaster->id);
            $dashboardItem->setWorkFlowMasterStatus($workflowMaster->status);
            $dashboardItem->setMessage($workflowConversation->message);
            //TODO: add dynamic items as array. Receive data from $workflowMaster reference id
            $dashboardItem->setDynamicValues($projectData);
            array_push($dashboardItems, $dashboardItem);
        }

        $dashboardItemSummary->setDashboardItems($dashboardItems);
        return $dashboardItemSummary;
    }

    public function updateItem($itemId, $status)
    {
        $proposal = $this->projectProposalService->findOne($itemId);
        $this->projectProposalService->update($proposal, ['status' => $status]);
    }

    public function generateRejectedItems(): DashboardItemSummary
    {
        $dashboardItemSummary = new DashboardItemSummary();
        $dashboardItems = array();
        $user = $this->userService->getLoggedInUser();
        $feature = $this->featureRepository->findOneBy(['name' => config('constants.research_proposal_feature_name')]);
        $workflows = $this->workflowService->getRejectedItems($user->id, $feature->id);
        foreach ($workflows as $key => $workflowMaster) {
            $dashboardItem = new DashboardItem();
            $researchData = [
                'proposal_title' => $workflowMaster->researchProposalSubmission->title,
                'research_title' => $workflowMaster->researchProposalSubmission->requester->title,
                'remarks' => $workflowMaster->researchProposalSubmission->requester->remarks,
            ];

            $workflowConversation = $this->flowConversationService->getActiveConversationByWorkFlow($workflowMaster->id);
            $dashboardItem->setFeatureItemId($feature->id);
            $dashboardItem->setFeatureName($feature->name);
            $dashboardItem->setWorkFlowConversationId($workflowConversation->id);
            //TODO: set appropriate url (done)
            $dashboardItem->setCheckUrl(
                '/rms/research-proposal-submission/review/' . $workflowMaster->ref_table_id .
                '/' . $feature->name . '/' . $workflowMaster->id . '/' . $workflowConversation->id);
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
}
