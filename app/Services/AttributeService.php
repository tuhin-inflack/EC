<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 1/16/19
 * Time: 1:15 PM
 */

namespace App\Services;


use App\Entities\Attribute;
use App\Repositories\AttributeRepository;
use App\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\PMS\Entities\AttributePlanning;

class AttributeService
{
    use CrudTrait;
    /**
     * @var AttributeRepository
     */
    private $attributeRepository;

    /**
     * AttributeService constructor.
     * @param AttributeRepository $attributeRepository
     */
    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
        $this->setActionRepository($attributeRepository);
    }

    public function getAttributeType(Attribute $attribute)
    {
        return strtolower($attribute->name);
    }

    public function getAttributeValue(Attribute $attribute)
    {
        $attributeValue = $attribute->values->first();

        $initialValue = $attributeValue ? $attributeValue->achieved_value : 0;

        $currentBalance = $attribute->values->sum('achieved_value');

        return (object)[
            'initial_value' => $initialValue,
            'current_balance' => $currentBalance
        ];
    }

    public function getAchievedPlannedValuesByMonthYear(Attribute $attribute)
    {
        return $this->attributeRepository->getAchievedPlannedValuesByMonthYear($attribute->id);
    }
}