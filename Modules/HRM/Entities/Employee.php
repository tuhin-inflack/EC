<?php

namespace Modules\HRM\Entities;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
	protected $table = "employees";
	protected $fillable = [
		'first_name',
		'last_name',
		'photo',
		'employee_id',
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
		return $this->hasMany( EmployeeEducation::class );
	}

	public function employeeTrainingInfo() {
		return $this->hasMany( EmployeeTraining::class );
	}

	public function employeePublicationInfo() {
		return $this->hasMany( EmployeePublication::class );
	}

	public function employeeResearchInfo() {
		return $this->hasMany( EmployeeResearchInfo::class );
	}

	public function employeeDepartment() {
		return $this->belongsTo(Department::class , 'department_id', 'id');
	}

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_code', 'id');
	}

    public function getName()
    {
        return $this->first_name . ' ' . $this->last_name;
	}
}
