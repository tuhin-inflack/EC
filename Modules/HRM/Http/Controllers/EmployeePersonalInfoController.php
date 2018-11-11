<?php

namespace Modules\HRM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\HRM\Http\Requests\StoreEmployeePersonalInfoRequest;
use Modules\HRM\Services\EmployeePersonalInfoService;

class EmployeePersonalInfoController extends Controller {
	private $employeePersonalInfoService;

	public function __construct( EmployeePersonalInfoService $employeePersonalInfoService ) {
		$this->employeePersonalInfoService = $employeePersonalInfoService;
	}

	public function store( StoreEmployeePersonalInfoRequest $request ) {
		$personalInfo = $this->employeePersonalInfoService->storePersonalInfo( $request->all() );
	}


}
