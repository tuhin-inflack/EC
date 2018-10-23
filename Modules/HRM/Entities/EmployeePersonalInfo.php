<?php

namespace Modules\HRM\Entities;

use Illuminate\Database\Eloquent\Model;

class EmployeePersonalInfo extends Model {
	protected $table = "employee_personal_info";
	protected $fillable = [
		"father_name",
		"mother_name",
		"title",
		"date_of_birth",
		"job_joining_date",
		"current_position_joining_date",
		"current_position_expire_date",
		"salary_scale",
		"total_salary",
		"marital_status",
		"number_of_children",
		"employee_id",
	];
}
