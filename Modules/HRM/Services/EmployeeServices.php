<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 10/22/2018
 * Time: 2:58 PM
 */

namespace Modules\HRM\Services;

use Modules\HRM\Repositories\EmployeeEducationRepository;
use Modules\HRM\Repositories\EmployeePersonalInfoRepository;
use Modules\HRM\Repositories\EmployeeRepository;

class EmployeeServices {
	private $employeeRepository;
	private $employeePersonalInfoRepository;
	private $employeeEducationRepository;

	public function __construct( EmployeeRepository $employeeRepository, EmployeePersonalInfoRepository $employeePersonalInfoRepository, EmployeeEducationRepository $employeeEducationRepository ) {
		$this->employeeRepository             = $employeeRepository;
		$this->employeePersonalInfoRepository = $employeePersonalInfoRepository;
		$this->employeeEducationRepository = $employeeEducationRepository;
	}

	public function storeGeneralInfo( $data = [] ) {
		return $this->employeeRepository->save( $data );
	}


}