<?php

namespace Modules\HRM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Services\EmployeeResearchService;

class EmployeeResearchController extends Controller {
	private $employeeResearchService;

	public function __construct( EmployeeResearchService $employeeResearchService ) {
		$this->employeeResearchService = $employeeResearchService;
	}

	public function store( Request $request ) {
		$researchInfo = $request->research;
		$response     = $this->employeeResearchService->storeResearchInfo( $researchInfo );
		Session::flash( 'message', $response->getContent() );

		return redirect()->route( 'employee.create', [ 'employee' => $response->getEmployeeId(), '#research' ] );

	}


	public function update( Request $request ) {
	}


}
