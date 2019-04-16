<?php

namespace Modules\RMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ResearchDetailInvitation extends Model
{
    protected $table = 'research_detail_invitations';
    protected $fillable = ['research_proposal_submission_id', 'title', 'end_date', 'remarks'];

    public function researchDetailInvitationAttachments()
    {
        return $this->hasMany(ResearchDetailInvitationAttachment::class, 'research_detail_invitation_id', 'id');
    }

    public function researchApprovedProposal()
    {
        return $this->hasOne(ResearchProposalSubmission::class, 'id', 'research_proposal_submission_id');
    }

    public function proposals()
    {
        return $this->hasMany(ResearchDetailSubmission::class, 'research_detail_invitation_id', 'id');
    }

}
