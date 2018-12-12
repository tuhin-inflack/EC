<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 12/5/2018
 * Time: 4:31 PM
 */

namespace Modules\HM\Services;


use App\Traits\CrudTrait;
use Illuminate\Http\Response;
use Modules\HM\Repositories\HostelBudgetSectionRepository;

class HostelBudgetSectionService {
	use CrudTrait;
	protected $hostelBudgetSectionRepository;

	public function __construct( HostelBudgetSectionRepository $hostelBudgetSectionRepository ) {
		$this->hostelBudgetSectionRepository = $hostelBudgetSectionRepository;
		$this->setActionRepository( $this->hostelBudgetSectionRepository );

	}

	public function storeHostelBudgetSection( $data = [] ) {
		$status = $this->save( $data );
		if ( $status ) {
			return New Response( 'Section added successfully' );
		} else {
			return New Response( 'Section not saved! Something going wrong !' );
		}
	}

	public function updateBudgetSection( $data = [], $id = null ) {
		$section = $this->findOrFail( $id );
		$status  = $section->update();
		if ( $status ) {
			return New Response( 'Section updated successfully' );
		} else {
			return New Response( 'Section not updated! Something going wrong !' );
		}
	}

	public function getHostelBudgetSectionLists() {
		return $this->findAll();
	}

	public function getHostelBudgetSectionAsPluck() {
		$budgetSection = $this->findAll()->pluck( 'name', 'id' );

		return $budgetSection;
	}

	public function checkSectionAvailability( $sectionId ) {
		return $this->hostelBudgetSectionRepository->checkAvailableId( $sectionId );
	}

}



