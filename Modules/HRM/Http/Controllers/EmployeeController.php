<?php

namespace Modules\HRM\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Services\EmployeeDepartmentService;
use Modules\HRM\Services\EmployeeDesignationService;
use Modules\HRM\Services\EmployeeServices;

class EmployeeController extends Controller {

	private $employeeService;
	private $employeeDepartmentService;
	private $employeeDesignationService;

	public function __construct( EmployeeServices $employeeServices, EmployeeDepartmentService $employeeDepartmentService, EmployeeDesignationService $employeeDesignationService ) {
		$this->employeeService            = $employeeServices;
		$this->employeeDepartmentService  = $employeeDepartmentService;
		$this->employeeDesignationService = $employeeDesignationService;
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

		$data        = $this->employeeService->getFormCreationData();
		$departments = $this->employeeDepartmentService->getEmployeeDepartments();
		$designations = $this->employeeDesignationService->getEmployeeDesignations();

		if ( ! empty( $request->employee ) ) {
			$employee_id = $request->employee;
		}

		return view( 'hrm::employee.create', compact( 'departments', 'employee_id', 'data' ) );
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
		$employee_general_info = $this->employeeService->storeGeneralInfo( $request->all() );

		return redirect()->route( 'employee.create', [ 'employee' => $employee_general_info ] )
		                 ->with( 'success', 'Employee general information saved successfully!' );
	}

	public function storePersonalInfo( Request $request ) {
		$employee_personal_info = $this->employeeService->storePersonalInfo( $request->all() );

		return redirect()->route( 'employee.create', [ 'employee' => $employee_personal_info['employee_id'] ] )
		                 ->with( 'success', 'Employee personal information saved successfully!' );

	}

	public function storeEducationalInfo( Request $request ) {
		$education_data = $request->education;
//		dd($education_data);
		$employee_education_info = $this->employeeService->storeEducationalInfo( $education_data );

		return redirect()->route( 'employee.create', [ 'employee' => $employee_education_info['employee_id'] ] )
		                 ->with( 'success', 'Employee Educational information saved successfully!' );
	}

	public function storeTrainingInfo( Request $request ) {
		dd( $request->training );
	}

	public function storePublicationInfo( Request $request ) {
		dd( $request->publication );
	}

	public function storeResearchInfo( Request $request ) {
		dd( $request->research );
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
