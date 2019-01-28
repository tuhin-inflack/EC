<?php

namespace Modules\PMS\Entities;

use App\Entities\Organization\Organization;
use App\Entities\monthlyUpdate\ProjectResearchMonthlyUpdate;
use Illuminate\Database\Eloquent\Model;

class ProjectProposal extends Model
{
    protected $table = 'project_proposals';

    protected $fillable = ['title', 'remarks', 'status'];

    public function projectProposalFiles()
    {
        return $this->hasMany(ProjectProposalFile::class, 'proposal_id', 'id');
    }

    public function projectResearchOrg()
    {
        return $this->hasMany(ProjectResearchOrganization::class, 'organization_for_id', 'id');
    }

    public function task()
    {
        return $this->hasMany(ProjectResearchTask::class, 'task_for_id')->where('type', 'project');
    }

    public function organizations()
    {
        return $this->morphToMany(Organization::class, 'organizable');
    }

    public function monthlyUpdates()
    {
        return $this->hasMany(ProjectResearchMonthlyUpdate::class, 'update_for_id')->where('type', 'project');
    }
}
