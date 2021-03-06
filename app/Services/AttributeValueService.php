<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 1/16/19
 * Time: 8:15 PM
 */

namespace App\Services;


use App\Entities\Attribute;
use App\Repositories\AttributeValueRepository;
use App\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class AttributeValueService
{
    use CrudTrait;
    /**
     * @var AttributeValueRepository
     */
    private $attributeValueRepository;

    /**
     * AttributeValueService constructor.
     * @param AttributeValueRepository $attributeValueRepository
     */
    public function __construct(AttributeValueRepository $attributeValueRepository)
    {
        $this->attributeValueRepository = $attributeValueRepository;
        $this->setActionRepository($attributeValueRepository);
    }

    public function store(array $data)
    {
        $data['date'] = Carbon::createFromFormat('F Y', $data['date']);
        if ($data['transaction_type'] == 'withdraw') {
            $data['achieved_value'] = -1 * abs($data['achieved_value']);
        } else {
            $data['achieved_value'] = abs($data['achieved_value']);
        }
        return $this->save($data);
    }

    public function findIn($key, $values)
    {
        return $this->attributeValueRepository->findIn($key, $values);
    }

    public function getMemberAttributeValues($memberId, $attributeIds)
    {
        return $this->attributeValueRepository->getMemberAttributeValues($memberId, $attributeIds);
    }

    public function getAttributeValuesSumByMonth(Collection $attributeValues)
    {
        return $attributeValues->sortBy('date')
            ->groupBy(function ($attributeValue) {
                return Carbon::parse($attributeValue->date)->format('F Y');
            })->map(function ($groupedRows) {
                return $groupedRows->groupBy(function ($row) {
                    return $row->attribute_id;
                })->map(function ($rows) {
                    return [
                        'total_planned_values' => $rows->sum('planned_value'),
                        'total_achieved_values' => $rows->sum('achieved_value')
                    ];
                });
            });
    }

    public function getAttributeValueSumsByMonthYear($attributeId)
    {
        return $this->attributeValueRepository->getAttributeValueSumsByMonthYear($attributeId);
    }
}