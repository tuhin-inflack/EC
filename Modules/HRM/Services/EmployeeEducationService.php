<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 11/4/2018
 * Time: 7:02 PM
 */

namespace Modules\HRM\Services;


use App\Http\Responses\DataResponse;
use App\Traits\CrudTrait;
use Modules\HRM\Repositories\EmployeeEducationRepository;

class EmployeeEducationService {
	use CrudTrait;
	protected $employeeEducationRepository;

	public function __construct( EmployeeEducationRepository $employeeEducationRepository ) {
		$this->employeeEducationRepository = $employeeEducationRepository;
		$this->setActionRepository( $this->employeeEducationRepository );
	}

	public function storeEducationalInfo( $data = null ) {

		foreach ( $data as $item ) {
			$education = $this->employeeEducationRepository->save( $item );
		}

		return new DataResponse( $education, $education['employee_id'], 'Education information added successfully' );

	}

	public function updateEducationInfo( $data, $employeeId ) {

		$existingEducationsIds = $this->getEmployeeEducationIds( $employeeId );
		$newEducationIds       = array_column( $data, 'id' );
		$deletedIds            = array_diff( $existingEducationsIds, $newEducationIds );
		if ( count( $deletedIds ) > 0 ) {
			foreach ( $deletedIds as $deleted_id ) {
				$education = $this->findOrFail( $deleted_id );
				$status    = $education->delete();
			}
		}

		foreach ( $data as $item ) {
			if ( isset( $item['id'] ) ) {
				$education = $this->findOrFail( $item['id'] );
				$status    = $education->update( $item );
			} else {
				$education = $this->employeeEducationRepository->save( $item );
				$status    = true;
			}
		}
		if ( $status ) {
			return new DataResponse( $education, $education['employee_id'], 'Education information updated successfully' );
		} else {
			return new DataResponse( $education, $education['employee_id'], 'Something going wrong !', 500 );
		}
	}

	public function getEmployeeEducationIds( $employeeId ) {

		$educations = $this->employeeEducationRepository->findBy( [ 'employee_id' => $employeeId ] )->pluck( 'employee_id', 'id' )->toArray();

		return array_keys( $educations );
	}
}