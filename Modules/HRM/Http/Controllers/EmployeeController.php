<?php

namespace Modules\HRM\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Http\Requests\StoreEmployeeGeneralInfoRequest;
use Modules\HRM\Http\Requests\StoreEmployeePersonalInfoRequest;
use Modules\HRM\Services\EmployeeDepartmentService;
use Modules\HRM\Services\EmployeeDesignationService;
use Modules\HRM\Services\EmployeeEducationService;
use Modules\HRM\Services\EmployeePersonalInfoService;
use Modules\HRM\Services\EmployeePublicationService;
use Modules\HRM\Services\EmployeeResearchService;
use Modules\HRM\Services\EmployeeServices;
use Modules\HRM\Services\EmployeeTrainingService;
use function Sodium\compare;

class EmployeeController extends Controller {

	private $employeeService;
	private $employeeDepartmentService;
	private $employeeDesignationService;

	public function __construct( EmployeeServices $employeeServices, EmployeeDepartmentService $employeeDepartmentService, EmployeeDesignationService $employeeDesignationService ) {
		$this->employeeService            = $employeeServices;
		$this->employeeDepartmentService  = $employeeDepartmentService;
		$this->employeeDesignationService = $employeeDesignationService;
	}


	public function index() {
		$employeeList = $this->employeeService->getEmployeeList();

		return view( 'hrm::employee.index', compact( 'employeeList' ) );
	}


	public function create( Request $request ) {
		$employeeDepartments  = $this->employeeDepartmentService->getEmployeeDepartments();
		$employeeDesignations = $this->employeeDesignationService->getEmployeeDesignations();

		$employee_id = isset( $request->employee ) ? $request->employee : '';

		return view( 'hrm::employee.create', compact( 'employeeDepartments', 'employeeDesignations', 'employee_id' ) );
	}


	public function store( StoreEmployeeGeneralInfoRequest $request ) {
		$response = $this->employeeService->storeGeneralInfo( $request->all() );
		Session::flash( 'message', $response->getContent() );

		return redirect()->route( 'employee.create', [ 'employee' => $response->getEmployeeId(), '#personal' ] );
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
		$employeeDepartments  = $this->employeeDepartmentService->getEmployeeDepartments();
		$employeeDesignations = $this->employeeDesignationService->getEmployeeDesignations();
		$employee             = $this->employeeService->findOne( $id, [
			'employeePersonalInfo',
			'employeeEducationInfo',
			'employeeTrainingInfo',
			'employeePublicationInfo',
			'employeeResearchInfo',
			'employeeDepartment'
		] );

		return view( 'hrm::employee.edit', compact( 'employeeDepartments', 'employeeDesignations', 'employee' ) );
	}

	public function update( StoreEmployeeGeneralInfoRequest $request, $id ) {
		$response = $this->employeeService->updateGeneralInfo( $request->all(), $id );
		Session::flash( 'message', $response->getContent() );
		$employee_id = $response->getEmployeeId();

		return redirect( '/hrm/employee/' . $employee_id );


	}



}
