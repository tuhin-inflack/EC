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
use Modules\HRM\Entities\AcademicInstitute;
use Modules\HRM\Repositories\EmployeeEducationRepository;

class EmployeeEducationService {
	use CrudTrait;
	protected $employeeEducationRepository;
	protected $academicInstituteService;
	protected $academicDepartmentService;
	protected $academicDegreeService;

	public function __construct( EmployeeEducationRepository $employeeEducationRepository,
		AcademicInstituteService $academicInstituteService, AcademicDepartmentService $academicDepartmentService , AcademicDegreeService $academicDegreeService) {
		$this->employeeEducationRepository = $employeeEducationRepository;
		$this->academicInstituteService            = $academicInstituteService;
		$this->academicDepartmentService = $academicDepartmentService;
		$this->academicDegreeService = $academicDegreeService;
		$this->setActionRepository( $this->employeeEducationRepository );
	}

	public function storeEducationalInfo( $data = null ) {
		foreach ( $data as $item ) {
			if ( ! is_null( $item['other_institute_name'] ) ) {
				$newInstitute['name'] = $item['other_institute_name'];
				$institute          = $this->academicInstituteService->storeInstitute( $newInstitute );
				$item['academic_institute_id'] = $institute['id'];
			}
			if ( ! is_null( $item['other_department_name'] ) ) {
				$newAcademicDepartment['name'] = $item['other_department_name'];
				$academicDepartment          = $this->academicDepartmentService->storeAcademicDepartment( $newAcademicDepartment );
				$item['academic_department_id'] = $academicDepartment['id'];
			}
			if ( ! is_null( $item['other_degree_name'] ) ) {
				$newDegreeName['name'] = $item['other_degree_name'];
				$academicDegree          = $this->academicDegreeService->storeAcademicDegree( $newDegreeName );
				$item['academic_degree_id'] = $academicDegree['id'];
			}
//			dd($item);
			$education = $this->employeeEducationRepository->save( $item );


		}

		return new DataResponse( $education, $education['employee_id'], 'Education information added successfully' );

	}

	public function updateEducationInfo( $data, $employeeId ) {
//		sometime full section can be removed while edit. so deleting the section
		$existingEducationsIds = $this->getEmployeeEducationIds( $employeeId );
		$newEducationIds       = array_column( $data, 'id' );
		$deletedIds            = array_diff( $existingEducationsIds, $newEducationIds );
		if ( count( $deletedIds ) > 0 ) {
			foreach ( $deletedIds as $deleted_id ) {
				$education = $this->findOrFail( $deleted_id );
				$status    = $education->delete();
			}
		}
//		end deleting

		foreach ( $data as $item ) {

			if ( isset( $item['id'] ) ) {
//				updating existing education
				$education = $this->findOrFail( $item['id'] );
				$status    = $education->update( $item );
			} else {
//				storing new education if added new education while edit

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