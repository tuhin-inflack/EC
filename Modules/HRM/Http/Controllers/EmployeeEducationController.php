<?php

namespace Modules\HRM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Http\Requests\StoreEmployeeEducationRequest;
use Modules\HRM\Http\Requests\UpdateEmployeeEducationRequest;
use Modules\HRM\Services\EmployeeEducationService;

class EmployeeEducationController extends Controller {
	private $employeeEducationService;

	public function __construct( EmployeeEducationService $employeeEducationService ) {
		$this->employeeEducationService = $employeeEducationService;
	}

	public function store( StoreEmployeeEducationRequest $request ) {
		$educationalInfo = $request->education;
		$response        = $this->employeeEducationService->storeEducationalInfo( $educationalInfo );
		Session::flash( 'message', $response->getContent() );

		return redirect()->route( 'employee.create', [ 'employee' => $response->getId(), '#training' ] );

	}

	public function update(UpdateEmployeeEducationRequest $request, $id) {
		$educationalInfo = $request->education;
		$response = $this->employeeEducationService->updateEducationInfo($educationalInfo, $id);
		Session::flash( 'message', $response->getContent() );
		$employee_id = $response->getId();

		return redirect( '/hrm/employee/' . $employee_id .'/#education' );
	}


}
