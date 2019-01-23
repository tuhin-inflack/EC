<?php

namespace Modules\RMS\Entities;

use App\Entities\Organization\Organization;
use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Modules\PMS\Entities\ProjectResearchTask;

class ResearchProposalSubmission extends Model
{
    protected $table = "research_proposal_submissions";
    protected $fillable = ['research_request_id', 'auth_user_id', 'title', 'start_date', 'end_date', 'description', 'status'];

    public function researchProposalSubmissionAttachments()
    {
        return $this->hasMany(ResearchProposalSubmissionAttachment::class, 'submissions_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany(ProjectResearchTask::class, 'task_for_id')->where('type', 'research');
    }

    public function submittedBy()
    {
        return $this->belongsTo(User::class, 'auth_user_id', 'id');
    }
    public function organizations()
    {
        return $this->morphToMany(Organization::class, 'organizable');
    }
}
