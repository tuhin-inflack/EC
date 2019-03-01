<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 2/25/19
 * Time: 6:34 PM
 */

namespace Modules\PMS\Services;


use App\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

    public function store(array $data)
    {
        try {
            DB::beginTransaction();

            foreach ($data['planning'] as $planningData) {
                $this->save([
                    'attribute_id' => $planningData['attribute_id'],
                    'planned_value' => $planningData['planned_value'],
                    'date' => Carbon::parse($data['date'])
                ]);
            }

            DB::commit();

            return true;
        } catch (\Exception $exception) {
            DB::rollBack();

            Log::error($exception->getMessage());

            return false;
        }
    }

    public function getMonthlyPlanningFor($attributeId)
    {
        return $this->attributePlanningRepository->getMonthlyPlanningFor($attributeId);
    }
}