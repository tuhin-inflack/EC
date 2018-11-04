<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 10/30/2018
 * Time: 12:43 PM
 */

namespace Modules\HRM\Services;


use Modules\HRM\Repositories\EmployeeDesignationRepository;

class EmployeeDesignationService {
	protected $employeeDesignationRepository;

	public function __construct( EmployeeDesignationRepository $employeeDesignationRepository ) {
		$this->employeeDesignationRepository = $employeeDesignationRepository;
	}

	public function getEmployeeDesignations() {

	}

}