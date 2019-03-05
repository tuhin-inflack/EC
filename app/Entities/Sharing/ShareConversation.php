<?php

namespace App\Entities\Sharing;

use App\Entities\workflow\Feature;
use App\Entities\workflow\WorkflowDetail;
use Illuminate\Database\Eloquent\Model;
use Modules\RMS\Entities\ResearchProposalSubmission;

class ShareConversation extends Model
{
    protected $table = 'share_conversations';
    protected $fillable = ['feature_id', 'ref_table_id', 'is_group_notification', 'request_ref_id', 'department_id', 'designation_id', 'to_user_id', 'from_user_id', 'message', 'status'];

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }

    public function researchProposal()
    {
        return $this->belongsTo(ResearchProposalSubmission::class, 'ref_table_id', 'id');
    }

    public function workflowDetails()
    {
        return $this->belongsTo(WorkflowDetail::class, 'request_ref_id', 'id');
    }
}
