<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 11/4/2018
 * Time: 7:02 PM
 */

namespace Modules\HRM\Services;


use Modules\HRM\Repositories\EmployeeEducationRepository;

class EmployeeEducationService {
	protected $employeeEducationRepository;

	public function __construct( EmployeeEducationRepository $employeeEducationRepository ) {
		$this->employeeEducationRepository = $employeeEducationRepository;
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