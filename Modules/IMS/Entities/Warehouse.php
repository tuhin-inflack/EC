<?php

namespace Modules\IMS\Entities;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['name', 'department_id', 'date'];
    protected $table = 'warehouses';
}
