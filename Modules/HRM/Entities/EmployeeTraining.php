<?php

namespace Modules\HRM\Entities;

use Illuminate\Database\Eloquent\Model;

class EmployeeTraining extends Model {
	protected $modelName = "employee_trainings";
	protected $fillable = [
		"course_name",
		"organization_name",
		"duration",
		"training_year",
		"result",
		"organization_country",
		"achievement",
		"employee_id"
	];
}
