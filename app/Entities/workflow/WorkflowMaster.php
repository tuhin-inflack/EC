<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 1/21/19
 * Time: 1:18 PM
 */

namespace App\Entities\workflow;


use App\Entities\User;
use Illuminate\Database\Eloquent\Model;

class WorkflowMaster extends Model
{
    protected $table = 'workflow_masters';

    protected $fillable = ['feature_id', 'rule_master_id', 'ref_table_id', 'status', 'initiator_id', 'reinitiate_ref_id'];

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }

    public function ruleMaster()
    {
        return $this->belongsTo(WorkflowRuleMaster::class, 'rule_master_id');
    }

    public function initiator()
    {
        $this->belongsTo(User::class, 'initiator_id');
    }
}
