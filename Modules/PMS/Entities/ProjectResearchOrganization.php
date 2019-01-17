<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    '1' => ProjectProposal::class
]);

class ProjectResearchOrganization extends Model
{
    protected $table = 'project_research_organization';

    protected $fillable = [
        'organization_id',
        'organization_for_id',
        'type'
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }
}
