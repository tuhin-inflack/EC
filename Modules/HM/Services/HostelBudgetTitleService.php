<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 12/6/2018
 * Time: 2:53 PM
 */

namespace Modules\HM\Services;


use App\Traits\CrudTrait;
use Modules\HM\Repositories\HostelBudgetTitleRepository;

class HostelBudgetTitleService {
	use CrudTrait;
	private $hostelBudgetTitleRepository;

	public function __construct( HostelBudgetTitleRepository $hostelBudgetTitleRepository ) {
		$this->hostelBudgetTitleRepository = $hostelBudgetTitleRepository;
		$this->setActionRepository( $this->hostelBudgetTitleRepository );
	}

	public function getHostelBudgetTitles() {
		$data = $this->hostelBudgetTitleRepository->getHostelBudgetTitle();

		return $data;
	}

	public function getTitleWithBudget( $id ) {
		$titleWithBudget = $this->hostelBudgetTitleRepository->getTitleWithHostelBudget( $id );

		return $titleWithBudget;
	}

}