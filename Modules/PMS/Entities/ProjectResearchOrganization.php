<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectResearchOrganization extends Model
{
    protected $table = 'project_research_organization';
    protected $fillable = [
        'organization_id',
        'organization_for_id',
        'type'
    ];
}
