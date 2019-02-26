<?php

namespace Modules\PMS\Http\Controllers;

use App\Entities\Attribute;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PMS\Entities\Project;
use Modules\PMS\Services\AttributePlanningService;

class AttributePlanningController extends Controller
{
    /**
     * @var AttributePlanningService
     */
    private $attributePlanningService;

    /**
     * AttributePlanningController constructor.
     * @param AttributePlanningService $attributePlanningService
     */
    public function __construct(AttributePlanningService $attributePlanningService)
    {
        $this->attributePlanningService = $attributePlanningService;
    }

    /**
     * @param Project $project
     * @param Attribute $attribute
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(Project $project, Attribute $attribute)
    {
        $monthlyAttributePlannings = $this->attributePlanningService->getMonthlyPlanningFor($attribute->id);

        return view('pms::attribute-planning.index', compact(
            'project',
            'attribute',
            'monthlyAttributePlannings'
        ));
    }
}
