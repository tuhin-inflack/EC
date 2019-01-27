<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/23/19
 * Time: 12:17 PM
 */

namespace App\Entities\workflow;


use Illuminate\Database\Eloquent\Model;

class WorkflowConversation extends Model
{
    protected $table = 'workflow_conversations';

    protected $fillable = ['workflow_master_id', 'workflow_details_id', 'feature_id', 'message', 'status'];
}
