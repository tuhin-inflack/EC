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
	private $EmployeeRepository;
	private $EmployeePersonalInfoRepository;
	private $EmployeeEducationRepository;

	public function __construct( EmployeeRepository $employee_r, EmployeePersonalInfoRepository $e_personal_i_r, EmployeeEducationRepository $e_education ) {
		$this->EmployeeRepository             = $employee_r;
		$this->EmployeePersonalInfoRepository = $e_personal_i_r;

		$this->EmployeeEducationRepository = $e_education;
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

	public function storeGeneralInfo( $data = [] ) {
		return $this->EmployeeRepository->save( $data );
	}

	public function storePersonalInfo( $data = [] ) {
		return $this->EmployeePersonalInfoRepository->save( $data );
	}

	public function storeEducationalInfo( $data = [] ) {

//		dd($data);
		if ( is_array( $data ) ) {
			foreach ( $data as $item ) {
				$education = $this->EmployeeEducationRepository->save( $item );
			}
			return $education;
		}
	}


}