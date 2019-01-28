<?php

namespace App\Entities\monthlyUpdate;

use Illuminate\Database\Eloquent\Model;
use Modules\PMS\Entities\ProjectProposal;
use Modules\RMS\Entities\ResearchProposalSubmission;
use App\Entities\monthlyUpdate\MonthlyUpdateAttachment;


class ProjectResearchMonthlyUpdate extends Model
{
    protected $table = 'project_research_monthly_update';
    protected $fillable = ['month', 'year', 'achievements', 'plannings', 'tasks'];

    public function attachments()
    {
        return $this->hasMany(MonthlyUpdateAttachment::class, 'monthly_update_id');
    }

    public function project()
    {
        return $this->belongsTo(ProjectProposal::class, 'update_for_id', 'id');
    }

    public function research()
    {
        return $this->belongsTo(ResearchProposalSubmission::class, 'update_for_id', 'id');
    }
}

