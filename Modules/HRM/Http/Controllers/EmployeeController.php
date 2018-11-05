<?php

namespace Modules\HRM\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Services\EmployeeDepartmentService;
use Modules\HRM\Services\EmployeeDesignationService;
use Modules\HRM\Services\EmployeeEducationService;
use Modules\HRM\Services\EmployeePersonalInfoService;
use Modules\HRM\Services\EmployeeServices;
use Modules\HRM\Services\EmployeeTrainingService;

class EmployeeController extends Controller {

	private $employeeService;
	private $employeeDepartmentService;
	private $employeeDesignationService;
	private $employeePersonalInfoService;
	private $employeeEducationService;
	private $employeeTrainingService;

	public function __construct(
		EmployeeServices $employeeServices, EmployeeDepartmentService $employeeDepartmentService,
		EmployeeDesignationService $employeeDesignationService, EmployeePersonalInfoService $employeePersonalInfoService,
		EmployeeEducationService $employeeEducationService, EmployeeTrainingService $employeeTrainingService
	) {
		$this->employeeService             = $employeeServices;
		$this->employeeDepartmentService   = $employeeDepartmentService;
		$this->employeeDesignationService  = $employeeDesignationService;
		$this->employeePersonalInfoService = $employeePersonalInfoService;
		$this->employeeEducationService    = $employeeEducationService;
		$this->employeeTrainingService     = $employeeTrainingService;
	}


	public function index() {

		return view( 'hrm::employee.index' );
	}


	public function create( Request $request ) {
		$employeeDepartments  = $this->employeeDepartmentService->getEmployeeDepartments();
		$employeeDesignations = $this->employeeDesignationService->getEmployeeDesignations();
		if ( ! empty( $request->employee ) ) {
			$employee_id = $request->employee;
		}

		return view( 'hrm::employee.create', compact( 'employeeDepartments', 'employeeDesignations', 'employee_id' ) );
	}


	public function storeGeneralInfo( Request $request ) {
		$employee_general_info = $this->employeeService->storeGeneralInfo( $request->all() );

		return redirect()->route( 'employee.create', [ 'employee' => $employee_general_info ] )
		                 ->with( 'success', 'Employee general information saved successfully!' );
	}

	public function storePersonalInfo( Request $request ) {
		$personalInfo = $this->employeePersonalInfoService->storePersonalInfo( $request->all() );

		return redirect()->route( 'employee.create', [ 'employee' => $personalInfo['employee_id'] ] )
		                 ->with( 'success', 'Employee personal information saved successfully!' );

	}

	public function storeEducationalInfo( Request $request ) {
		$educationalInfo         = $request->education;
		$employee_education_info = $this->employeeEducationService->storeEducationalInfo( $educationalInfo );

		return redirect()->route( 'employee.create', [ 'employee' => $employee_education_info['employee_id'] ] )
		                 ->with( 'success', 'Employee Educational information saved successfully!' );
	}

	public function storeTrainingInfo( Request $request ) {
		$trainingInfo = $request->training;
		$employeee    = $this->employeeTrainingService->StoreTrainingInfo( $trainingInfo );
		return redirect()->route( 'employee.create', [ 'employee' => $employeee['employee_id'] ] )
		                 ->with( 'success', 'Employee Training information saved successfully!' );
	}

	public function storePublicationInfo(
		Request $request
	) {
		dd( $request->publication );
	}

	public function storeResearchInfo(
		Request $request
	) {
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
	public
	function edit() {
		return view( 'hrm::edit' );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request $request
	 *
	 * @return Response
	 */
	public
	function update(
		Request $request
	) {
	}

	/**
	 * Remove the specified resource from storage.
	 * @return Response
	 */
	public
	function destroy() {
	}
}
