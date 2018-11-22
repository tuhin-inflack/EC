<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 10/28/2018
 * Time: 6:26 PM
 */

namespace Modules\HRM\Services;


use App\Http\Responses\DataResponse;
use App\Traits\CrudTrait;
use Modules\HRM\Repositories\DepartmentRepository;
use Modules\HRM\Repositories\EmployeeDepartmentRepository;

class DepartmentService {
	use  CrudTrait;
	protected $departmentRepository;

	public function __construct( DepartmentRepository $departmentRepository ) {
		$this->departmentRepository = $departmentRepository;
		$this->setActionRepository( $this->departmentRepository );
	}


	public function storeDepartment( $data ) {
		$department = $this->save( $data );

		return new DataResponse( $department, $department->id, "Department added successfully" );

	}

	public function updateDepartment( $data, $id ) {
		$department = $this->findOrFail( $id );
		$status     = $department->update( $data );
		if ( $status ) {
			return new DataResponse( $department, $department->id, "Department updated successfully" );
		} else {
			return new DataResponse( $department, $department->id, "Opps !  Something going wrong." );

		}
	}

//	getDepartmentList providing the list of department by collection
	public function getDepartmentList() {
		return $this->departmentRepository->findAll();

	}

//	getDepartments providing department list with array for employee creation
	public function getDepartments() {
		return $this->departmentRepository->findAll()->pluck( 'name', 'id' )->toArray();
	}

	public function getDepartmentById( $id ) {
		return $this->departmentRepository->findOrFail( $id );
	}
}