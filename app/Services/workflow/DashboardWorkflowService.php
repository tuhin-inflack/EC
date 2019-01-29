<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/23/19
 * Time: 2:36 PM
 */

namespace App\Services\workflow;


use App\Models\DashboardItemSummary;

class DashboardWorkflowService
{
    /**
     * @param WorkflowService $workflowService
     */
    private $workflowService;

    /**
     * DashboardWorkflowService constructor.
     * @param WorkflowService $workflowService
     */
    public function __construct(WorkflowService $workflowService)
    {
        $this->workflowService = $workflowService;
    }


    public function getDashboardWorkflowItems($feature) : DashboardItemSummary
    {
        $itemGenerator = DashboardItemGeneratorFactory::getDashboardItemGenerator($feature);
        return $itemGenerator->generateItems();
    }

    public function updateDashboardItem($data)
    {
        $workFlowMaster = $this->workFlowService->getWorkFlowMaster($data['workflow_master_id']);
    }
}
