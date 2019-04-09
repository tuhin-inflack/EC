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

class HostelBudgetTitleRepository extends AbstractBaseRepository
{
    protected $modelName = HostelBudgetTitle::class;

    public function getHostelBudgetTitle()
    {
        $titles = HostelBudgetTitle::
        where('current_year', ">=", date('Y'))
            ->whereStatus(0)
            ->get()->pluck('name', 'id');

        return $titles;
    }

    public function getTitleWithHostelBudget($id)
    {
        $titleWithBudget = HostelBudgetTitle::whereId($id)->with('hostelBudgets')->first();

        return $titleWithBudget;
    }

    public function getApproveOrPendingTitle()
    {
        $hostelBudgets = HostelBudgetTitle::where('status', '!=', 0)->orderBy('updated_at', 'desc')->get();
        return $hostelBudgets;
    }


}