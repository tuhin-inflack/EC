<?php
/**
 * Created by PhpStorm.
 * User: bs-205
 * Date: 3/4/19
 * Time: 12:06 PM
 */

namespace App\Services\Sharing;


use App\Constants\NotificationType;
use App\Constants\WorkflowStatus;
use App\Repositories\Sharing\ShareConversationRepository;
use App\Repositories\workflow\WorkflowMasterRepository;
use App\Services\UserService;
use App\Services\workflow\WorkFlowConversationService;
use App\Traits\CrudTrait;
use http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Modules\HRM\Repositories\DesignationRepository;
use Modules\RMS\Entities\Research;
use App\Events\NotificationGeneration;
use App\Models\NotificationInfo;

class ShareConversationService
{
    use CrudTrait;
    private $shareConversationRepository;
    private $workflowConversationService;
    private $workflowMasterRepository;
    private $designationRepository;
    private $userService;

    public function __construct(ShareConversationRepository $conversationRepository, WorkFlowConversationService $workFlowConversationService,
                                WorkflowMasterRepository $workflowMasterRepository, DesignationRepository $designationRepository, UserService $userService)
    {
        $this->shareConversationRepository = $conversationRepository;
        $this->workflowConversationService = $workFlowConversationService;
        $this->workflowMasterRepository = $workflowMasterRepository;
        $this->designationRepository = $designationRepository;
        $this->userService = $userService;
        $this->setActionRepository($this->shareConversationRepository);
    }

    public function saveShareConversation($data)
    {

        $workflowConversation = $this->workflowConversationService->findOne($data['workflow_conversation_id']);
        $workflowMaster = $this->workflowMasterRepository->findOne($data['workflow_master_id']);


        $data['request_ref_id'] = $workflowConversation->workflow_details_id;
        $data['ref_table_id'] = $data['item_id'];
        $data['request_ref_id'] = $workflowConversation->workflow_details_id;
        $data['from_user_id'] = Auth::user()->id;
        $data['status'] = 'ACTIVE';
        $this->shareConversationRepository->save($data);
        return Response(trans('labels.save_success'));

    }

    public function getShareConversationByDesignation($designationId)
    {
        $shareConversations = $this->findBy(['designation_id' => $designationId, 'status' => 'ACTIVE']);
        if (count($shareConversations) > 0) {
            return $shareConversations;
        } else {
            return null;
        }
    }

    public function updateConversation($data, $shareConversationId)
    {

        $shareConversation = $this->findOne($shareConversationId);
        $shareConversation->update(['status' => 'CLOSE']);
        $user = $this->userService->findOne($shareConversation->from_user_id);

        $notificationData = [
            'ref_table_id' => $data['ref_table_id'],
            'message' => 'Research proposal feedback given',
            'to_employee_id' => [$user->employee->id],
        ];
        event(new NotificationGeneration(new NotificationInfo(NotificationType::RESEARCH_PROPOSAL_SUBMISSION, $notificationData)));

        return true;

    }
}