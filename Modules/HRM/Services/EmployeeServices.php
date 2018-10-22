<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 10/22/2018
 * Time: 2:58 PM
 */

namespace Modules\HRM\Services;

use Modules\HRM\Repositories\EmployeeRepository;

class EmployeeServices {
	private $EmployeeRepository;

	public function __construct( EmployeeRepository $employee_repository ) {
		$this->EmployeeRepository = $employee_repository;
	}

	public function getFormCreationData() {
		$data = [
			'departments'      => [ 'HR', 'Accounts', 'Marketing' ],
			'designations'     => [ 'JSE' => 'Junior Software Engineer', 'SSE' => 'Senior Software Engineer' ],
			'genders'          => [ 'male' => 'Male', 'female' => 'Female', 'both' => 'Both' ],
			'statuses'         => [ 'present', 'on leave' ],
			'marital_statuses' => [ 'Married', 'Unmarried' ],
		];

		return $data;
	}
}