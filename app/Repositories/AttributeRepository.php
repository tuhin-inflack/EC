<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 1/16/19
 * Time: 1:14 PM
 */

namespace App\Repositories;


use App\Entities\Attribute;
use Illuminate\Support\Facades\DB;

class AttributeRepository extends AbstractBaseRepository
{
    protected $modelName = Attribute::class;

    public function getAchievedPlannedValuesByMonthYear($attributeId)
    {
        $plannedValuesByMonthYear = DB::table('attribute_plannings')
            ->select(
                DB::raw('sum(planned_value) as total_planned_value, date_format(date, "%M %Y") as monthYear')
            )
            ->where('attribute_id', $attributeId)
            ->groupBy('monthYear')
            ->get();

        $achievedValuesByMonthYear = DB::table('attribute_values')
            ->select(
                DB::raw('sum(achieved_value) as total_achieved_value, date_format(date, "%M %Y") as monthYear')
            )
            ->where('attribute_id', $attributeId)
            ->groupBy('monthYear')
            ->get();

        $achievedPlannedValuesByMonthYear = $achievedValuesByMonthYear->merge($plannedValuesByMonthYear);

        return $achievedPlannedValuesByMonthYear->groupBy('monthYear')->map(function ($rows) {
            return (object) [
                'total_achieved_value' => $rows->sum('total_achieved_value'),
                'total_planned_value' => $rows->sum('total_planned_value'),
                'monthYear' => $rows->first()->monthYear
            ];
        })->sortByDesc('monthYear')->values()->all();
    }
}