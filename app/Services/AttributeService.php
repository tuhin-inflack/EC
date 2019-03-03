<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 1/16/19
 * Time: 1:15 PM
 */

namespace App\Services;


use App\Entities\Attribute;
use App\Entities\Organization\OrganizationMember;
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

    public function getMemberAttributeValues(Attribute $attribute, OrganizationMember $member)
    {
        $firstAttributeValue = $member->attributeValues->where('attribute_id', $attribute->id)->first();

        $initialValue = $firstAttributeValue ? $firstAttributeValue->achieved_value : 0;

        $currentBalance = $member->attributeValues->where('attribute_id', $attribute->id)->sum('achieved_value');

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