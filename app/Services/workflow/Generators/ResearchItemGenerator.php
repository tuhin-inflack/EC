<?php

namespace App\Services\workflow\Generators;

use App\Entities\workflow\WorkflowConversation;
use App\Models\DashboardItem;
use App\Models\DashboardItemSummary;
use App\Repositories\workflow\FeatureRepository;
use App\Services\UserService;
use App\Services\workflow\WorkflowService;
use Modules\RMS\Services\ResearchService;

class ResearchItemGenerator extends BaseDashboardItemGenerator
{
    private $workflowService;
    private $userService;
    private $featureRepository;
    private $researchService;
    private $workflowConversations;

    public function __construct(ResearchService $researchService, WorkflowService $workflowService,
                                UserService $userService, FeatureRepository $featureRepository, WorkflowConversation $workflowConversation)
    {
        $this->workflowService = $workflowService;
        $this->userService = $userService;
        $this->featureRepository = $featureRepository;
        $this->researchService = $researchService;
        $this->workflowConversations = $workflowConversation;
    }

    public function generateItems(): DashboardItemSummary
    {

        $dashboardItemSummary = new DashboardItemSummary();
        $dashboardItems = array();
        $user = $this->userService->getLoggedInUser();

        $designationId = $this->userService->getDesignationId($user->username);
//        dd($designationId);
        $feature = $this->featureRepository->findOneBy(['name' => config('rms.research_feature_name')]);
        $workflows = $this->workflowService->getWorkflowDetailsByUserAndFeature($user->id, [$designationId], $feature->id);
        foreach ($workflows as $key => $workflow) {
            $dashboardItem = new DashboardItem();
            $workflowMaster = $workflow->workflowMaster;
            $proposal = $this->researchService->findOne($workflowMaster->ref_table_id);

            $researchData = [
                'proposal_title' => $proposal->title,
                'remarks' => $proposal->remarks,
                'id' => $proposal->id,
            ];


            $workflowConversation = $workflow->workflowConversations[0];
            $dashboardItem->setFeatureItemId($workflow->workflowMaster->feature->id);
            $dashboardItem->setFeatureName($workflowMaster->feature->name);
            $dashboardItem->setWorkFlowConversationId($workflowConversation->id);

            $dashboardItem->setCheckUrl(
                '/rms/research-proposal-submission/review/' . $workflowMaster->ref_table_id .
                '/' . $workflowMaster->feature->name . '/' . $workflowMaster->id . '/' . $workflowConversation->id);
            $dashboardItem->setWorkFlowMasterId($workflowMaster->id);
            $dashboardItem->setWorkFlowMasterStatus($workflowMaster->status);
            $dashboardItem->setMessage($workflowConversation->message);
            $dashboardItem->setDynamicValues($researchData);
//            $dashboardItem->setRemarks($this->remarksService->findBy(['feature_id' => $feature->id,'ref_table_id' => $proposal->id]));
            array_push($dashboardItems, $dashboardItem);
        }

        $dashboardItemSummary->setDashboardItems($dashboardItems);
        return $dashboardItemSummary;

    }

    public function updateItem($itemId, $status)
    {

    }

    public function generateRejectedItems(): DashboardItemSummary
    {

    }

}