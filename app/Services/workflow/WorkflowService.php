<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/22/19
 * Time: 1:10 PM
 */

namespace App\Services\workflow;

use App\Constants\WorkflowConversationStatus;
use App\Constants\WorkflowGetBackStatus;
use App\Constants\WorkflowStatus;
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
    private $flowConversationService;
    private $workflowDetailRepository;

    /**
     * WorkflowService constructor.
     * @param WorkFlowMasterRepository $workFlowMasterRepository
     * @param WorkflowRuleMasterRepository $workflowRuleMasterRepository
     * @param WorkflowConversationRepository $flowConversationRepository
     * @param WorkflowDetailRepository $workflowDetailRepository
     * @param WorkFlowConversationService $flowConversationService
     */
    public function __construct(WorkFlowMasterRepository $workFlowMasterRepository, WorkflowRuleMasterRepository $workflowRuleMasterRepository,
                                WorkflowConversationRepository $flowConversationRepository, WorkflowDetailRepository $workflowDetailRepository, WorkFlowConversationService $flowConversationService)
    {
        $this->workFlowMasterRepository = $workFlowMasterRepository;
        $this->workflowRuleMasterRepository = $workflowRuleMasterRepository;
        $this->flowConversationRepository = $flowConversationRepository;
        $this->workflowDetailRepository = $workflowDetailRepository;
        $this->flowConversationService = $flowConversationService;
        $this->setActionRepository($workflowRuleMasterRepository);
    }

    public function createWorkflow($data)
    {
        $ruleMaster = $this->workflowRuleMasterRepository->findOne($data['rule_master_id']);

        //Save Workflow master
        $workflowMaster = $this->workFlowMasterRepository->save(['feature_id' => $data['feature_id'], 'rule_master_id' => $ruleMaster->id,
            'ref_table_id' => $data['ref_table_id'], 'status' => WorkflowStatus::INITIATED, 'initiator_id' => Auth::user()->id]);

        //Save workflow details
        $workflowDetails = $this->getWorkflowDetails($workflowMaster, $ruleMaster);

        $workflowMaster->workflowDetails()->saveMany($workflowDetails);

        //Save conversation
        $this->flowConversationRepository->save(['workflow_master_id' => $workflowMaster->id, 'workflow_details_id' => $workflowMaster->workflowDetails[0]->id,
            'feature_id' => $data['feature_id'], 'message' => $data['message'], 'status' => WorkflowConversationStatus::ACTIVE]);
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
                    'is_group_notification' => $ruleDetail->is_group_notification, 'status' => $notificationOrder == 1 ? WorkflowStatus::PENDING : WorkflowStatus::INITIATED]);
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

    private function isFlowCompleted($getBackStatus, $flowDetailsList)
    {
        return ($getBackStatus == WorkflowGetBackStatus::NONE) || !$this->isPendingWorkFlow($flowDetailsList);
    }

    private function isPendingWorkFlow($flowDetailsList)
    {
        foreach ($flowDetailsList as $flowDetail) {
            if ($flowDetail . getStatus() == WorkflowStatus::PENDING) {
                return true;
            }
        }
        return false;
    }

    private function isFlowAccepted($workFlowDetails)
    {
        foreach ($workFlowDetails as $flowDetail) {
            if ($flowDetail . getStatus() != WorkflowStatus::APPROVED) {
                return false;
            }
        }
        return true;
    }

    public function updateWorkFlow($workFlowId, $workFlowConversationId, $responderId, $status, $remarks, $message)
    {

//Todo: error in line 131
        $workFlowConversation = $this->flowConversationService->getActiveConversation($workFlowConversationId);
//        dd($workFlowConversation);
        $workFlowMaster = $this->workFlowMasterRepository->findOne($workFlowId);

//Todo: error in line 137
        $this->updateWorkFlowDetails($workFlowMaster->workflowDetails, $status,
            $workFlowMaster->ruleMaster->get_back_status, $responderId, $message, $workFlowConversation->workflow_details_id, $remarks);
        if ($this->isFlowCompleted($workFlowMaster->workflowRuleMaster->get_back_status, $workFlowMaster->workflowDetails)) {
            if ($this->isFlowAccepted($workFlowMaster->workflowDetails)) {
                $workFlowMaster->status = WorkflowStatus::APPROVED;
            } else {
                $workFlowMaster->status = WorkflowStatus::REJECTED;
            }
            //TODO: Notify respective users
        }
        $workFlowMaster->setUpdateDate(new \DateTime());
        $workFlowMaster->update();
    }

    private function updateWorkFlowDetails($flowDetailsList, $responseStatus, $getBackStatus,
                                           $responderId, $message, $workFlowDetailsId, $remarks)
    {
        for ($count = 0; $count < $flowDetailsList->size(); $count++) {
            $flowDetails = $flowDetailsList[$count];

            if ($flowDetails->id == $workFlowDetailsId && $flowDetails->status == WorkflowStatus::PENDING) {
                //set response
                $flowDetails->status = $responseStatus;
                $flowDetails->responder_id = 'responder_id';
                $flowDetails->responder_remarks = $remarks;
                $this->flowConversationService->closeConversation($flowDetails->workflowMaster->id, $flowDetails->id);

                //Set next responder
                $flowDetailsNext = null;
                if ($responseStatus == WorkflowStatus::APPROVED && ($count + 1 < $flowDetailsList->size())) {
                    $flowDetailsNext = $flowDetailsList[$count + 1];
                    $flowDetailsNext->status = WorkflowStatus::PENDING;
                    $flowDetailsNext->setCreatorId($responderId); //Responder of previous step is the creator of next step
                } else
                    if ($responseStatus == WorkflowStatus::REJECTED && $getBackStatus != WorkflowGetBackStatus::NONE) {
                        if ($getBackStatus == WorkflowGetBackStatus::INITIAL || ($count - 1 < 0)) {
                            $flowDetailsNext = $flowDetailsList[0];
                        } else {
                            $flowDetailsNext = $flowDetailsList[$count - 1];
                            $flowDetailsNext->status = WorkflowStatus::PENDING;
                        }
                    }
                if ($flowDetailsNext != null) {
                    $this->flowConversationService->save(['workflow_master_id' => $flowDetailsNext->workflowMaster->id,
                        'workflow_details_id' => $flowDetailsNext->id, 'feature_id' => $flowDetailsNext->workflowMaster->feature->id,
                        'message' => $message, 'status' => WorkflowConversationStatus::ACTIVE]);
                }

                $flowDetails->update();
                break;
            }
        }
    }
}
