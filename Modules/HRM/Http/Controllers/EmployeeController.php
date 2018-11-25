<?php

namespace Modules\HRM\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Http\Requests\StoreEmployeeGeneralInfoRequest;

use Modules\HRM\Services\DepartmentService;
use Modules\HRM\Services\DesignationService;
use Modules\HRM\Services\EmployeeDepartmentService;
use Modules\HRM\Services\EmployeeDesignationService;
use Modules\HRM\Services\EmployeeServices;

use Modules\HRM\Services\InstituteService;
use function Sodium\compare;

class EmployeeController extends Controller {

	private $employeeService;
	private $departmentService;
	private $designationService;
	private $instituteService;

	public function __construct(
		EmployeeServices $employeeServices,
		DepartmentService $departmentService,
		DesignationService $designationService, InstituteService $instituteService
	) {
		$this->employeeService    = $employeeServices;
		$this->departmentService  = $departmentService;
		$this->designationService = $designationService;
		$this->instituteService   = $instituteService;
	}


	public function index() {
		$employeeList = $this->employeeService->getEmployeeList();

		return view( 'hrm::employee.index', compact( 'employeeList' ) );
	}


	public function create( Request $request ) {

		$employeeDepartments  = $this->departmentService->getDepartments();
		$employeeDesignations = $this->designationService->getEmployeeDesignations();
		$institutes           = $this->instituteService->getInstitutes();
		$employee_id = isset( $request->employee ) ? $request->employee : '';

		return view( 'hrm::employee.create', compact( 'employeeDepartments', 'employeeDesignations', 'employee_id', 'institutes' ) );
	}


	public function store( StoreEmployeeGeneralInfoRequest $request ) {
		$response = $this->employeeService->storeGeneralInfo( $request->all() );
		Session::flash( 'message', $response->getContent() );

		return redirect()->route( 'employee.create', [ 'employee' => $response->getId(), '#personal' ] );
	}

	public function show( $id ) {
		$employee = $this->employeeService->findOne( $id, [
			'employeePersonalInfo',
			'employeeEducationInfo',
			'employeeTrainingInfo',
			'employeePublicationInfo',
			'employeeResearchInfo',
			'employeeDepartment'
		] );

		return view( 'hrm::employee.show', compact( 'employee' ) );
	}

	public function edit( $id ) {
		$employeeDepartments  = $this->departmentService->getDepartments();
		$employeeDesignations = $this->employeeDesignationService->getEmployeeDesignations();
		$employee             = $this->employeeService->findOne( $id, [
			'employeePersonalInfo',
			'employeeEducationInfo',
			'employeeTrainingInfo',
			'employeePublicationInfo',
			'employeeResearchInfo',
			'employeeDepartment'
		] );

//		dd($employee->id);

		return view( 'hrm::employee.edit', compact( 'employeeDepartments', 'employeeDesignations', 'employee' ) );
	}

	public function update( StoreEmployeeGeneralInfoRequest $request, $id ) {
		$response = $this->employeeService->updateGeneralInfo( $request->all(), $id );
		Session::flash( 'message', $response->getContent() );
		$employee_id = $response->getId();

		return redirect( '/hrm/employee/' . $employee_id );


	}


}
