<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/21/19
 * Time: 1:24 PM
 */

namespace App\Entities\workflow;


use Illuminate\Database\Eloquent\Model;

class WorkflowDetail extends Model
{
    protected $table = 'workflow_details';

    protected $fillable = ['workflow_master_id', 'rule_detail_id', 'notification_order', 'creator_id', 'responder_id'];

    public function workflowMaster()
    {
        return $this->belongsTo(WorkflowMaster::class);
    }

    public function ruleDetails()
    {
        return $this->belongsTo(WorkflowRuleDetail::class, 'rule_detail_id');
    }

}
