<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 2/25/19
 * Time: 6:34 PM
 */

namespace Modules\PMS\Services;


use App\Traits\CrudTrait;
use Illuminate\Support\Facades\DB;
use Modules\PMS\Repositories\AttributePlanningRepository;

class AttributePlanningService
{
    use CrudTrait;

    /**
     * @var AttributePlanningRepository
     */
    private $attributePlanningRepository;

    /**
     * AttributePlanningService constructor.
     * @param AttributePlanningRepository $attributePlanningRepository
     */
    public function __construct(AttributePlanningRepository $attributePlanningRepository)
    {
        $this->attributePlanningRepository = $attributePlanningRepository;
        $this->setActionRepository($attributePlanningRepository);
    }

    public function getMonthlyPlanningFor($attributeId)
    {
        return $this->attributePlanningRepository->getMonthlyPlanningFor($attributeId);
    }
}