<?php

namespace Modules\PMS\Http\Controllers;

use App\Entities\Attribute;
use App\Services\AttributeService;
use App\Services\AttributeValueService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Entities\Project;

class AttributeController extends Controller
{
    /**
     * @var AttributeService
     */
    private $attributeService;

    /**
     * AttributeController constructor.
     * @param AttributeService $attributeService
     */
    public function __construct(AttributeService $attributeService)
    {
        $this->attributeService = $attributeService;
    }

    public function create(Project $project)
    {
        return view('attribute.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        if ($this->attributeService->save(array_merge($request->all(), ['project_id', $request->input('project_id')]))) {
            Session::flash('success', trans('labels.save_success'));
        } else {
            Session::flash('error', trans('labels.save_fail'));
        }

        return redirect()->route('project.show', $project->id);
    }

    public function show(Project $project, Attribute $attribute)
    {
        $achievedPlannedValuesByMonthYear = $this->attributeService->getAchievedPlannedValuesByMonthYear($attribute);

        return view('pms::attribute.show', compact('project', 'attribute', 'achievedPlannedValuesByMonthYear'));
    }

    public function graphValues(Project $project, Attribute $attribute)
    {
        return response()->json([
            'name' => $attribute->name,
            'attributeValues' => $this->attributeService->getAchievedPlannedValuesByMonthYear($attribute)
        ], 200);
    }
}
