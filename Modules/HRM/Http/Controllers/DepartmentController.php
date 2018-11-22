<?php

namespace Modules\HRM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Services\DepartmentService;

class DepartmentController extends Controller {

	protected $departmentService;

	public function __construct( DepartmentService $departmentService ) {
		$this->departmentService = $departmentService;
	}

	public function index() {
		$departmentList = $this->departmentService->getDepartmentList();

		return view( 'hrm::department.index', compact( 'departmentList' ) );
	}


	public function create() {
		return view( 'hrm::department.create' );
	}


	public function store( Request $request ) {
		$response = $this->departmentService->storeDepartment( $request->all() );
		Session::flash( 'message', $response->getContent() );

		return redirect()->route( 'department.create' );

	}


	public function show($id) {
		$department = $this->departmentService->getDepartmentById($id);
		return view( 'hrm::department.show', compact( 'department' ) );
	}


	public function edit() {
		return view( 'hrm::edit' );
	}


	public function update( Request $request ) {
	}

	public function destroy() {
	}
}
