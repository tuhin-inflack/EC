<?php

namespace Modules\PMS\Entities;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['name', 'unit', 'organization_id'];
}
