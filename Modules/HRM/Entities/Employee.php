<?php

namespace Modules\HRM\Entities;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $table = "employees";
    protected $fillable = ['first_name', 'last_name', 'email', 'gender', 'department_id', 'designation_code', 'status', 'tel_office', 'tel_home', 'mobile_one', 'mobile_two'];
}
