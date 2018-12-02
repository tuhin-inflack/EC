<?php

namespace Modules\HRM\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Entities\AcademicInstitute;
use Modules\HRM\Http\Requests\StoreEmployeeGeneralInfoRequest;

use Modules\HRM\Services\AcademicDegreeService;
use Modules\HRM\Services\AcademicDepartmentService;
use Modules\HRM\Services\AcademicInstituteService;
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
	private $academicInstituteService;
	private $academicDepartmentService;
	private $academicDegreeService;

	public function __construct(
		EmployeeServices $employeeServices,
		DepartmentService $departmentService,
		DesignationService $designationService, AcademicInstituteService $academicInstituteService,
		AcademicDepartmentService $academicDepartmentService,
		AcademicDegreeService $academicDegreeService
	) {
		$this->employeeService           = $employeeServices;
		$this->departmentService         = $departmentService;
		$this->designationService        = $designationService;
		$this->academicInstituteService  = $academicInstituteService;
		$this->academicDepartmentService = $academicDepartmentService;
		$this->academicDegreeService     = $academicDegreeService;
	}


	public function index() {
		$employeeList = $this->employeeService->getEmployeeList();

		return view( 'hrm::employee.index', compact( 'employeeList' ) );
	}


	public function create( Request $request ) {

		$employeeDepartments  = $this->departmentService->getDepartments();
		$employeeDesignations = $this->designationService->getEmployeeDesignations();
		$institutes           = $this->academicInstituteService->getInstitutes();
		$academicDepartments  = $this->academicDepartmentService->getAcademicDepartments();
		$academicDegree       = $this->academicDegreeService->getAcademicDegree();
		$academicDurations = $this->academicInstituteService->getDegreeDuration();

		$employee_id          = isset( $request->employee ) ? $request->employee : '';

		return view( 'hrm::employee.create', compact( 'employeeDepartments', 'employeeDesignations', 'employee_id', 'institutes', 'academicDepartments', 'academicDegree' , 'academicDurations') );
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
		$employeeDesignations = $this->designationService->getEmployeeDesignations();
		$institutes           = $this->academicInstituteService->getInstitutes();
		$academicDepartments  = $this->academicDepartmentService->getAcademicDepartments();
		$academicDegree       = $this->academicDegreeService->getAcademicDegree();

		$employee = $this->employeeService->findOne( $id, [
			'employeePersonalInfo',
			'employeeEducationInfo',
			'employeeTrainingInfo',
			'employeePublicationInfo',
			'employeeResearchInfo',
			'employeeDepartment'
		] );

//		dd($employee->id);

		return view( 'hrm::employee.edit', compact( 'employeeDepartments', 'employeeDesignations', 'employee', 'institutes', 'academicDepartments', 'academicDegree' ) );
	}

	public function update( StoreEmployeeGeneralInfoRequest $request, $id ) {
		$response = $this->employeeService->updateGeneralInfo( $request->all(), $id );
		Session::flash( 'message', $response->getContent() );
		$employee_id = $response->getId();

		return redirect( '/hrm/employee/' . $employee_id );


	}


}
