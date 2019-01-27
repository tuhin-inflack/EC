<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/22/19
 * Time: 1:13 PM
 */

namespace App\Services\workflow;


use App\Repositories\workflow\WorkflowConversationRepository;
use App\Traits\CrudTrait;

class WorkFlowConversationService
{
    use CrudTrait;

    private $flowConversationRepository;

    /**
     * WorkFlowConversationService constructor.
     * @param WorkflowConversationRepository $flowConversationRepository
     */
    public function __construct(WorkflowConversationRepository $flowConversationRepository)
    {
        $this->flowConversationRepository = $flowConversationRepository;
    }


}
