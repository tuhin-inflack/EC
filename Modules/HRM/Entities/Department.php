<?php

namespace Modules\HRM\Entities;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	protected $table = "departments";
    protected $fillable = ['name', 'department_code'];
}
