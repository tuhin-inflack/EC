<?php
/**
 * Created by PhpStorm.
 * User: bs-205
 * Date: 3/4/19
 * Time: 12:06 PM
 */

namespace App\Services\Sharing;


use App\Repositories\Sharing\ShareConversationRepository;
use App\Repositories\workflow\WorkflowMasterRepository;
use App\Services\workflow\WorkFlowConversationService;
use App\Traits\CrudTrait;
use http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Modules\HRM\Repositories\DesignationRepository;
use Modules\RMS\Entities\Research;

class ShareConversationService
{
    use CrudTrait;
    private $shareConversationRepository;
    private $workflowConversationService;
    private $workflowMasterRepository;
    private $designationRepository;

    public function __construct(ShareConversationRepository $conversationRepository, WorkFlowConversationService $workFlowConversationService,
                                WorkflowMasterRepository $workflowMasterRepository, DesignationRepository $designationRepository)
    {
        $this->shareConversationRepository = $conversationRepository;
        $this->workflowConversationService = $workFlowConversationService;
        $this->workflowMasterRepository = $workflowMasterRepository;
        $this->designationRepository = $designationRepository;
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
        $this->shareConversationRepository->save($data);
        return Response(trans('labels.save_success'));

    }
}