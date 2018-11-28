<?php

namespace Modules\HRM\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeEducation extends Model {
	use SoftDeletes;
	protected $table = "employee_educations";
	protected $fillable = [
		"institute_id",
		"institute_degree_id",
		"institute_department_id",
		"passing_year",
		"medium",
		"duration",
		"result",
		"achievement",
		"employee_id",
	];


	public function institutes() {
		return $this->belongsTo(Institute::class , 'institute_id', 'id');
	}


}
