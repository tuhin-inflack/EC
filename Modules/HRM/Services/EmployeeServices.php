<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 10/22/2018
 * Time: 2:58 PM
 */

namespace Modules\HRM\Services;

use App\Http\Responses\DataResponse;
use Modules\HRM\Repositories\EmployeeRepository;

class EmployeeServices {
	private $employeeRepository;


	public function __construct( EmployeeRepository $employeeRepository ) {
		$this->employeeRepository = $employeeRepository;
	}

	public function storeGeneralInfo( $data = [] ) {
		$generalInfo = $this->employeeRepository->save( $data );
		return new DataResponse($generalInfo, $generalInfo['id'], 'General information added successfully');
	}


}