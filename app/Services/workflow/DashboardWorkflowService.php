<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/23/19
 * Time: 2:36 PM
 */

namespace App\Services\workflow;


use App\Constants\WorkflowStatus;
use App\Models\DashboardItemSummary;
use App\Repositories\workflow\FeatureRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardWorkflowService
{
    private $workflowService;
    private $featureRepository;

    public function __construct(WorkflowService $workflowService, FeatureRepository $featureRepository)
    {
        $this->workflowService = $workflowService;
        $this->featureRepository = $featureRepository;
    }


    public function getDashboardWorkflowItems($feature): DashboardItemSummary
    {
        $itemGenerator = DashboardItemGeneratorFactory::getDashboardItemGenerator($feature);
        return $itemGenerator->generateItems();
    }

    public function getDashboardRejectedWorkflowItems($feature): DashboardItemSummary
    {
        $itemGenerator = DashboardItemGeneratorFactory::getDashboardItemGenerator($feature);
        return $itemGenerator->generateRejectedItems();
    }

    public function updateDashboardItem($data)
    {
        DB::transaction(function () use ($data) {
            $itemGenerator = DashboardItemGeneratorFactory::getDashboardItemGenerator($data['feature']);
            $this->workflowService->updateWorkFlow($data['workflow_master_id'], $data['workflow_conversation_id'], Auth::user()->id,
                $data['status'], $data['remarks'], $data['message']);
            $workFlowMaster = $this->workflowService->getWorkflowMaster($data['workflow_master_id']);

            if ($workFlowMaster->status != WorkFlowStatus::INITIATED) {
                $itemGenerator->updateItem($data['item_id'], $data['status']);
            }
        });
    }
}
