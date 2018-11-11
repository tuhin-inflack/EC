<?php

namespace Modules\HRM\Entities;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
	protected $table = "employees";
	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'gender',
		'department_id',
		'designation_code',
		'status',
		'tel_office',
		'tel_home',
		'mobile_one',
		'mobile_two'
	];

	public function employeePersonalInfo() {
		return $this->hasOne( EmployeePersonalInfo::class );
	}

	public function employeeEducationInfo() {
		return $this->hasOne( EmployeeEducation::class );
	}

	public function employeeTrainingInfo() {
		return $this->hasOne( EmployeeTraining::class );
	}

	public function employeePublicationInfo() {
		return $this->hasOne( EmployeePublication::class );
	}

	public function employeeResearchInfo() {
		return $this->hasOne( EmployeeResearchInfo::class );
	}

	public function employeeDepartment() {
		return $this->belongsTo(EmployeeDepartment::class , 'department_id', 'id');
	}

}
