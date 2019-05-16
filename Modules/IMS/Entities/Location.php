<?php

namespace Modules\IMS\Entities;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name', 'department_id', 'type', 'description'];
    protected $table = 'locations';
}
