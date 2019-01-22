<?php

namespace App\Entities\Organization;

use Illuminate\Database\Eloquent\Model;

class OrganizationMember extends Model
{
    protected $table = 'organization_members';
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
