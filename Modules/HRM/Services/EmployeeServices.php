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

	public function getFormCreationData() {
		$data = [
			'designations'     => [ 'JSE' => 'Junior Software Engineer', 'SSE' => 'Senior Software Engineer' ],
			'genders'          => [ 'male' => 'Male', 'female' => 'Female', 'both' => 'Both' ],
			'statuses'         => [ 'present', 'on leave' ],
			'marital_statuses' => [ 'Married', 'Unmarried' ],
		];

		return $data;
	}

	public function storeGeneralInfo( $data = [] ) {
		return $this->employeeRepository->save( $data );
	}

	public function storePersonalInfo( $data = [] ) {
		return $this->employeePersonalInfoRepository->save( $data );
	}

	public function storeEducationalInfo( $data = [] ) {
		if ( is_array( $data ) ) {
			foreach ( $data as $item ) {
				$education = $this->employeeEducationRepository->save( $item );
			}
			return $education;
		}
	}


}