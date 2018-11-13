<?php

namespace Modules\HRM\Http\Controllers;

use App\Traits\CrudTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Services\EmployeeTrainingService;

class EmployeeTrainingController extends Controller {
	protected $employeeTrainingService;


	public function __construct( EmployeeTrainingService $employeeTrainingService ) {
		$this->employeeTrainingService = $employeeTrainingService;
	}


	public function index() {
		return view( 'hrm::index' );
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create() {
		return view( 'hrm::create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request $request
	 *
	 * @return Response
	 */
	public function store( Request $request ) {
		$trainingInfo = $request->training;
		$response     = $this->employeeTrainingService->StoreTrainingInfo( $trainingInfo );
		Session::flash( 'message', $response->getContent() );

		return redirect()->route( 'employee.create', [ 'employee' => $response->getEmployeeId(), '#publication' ] );

	}


	public function update( Request $request, $id ) {
		$trainingInfo = $request->training;
		$response = $this->employeeTrainingService->updateTrainingInfo($trainingInfo, $id);
		Session::flash( 'message', $response->getContent() );
		$employee_id = $response->getEmployeeId();

		return redirect( '/hrm/employee/' . $employee_id .'/#training' );
	}

	/**
	 * Remove the specified resource from storage.
	 * @return Response
	 */
	public function destroy() {
	}
}
