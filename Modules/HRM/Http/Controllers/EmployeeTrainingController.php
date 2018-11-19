<?php

namespace Modules\HRM\Http\Controllers;

use App\Traits\CrudTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Http\Requests\StoreEmployeeTrainingRequest;
use Modules\HRM\Http\Requests\UpdateEmployeeTrainingRequest;
use Modules\HRM\Services\EmployeeTrainingService;

class EmployeeTrainingController extends Controller {
	protected $employeeTrainingService;


	public function __construct( EmployeeTrainingService $employeeTrainingService ) {
		$this->employeeTrainingService = $employeeTrainingService;
	}


	public function store( StoreEmployeeTrainingRequest $request ) {
		$trainingInfo = $request->training;
		$response     = $this->employeeTrainingService->StoreTrainingInfo( $trainingInfo );
		Session::flash( 'message', $response->getContent() );

		return redirect()->route( 'employee.create', [ 'employee' => $response->getEmployeeId(), '#publication' ] );

	}


	public function update( UpdateEmployeeTrainingRequest $request, $id ) {
		$trainingInfo = $request->training;
		$response = $this->employeeTrainingService->updateTrainingInfo($trainingInfo, $id);
		Session::flash( 'message', $response->getContent() );
		$employee_id = $response->getEmployeeId();

		return redirect( '/hrm/employee/' . $employee_id .'/#training' );
	}


}
