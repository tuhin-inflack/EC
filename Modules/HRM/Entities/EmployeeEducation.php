<?php

namespace Modules\HRM\Entities;

use Illuminate\Database\Eloquent\Model;

class EmployeeEducation extends Model {
	protected $table = "employee_educations";
	protected $fillable = [
		"institute_name",
		"degree_name",
		"department",
		"passing_year",
		"medium",
		"result",
		"achievement",
		"employee_id",
	];
}
