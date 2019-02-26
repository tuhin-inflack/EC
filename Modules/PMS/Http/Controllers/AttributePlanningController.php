<?php

namespace Modules\PMS\Http\Controllers;

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
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(Project $project)
    {
        $attributeIds = $project->attributes->pluck('id')->toArray();

        $monthlyAttributePlannings = $this->attributePlanningService->getMonthlyAttributePlanningsFor($attributeIds);

        return view('pms::attribute-planning.index', compact('monthlyAttributePlannings'));
    }
}
