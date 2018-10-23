<?php

namespace Modules\HRM\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Services\EmployeeServices;

class EmployeeController extends Controller {

	private $EmployeeServices;

	public function __construct( EmployeeServices $services ) {
		$this->EmployeeServices = $services;
	}


	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index() {

		return view( 'hrm::employee.index' );
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create( Request $request ) {

		$data = $this->EmployeeServices->getFormCreationData();
		if ( ! empty( $request->employee ) ) {
			$data['employee_id'] = $request->employee;
		}

		return view( 'hrm::employee.create', $data );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request $request
	 *
	 * @return Response
	 */
	public function store( Request $request ) {

	}

	public function storeGeneralInfo( Request $request ) {
		$employee_general_info = $this->EmployeeServices->storeGeneralInfo( $request->all() );
		Session::flash( 'message', 'Employee general information saved successfully!' );

		return redirect()->route( 'employee.create', [ 'employee' => $employee_general_info ] );
	}

	public function storePersonalInfo( Request $request ) {
		$employee_personal_info = $this->EmployeeServices->storePersonalInfo( $request->all() );
		Session::flash( 'message', 'Employee personal information saved successfully!' );

		return redirect()->route( 'employee.create', [ 'employee' => $employee_personal_info['employee_id'] ] );

	}

	public function storeEducationalInfo( Request $request ) {
		$employee_education_info = $this->EmployeeServices->storeEducationalInfo( $request->all() );
		Session::flash( 'message', 'Employee Educational information saved successfully!' );

		return redirect()->route( 'employee.create', [ 'employee' => $employee_education_info['employee_id'] ] );

	}



	/**
	 * Show the specified resource.
	 * @return Response
	 */
	public function show() {
		return view( 'hrm::show' );
	}

	/**
	 * Show the form for editing the specified resource.
	 * @return Response
	 */
	public function edit() {
		return view( 'hrm::edit' );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request $request
	 *
	 * @return Response
	 */
	public function update( Request $request ) {
	}

	/**
	 * Remove the specified resource from storage.
	 * @return Response
	 */
	public function destroy() {
	}
}
