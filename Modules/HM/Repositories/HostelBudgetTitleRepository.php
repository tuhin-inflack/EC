<?php
/**
 * Created by PhpStorm.
 * User: BS100
 * Date: 12/6/2018
 * Time: 2:52 PM
 */

namespace Modules\HM\Repositories;


use App\Repositories\AbstractBaseRepository;
use Modules\HM\Entities\HostelBudgetTitle;

class HostelBudgetTitleRepository extends AbstractBaseRepository {
	protected $modelName = HostelBudgetTitle::class;

	public function getHostelBudgetTitle() {
		$titles = HostelBudgetTitle::where( 'current_year', ">=", date( 'Y' ) )->get()->pluck( 'name', 'id' );

		return $titles;
	}
}