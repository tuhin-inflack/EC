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

class ProjectProposalItemGenerator extends BaseDashboardItemGenerator
{
    private $workflowService;
    private $userService;

    public function __construct(WorkflowService $workflowService, UserService $userService)
    {
        $this->workflowService = $workflowService;
        $this->userService = $userService;
    }

    public function generateItems(): DashboardItemSummary
    {
        $dashboardItemSummary = new DashboardItemSummary();
        $dashboardItems = array();
        $user = $this->userService->getLoggedInUser();
        $designationId = $this->userService->getDesignationId($user->username);
        $workflows = $this->workflowService->getWorkflowDetailsByUser($user->id, [$designationId]);

        foreach ($workflows as $key => $workflow) {
            $dashboardItem = new DashboardItem();
            $workflowMaster = $workflow->workflowMaster;
//            dd($workflowMaster);

            $projectData = [
                'feature_name' => $workflowMaster->feature->name,
                'rule_master_name' => $workflowMaster->ruleMaster->name,
                'rule_details' => $workflowMaster->ruleMaster->rule,
            ];

            $workflowConversation = $workflow->workflowConversations[0];
            $dashboardItem->setFeatureItemId($workflow->workflowMaster->feature->id);
            $dashboardItem->setFeatureName($workflowMaster->feature->name);
            $dashboardItem->setWorkFlowConversationId($workflowConversation->id);
            //TODO: set appropriate url
            $dashboardItem->setCheckUrl('/edit/' . $workflowMaster->ref_table_id);
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
}
