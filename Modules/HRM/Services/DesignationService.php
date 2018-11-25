<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 10/30/2018
 * Time: 12:43 PM
 */

namespace Modules\HRM\Services;


use App\Traits\CrudTrait;
use Illuminate\Http\Response;
use Modules\HRM\Repositories\DesignationRepository;

class DesignationService {
	use CrudTrait;
	protected $designationRepository;

	public function __construct( DesignationRepository $designationRepository ) {
		$this->designationRepository = $designationRepository;
		$this->setActionRepository( $this->designationRepository );
	}

	public function getDesignationList() {
		return $this->designationRepository->findAll( null, null, [ 'column' => 'id', 'direction' => 'desc' ] );
	}

	public function getEmployeeDesignations() {
		return $this->designationRepository->findAll()->pluck( 'name', 'id' )->toArray();
	}

	public function storeDesignation( $data ) {
		$designation = $this->save( $data );
		if ( $designation ) {
			return new Response( "Designation added successfully" );
		} else {
			return new Response( "Opps !  Something going wrong." );

		}


	}

	public function updateDepartment( $data, $id ) {
		$designation = $this->findOrFail( $id );
		$status      = $designation->update( $data );
		if ( $status ) {
			return new Response( "Designation updated successfully" );
		} else {
			return new Response( "Opps !  Something going wrong." );

		}
	}

	public function deleteDepartment( $id ) {
		$designation = $this->findOrFail( $id );
		$status      = $designation->delete();
		if ( $status ) {
			return new Response( "Designation Deleted successfully" );
		} else {
			return new Response( "Opps !  Something going wrong." );
		}
	}

}