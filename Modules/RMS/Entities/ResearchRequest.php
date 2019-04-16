<?php

namespace Modules\RMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ResearchRequest extends Model
{
    protected $fillable = ['title','end_date','remarks', 'status'];
    protected $table = 'research_requests';

    public function researchRequestAttachments()
    {
        return $this->hasMany(ResearchRequestAttachment::class, 'research_request_id', 'id');
    }

    public function researchRequestReceivers()
    {
        return $this->hasMany(ResearchRequestReceiver::class, 'research_request_id', 'id');
    }

    public function researchProposals()
    {
        return $this->hasMany(ResearchProposalSubmission::class, 'research_request_id', 'id');
    }
}
