<?php

namespace Modules\HRM\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeEducation extends Model {
	use SoftDeletes;
	protected $table = "employee_educations";
	protected $fillable = [
		"institute_name",
		"degree_name",
		"department",
		"passing_year",
		"medium",
		"duration",
		"result",
		"achievement",
		"employee_id",
	];

}
