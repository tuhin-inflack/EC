<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 2/25/19
 * Time: 6:33 PM
 */

namespace Modules\PMS\Repositories;


use App\Repositories\AbstractBaseRepository;
use Illuminate\Support\Facades\DB;
use Modules\PMS\Entities\AttributePlanning;

class AttributePlanningRepository extends AbstractBaseRepository
{
    protected $modelName = AttributePlanning::class;

    public function getMonthlyAttributePlanningsFor($attributeIds)
    {
        return DB::table('attribute_plannings')
            ->whereIn('attribute_id', $attributeIds)
            ->select('date', 'attribute_id', DB::raw('sum(planned_value) as total_planned_value'))
            ->groupBy('date', 'attribute_id')
            ->get();
    }
}