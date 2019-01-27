<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/22/19
 * Time: 1:10 PM
 */

namespace App\Services\workflow;


use App\Entities\workflow\WorkflowDetail;
use App\Entities\workflow\WorkflowMaster;
use App\Entities\workflow\WorkflowRuleMaster;
use App\Repositories\workflow\WorkflowRuleMasterRepository;
use App\Traits\CrudTrait;
use Illuminate\Support\Facades\Auth;

class WorkflowService
{
    use CrudTrait;

    private $workFlowMasterRepository;
    private $workflowRuleMasterRepository;
    private $flowConversationService;

    /**
     * WorkflowService constructor.
     * @param WorkFlowMasterRepository $workFlowMasterRepository
     * @param WorkflowRuleMasterRepository $workflowRuleMasterRepository
     * @param WorkFlowConversationService $flowConversationService
     */
    public function __construct(WorkFlowMasterRepository $workFlowMasterRepository, WorkflowRuleMasterRepository $workflowRuleMasterRepository,
                                WorkFlowConversationService $flowConversationService)
    {
        $this->workFlowMasterRepository = $workFlowMasterRepository;
        $this->workflowRuleMasterRepository = $workflowRuleMasterRepository;
        $this->flowConversationService = $flowConversationService;
        $this->setActionRepository($workflowRuleMasterRepository);
    }

    public function createWorkflow($data)
    {
        $ruleMaster = $this->workflowRuleMasterRepository->findOne($data['rule_master_id']);
        $workflowMaster = $this->workflowRuleMasterRepository->save(['feature_id' => $data['feature_id'], 'rule_master_id' => $ruleMaster->id,
            'ref_table_id' => $data['ref_table_id'], 'status' => 'PENDING', 'initiator_id' => Auth::user()->id]);
        $workflowDetails = $this->getWorkflowDetails($workflowMaster);
        $workflowMaster->workflowDetails()->saveMany([$workflowDetails]);
        $this->flowConversationService->save(['workflow_master_id' => $workflowMaster->id, $workflowMaster->workflowDetails[0]->id,
            'feature_id' => $data['feature_id'], 'message' => $data['message'], 'status' => 'ACTIVE']);
    }

    private function getWorkflowDetails(WorkflowMaster $workflowMaster, WorkflowRuleMaster $workflowRuleMaster)
    {
        $workflowDetailList = array();
        $notificationOrder = 1;
        $workflowRuleDetailList = $workflowRuleMaster->ruleDetails;

        foreach ($workflowRuleDetailList as $ruleDetail) {
            for ($i = 0; $i <= $ruleDetail->number_of_responder; $i++) {
                $workflowDetail = new WorkflowDetail(['workflow_master_id' => $workflowMaster->id, 'rule_detail_id' => $ruleDetail->id,
                    'designation_id' => $ruleDetail->designation_id, 'notification_order' => $notificationOrder,
                    'status' => $notificationOrder == 1 ? 'INITIATED' : 'PENDING']);
                array_push($workflowDetailList, $workflowDetail);
                $notificationOrder++;
            }
        }

        return $workflowDetailList;

    }

    public function getWorkFlowNotification($userId, $designationId)
    {
        $workFlowMasterList = $this->workFlowMasterRepository->getByDesignationAndUser($userId, $designationId);
        return $workFlowMasterList;
    }
}
