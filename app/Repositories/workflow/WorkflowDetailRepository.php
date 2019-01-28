<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/22/19
 * Time: 12:53 PM
 */

namespace App\Repositories\workflow;


use App\Entities\workflow\WorkflowDetail;
use App\Repositories\AbstractBaseRepository;

class WorkflowDetailRepository extends AbstractBaseRepository
{
    protected $modelName = WorkflowDetail::class;

    public function getWorkflowDetails($userId, $designationIds)
    {
        return  WorkflowDetail::with(['workflowMaster', 'workflowConversations' => function($query){
            $query->where('status', 'ACTIVE');
        }])->where('status', 'PENDING')->whereIn('designation_id', $designationIds)
            ->where(function ($query) use ($userId) {
                $query->where('is_group_notification', true)
                    ->whereNull('responder_id')
                    ->orWhere('responder_id', '!=', $userId);
            })
            ->orWhere(function ($query) use ($userId) {
                $query->where('is_group_notification', false)
                    ->Where('responder_id', $userId);
            })->get();

    }
}
