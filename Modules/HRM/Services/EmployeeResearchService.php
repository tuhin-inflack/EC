<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 11/5/2018
 * Time: 11:46 AM
 */

namespace Modules\HRM\Services;


use App\Http\Responses\DataResponse;
use App\Traits\CrudTrait;
use Modules\HRM\Repositories\EmployeeResearchRepository;

class EmployeeResearchService {
	use  CrudTrait;
	protected $employeeResearchRepository;

	public function __construct( EmployeeResearchRepository $employeeResearchRepository ) {
		$this->employeeResearchRepository = $employeeResearchRepository;
	}

	public function storeResearchInfo( $researchInfo ) {
		foreach ( $researchInfo as $research ) {
			$research = $this->employeeResearchRepository->save($research);

		}
		return new DataResponse( $research, $research['employee_id'], 'Research information added successfully' );

	}
}