<?php

namespace Modules\PMS\Entities;

use App\Entities\Organization\Organization;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['name', 'unit', 'organization_id'];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

    public function values()
    {
        return $this->hasMany(AttributeValue::class, 'attribute_id', 'id');
    }
}
