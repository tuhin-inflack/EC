<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 10/28/2018
 * Time: 6:26 PM
 */

namespace Modules\HRM\Services;


use App\Traits\CrudTrait;
use Modules\HRM\Repositories\EmployeeDepartmentRepository;

class EmployeeDepartmentService {
	use  CrudTrait;
	protected $employeeDepartmentRepository;

	public function __construct( EmployeeDepartmentRepository $employeeDepartmentRepository) {
		$this->employeeDepartmentRepository = $employeeDepartmentRepository;
		$this->setActionRepository( $this->employeeDepartmentRepository);
	}

	public function getEmployeeDepartments() {
		return $this->employeeDepartmentRepository->findAll()->pluck('name', 'id')->toArray();
	}
}