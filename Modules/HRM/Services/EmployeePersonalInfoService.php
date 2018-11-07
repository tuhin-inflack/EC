<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 10/23/2018
 * Time: 3:54 PM
 */

namespace Modules\HRM\Services;


use Modules\HRM\Repositories\EmployeePersonalInfoRepository;

class EmployeePersonalInfoService {
	protected $employeePersonalInfoRepository;

	public function __construct( EmployeePersonalInfoRepository $employeePersonalInfoRepository ) {
		$this->employeePersonalInfoRepository = $employeePersonalInfoRepository;
	}
	public function storePersonalInfo( $data = [] ) {
		return $this->employeePersonalInfoRepository->save( $data );
	}


}