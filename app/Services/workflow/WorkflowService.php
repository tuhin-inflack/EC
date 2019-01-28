<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/22/19
 * Time: 1:10 PM
 */

namespace App\Services\workflow;


use App\Entities\User;
use App\Entities\workflow\WorkflowDetail;
use App\Entities\workflow\WorkflowMaster;
use App\Entities\workflow\WorkflowRuleMaster;
use App\Repositories\workflow\WorkflowConversationRepository;
use App\Repositories\workflow\WorkflowDetailRepository;
use App\Repositories\workflow\WorkflowMasterRepository;
use App\Repositories\workflow\WorkflowRuleMasterRepository;
use App\Traits\CrudTrait;
use Illuminate\Support\Facades\Auth;

class WorkflowService
{
    use CrudTrait;

    private $workFlowMasterRepository;
    private $workflowRuleMasterRepository;
    private $flowConversationRepository;
    private $workflowDetailRepository;

    /**
     * WorkflowService constructor.
     * @param WorkFlowMasterRepository $workFlowMasterRepository
     * @param WorkflowRuleMasterRepository $workflowRuleMasterRepository
     * @param WorkflowConversationRepository $flowConversationRepository
     */
    public function __construct(WorkFlowMasterRepository $workFlowMasterRepository, WorkflowRuleMasterRepository $workflowRuleMasterRepository,
                                WorkflowConversationRepository $flowConversationRepository, WorkflowDetailRepository $workflowDetailRepository)
    {
        $this->workFlowMasterRepository = $workFlowMasterRepository;
        $this->workflowRuleMasterRepository = $workflowRuleMasterRepository;
        $this->flowConversationRepository = $flowConversationRepository;
        $this->setActionRepository($workflowRuleMasterRepository);
        $this->workflowDetailRepository = $workflowDetailRepository;
    }

    public function createWorkflow($data)
    {
        $ruleMaster = $this->workflowRuleMasterRepository->findOne($data['rule_master_id']);
        $workflowMaster = $this->workFlowMasterRepository->save(['feature_id' => $data['feature_id'], 'rule_master_id' => $ruleMaster->id,
            'ref_table_id' => $data['ref_table_id'], 'status' => 1, 'initiator_id' => Auth::user()->id]);
        $workflowDetails = $this->getWorkflowDetails($workflowMaster, $ruleMaster);
        $workflowMaster->workflowDetails()->saveMany($workflowDetails);
        $this->flowConversationRepository->save(['workflow_master_id' => $workflowMaster->id, 'workflow_details_id' => $workflowMaster->workflowDetails[0]->id,
            'feature_id' => $data['feature_id'], 'message' => $data['message'], 'status' => 'ACTIVE']);
    }

    private function getWorkflowDetails(WorkflowMaster $workflowMaster, WorkflowRuleMaster $workflowRuleMaster)
    {
        $workflowDetailList = array();
        $notificationOrder = 1;
        $workflowRuleDetailList = $workflowRuleMaster->ruleDetails;

        foreach ($workflowRuleDetailList as $ruleDetail) {
            for ($i = 0; $i < $ruleDetail->number_of_responder; $i++) {
                $workflowDetail = new WorkflowDetail(['workflow_master_id' => $workflowMaster->id, 'rule_detail_id' => $ruleDetail->id,
                    'designation_id' => $ruleDetail->designation_id, 'notification_order' => $notificationOrder, 'creator_id' => Auth::user()->id,
                    'is_group_notification' => $ruleDetail->is_group_notification, 'status' => $notificationOrder == 1 ? 'PENDING' : 'INITIATED']);
                array_push($workflowDetailList, $workflowDetail);
                $notificationOrder++;
            }
        }

        return $workflowDetailList;

    }

    public function getWorkFlowNotification($userId, array $designationIds)
    {
        $workFlowMasterList = $this->workFlowMasterRepository->getByDesignationAndUser($userId, $designationIds);
        return $workFlowMasterList;
    }

    public function getWorkflowDetailsByUser($userId, array $designationIds)
    {
        return $this->workflowDetailRepository->getWorkflowDetails($userId, $designationIds);
    }
}
