<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 10/30/2018
 * Time: 12:43 PM
 */

namespace Modules\HRM\Services;


use App\Traits\CrudTrait;
use Modules\HRM\Repositories\EmployeeDesignationRepository;

class EmployeeDesignationService {
	use CrudTrait;
	protected $employeeDesignationRepository;

	public function __construct( EmployeeDesignationRepository $employeeDesignationRepository ) {
		$this->employeeDesignationRepository = $employeeDesignationRepository;
		$this->setActionRepository( $this->employeeDesignationRepository );
	}

	public function getEmployeeDesignations() {
		return $this->employeeDesignationRepository->findAll()->pluck('name', 'id');
	}

}