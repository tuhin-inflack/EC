<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 10/22/2018
 * Time: 2:58 PM
 */

namespace Modules\HRM\Services;

use App\Http\Responses\DataResponse;
use App\Traits\CrudTrait;
use Modules\HRM\Repositories\EmployeeRepository;

class EmployeeServices {
	use CrudTrait;
	private $employeeRepository;


	public function __construct( EmployeeRepository $employeeRepository ) {
		$this->employeeRepository = $employeeRepository;
		$this->setActionRepository( $this->employeeRepository );
	}

	public function storeGeneralInfo( $data = [] ) {
		$generalInfo = $this->employeeRepository->save( $data );

		return new DataResponse( $generalInfo, $generalInfo['id'], 'General information added successfully' );
	}

	public function getEmployeeList() {
		return $this->employeeRepository->findAll();
	}



}