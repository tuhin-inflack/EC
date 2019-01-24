<?php

namespace App\Entities\Organization;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organizations';
    protected $fillable = ['name', 'email', 'mobile', 'address'];

    public function members()
    {
        return $this->hasMany(OrganizationMember::class, 'organization_id', 'id');
    }

    public function projects()
    {
        return $this->morphedByMany(ProjectProposal::class, 'organizable');
    }
}
