<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;

class OrganizationMember extends Model
{
    protected $fillable = [
        'organization_id',
        'name',
        'mobile',
        'address',
        'gender',
        'nid'
    ];

    public function organization(){
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }
}
