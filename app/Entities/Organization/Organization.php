<?php

namespace App\Entities\Organization;

use App\Entities\Attribute;
use Illuminate\Database\Eloquent\Model;
use Modules\PMS\Entities\Project;
use Modules\RMS\Entities\Research;

class Organization extends Model
{
    protected $table = 'organizations';
    protected $fillable = ['name', 'email', 'mobile', 'address'];

    public function members()
    {
        return $this->hasMany(OrganizationMember::class, 'organization_id', 'id');
    }

    public function researches()
    {
        return $this->morphedByMany(Research::class, 'organizable');
    }

    public function projects()
    {
        return $this->morphedByMany(Project::class, 'organizable');
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'organization_id', 'id');
    }
}
