<?php

namespace Modules\PMS\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;

class ProjectDetailProposal extends Model
{
    protected $table = 'project_detail_proposals';

    protected $fillable = ['project_request_id', 'auth_user_id', 'title', 'status'];

    public function projectDetailProposalFiles()
    {
        return $this->hasMany(ProjectDetailProposalAttachment::class, 'proposal_id', 'id');
    }

    public function proposalSubmittedBy()
    {
        return $this->belongsTo(User::class, 'auth_user_id', 'id');
    }
}
