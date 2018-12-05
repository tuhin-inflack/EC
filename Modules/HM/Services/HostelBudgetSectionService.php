<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 12/5/2018
 * Time: 4:31 PM
 */

namespace Modules\HM\Services;


use App\Traits\CrudTrait;
use Modules\HM\Repositories\HostelBudgetSectionRepository;

class HostelBudgetSectionService {
	use CrudTrait;
	protected $hostelBudgetSectionRepository;

	public function __construct( HostelBudgetSectionRepository $hostelBudgetSectionRepository ) {
		$this->hostelBudgetSectionRepository = $hostelBudgetSectionRepository;
		$this->setActionRepository( $this->hostelBudgetSectionRepository );

	}

}