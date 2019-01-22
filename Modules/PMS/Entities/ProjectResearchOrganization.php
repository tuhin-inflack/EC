<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectResearchOrganization extends Model
{
    protected $table = 'organizables';
    protected $fillable = [
        'organization_id',
        'organizable_id',
        'organization_type',
    ];

//    public function organization()
//    {
//        return $this->belongsTo(Organization::class, 'organization_id', 'id');
//    }
    public function organizations()
    {
        return $this->morphToMany(Organization::class, 'organizable');
    }
}
