<?php

namespace App\Entities\Organization;

use App\Entities\AttributeValue;
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
        'nid',
        'age'
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class, 'organization_member_id', 'id');
    }
}
