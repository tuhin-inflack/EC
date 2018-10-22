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
	public function create() {
		$data = $this->EmployeeServices->getFormCreationData();

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
//		dd($employee_general_info);

		return redirect( )->route('employee.create', ['general_info' => $employee_general_info]);
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
