<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = ['name', 'email', 'mobile', 'address'];

    public function members()
    {
        return $this->hasMany(OrganizationMember::class, 'organization_id', 'id');
    }
}
