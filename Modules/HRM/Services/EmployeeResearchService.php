<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 11/5/2018
 * Time: 11:46 AM
 */

namespace Modules\HRM\Services;


use App\Traits\CrudTrait;
use Modules\HRM\Repositories\EmployeeResearchRepository;

class EmployeeResearchService {
	use  CrudTrait;
	protected $employeeResearchRepository;

	public function __construct( EmployeeResearchRepository $employeeResearchRepository ) {
		$this->employeeResearchRepository = $employeeResearchRepository;
	}

	public function storeEmployeeResearchInfo( $researchInfo ) {

	}
}