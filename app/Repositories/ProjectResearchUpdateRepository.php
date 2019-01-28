<?php
/**
 * Created by PhpStorm.
 * User: bs110
 * Date: 1/24/19
 * Time: 4:14 PM
 */

namespace App\Repositories;


use App\Entities\monthlyUpdate\ProjectResearchMonthlyUpdate;

class ProjectResearchUpdateRepository extends AbstractBaseRepository
{
    protected $modelName = ProjectResearchMonthlyUpdate::class;

    public function getMonthlyUpdate($updateForId, $type, $month, $year)
    {
        return $this->model->where('update_for_id', $updateForId)
            ->where('type', $type)
            ->where('month', $month)
            ->where('year', $year)
            ->first();
    }
}
