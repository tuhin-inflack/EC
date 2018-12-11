<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 12/9/2018
 * Time: 1:16 PM
 */

namespace Modules\HM\Services;


use App\Traits\CrudTrait;
use Illuminate\Http\Response;
use Modules\HM\Repositories\HostelBudgetRepository;

class HostelBudgetService {
	use CrudTrait;
	protected $hostelBudgetRepository;
	private $hostelBudgetSectionService;

	public function __construct( HostelBudgetRepository $hostelBudgetRepository, HostelBudgetSectionService $hostelBudgetSectionService ) {
		$this->hostelBudgetRepository     = $hostelBudgetRepository;
		$this->hostelBudgetSectionService = $hostelBudgetSectionService;
		$this->setActionRepository( $this->hostelBudgetRepository );
	}

	public function storeHostelBudget( $hostelBudgets = [], $hostelBudgetTitleId ) {
		if ( count( $hostelBudgets ) > 0 ) {
			foreach ( $hostelBudgets as $budget ) {
				$budget['hostel_budget_title_id'] = $hostelBudgetTitleId;

				$sectionInput = $budget['hostel_budget_section_id'];
				$sectionId   = (int) $sectionInput;

				$section = $this->hostelBudgetSectionService->checkSectionAvailability( $sectionId );

				if ( is_null( $section ) ) {
					$section                            = $this->hostelBudgetSectionService->save( [ 'name' => $sectionInput ] );
					$budget['hostel_budget_section_id'] = $section['id'];
				}



				$status                           = $this->hostelBudgetRepository->save( $budget );
			}

			return New Response( 'Hostel Budget added successfully' );
		} else {
			return New Response( 'Opps! Something going wrong !' );
		}
	}

}