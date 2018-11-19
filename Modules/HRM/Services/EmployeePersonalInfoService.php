<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 10/23/2018
 * Time: 3:54 PM
 */

namespace Modules\HRM\Services;


use App\Http\Responses\DataResponse;
use App\Traits\CrudTrait;
use Modules\HRM\Repositories\EmployeePersonalInfoRepository;

class EmployeePersonalInfoService {
	use CrudTrait;
	protected $employeePersonalInfoRepository;

	public function __construct( EmployeePersonalInfoRepository $employeePersonalInfoRepository ) {
		$this->employeePersonalInfoRepository = $employeePersonalInfoRepository;
		$this->setActionRepository( $this->employeePersonalInfoRepository );
	}

	public function storePersonalInfo( $data = null ) {
		$personalInfo = $this->employeePersonalInfoRepository->save( $data );

		return new DataResponse( $personalInfo, $personalInfo['employee_id'], 'Personal information added successfully' );
	}

	public function updatePersonalInfo( $data, $employeeId) {
		dd($data);

		if ( is_null($data['id']) ) {
			$personalInfo = $this->employeePersonalInfoRepository->save( $data );
			$status       = true;
		} else {
			$personalInfo = $this->findOrFail( $data['id'] );
			$status       = $personalInfo->update( $data );
		}
		if ( $status ) {
			return new DataResponse( $personalInfo, $personalInfo['employee_id'], 'Personal information updated successfully' );
		} else {
			return new DataResponse( $personalInfo, $personalInfo['employee_id'], 'Something going wrong !', 500 );
		}
	}


}