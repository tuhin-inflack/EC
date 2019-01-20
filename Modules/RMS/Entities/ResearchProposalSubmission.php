<?php

namespace Modules\RMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ResearchProposalSubmission extends Model
{
    protected $table = "research_proposal_submissions";
    protected $fillable = ['research_request_id', 'auth_user_id', 'title', 'start_date', 'end_date', 'description', 'status'];

    public function researchProposalSubmissionAttachments()
    {
        return $this->hasMany(ResearchProposalSubmissionAttachment::class, 'submissions_id', 'id');
    }
}
