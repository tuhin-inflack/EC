<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 1/16/19
 * Time: 8:14 PM
 */

namespace App\Repositories;


use App\Entities\AttributeValue;
use Illuminate\Support\Facades\DB;

class AttributeValueRepository extends AbstractBaseRepository
{
    protected $modelName = AttributeValue::class;

    public function getAttributeValueSumsByMonthYear($attributeId)
    {
        return $this->model->where('attribute_id', $attributeId)
            ->select(DB::raw('date, attribute_id, sum(planned_value) as total_planned_value, sum(achieved_value) as total_achieved_value'))
            ->groupBy('date')
            ->groupBy('attribute_id')
            ->orderBy('date')
            ->get();
    }
}