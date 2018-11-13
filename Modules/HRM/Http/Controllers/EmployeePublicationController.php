<?php

namespace Modules\HRM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Services\EmployeePublicationService;

class EmployeePublicationController extends Controller {
	private $employeePublicationService;

	public function __construct( EmployeePublicationService $employeePublicationService ) {
		$this->employeePublicationService = $employeePublicationService;
	}

	public function store( Request $request ) {
		$publications        = $request->publication;
		$employeePublication = $this->employeePublicationService->storePublicationInfo( $publications );

		return redirect()->route( 'employee.create', [ 'employee' => $employeePublication['employee_id'] ] )
		                 ->with( 'success', 'Employee Publication saved successfully!' );
	}


	public function update( Request $request, $id ) {
		$publications = $request->publication;

		$response = $this->employeePublicationService->updatePublicationInfo($publications, $id);
		Session::flash( 'message', $response->getContent() );
		$employee_id = $response->getEmployeeId();

		return redirect( '/hrm/employee/' . $employee_id .'/#publication' );
	}

}
