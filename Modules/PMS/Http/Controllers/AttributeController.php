<?php

namespace Modules\PMS\Http\Controllers;

use App\Entities\Attribute;
use App\Services\AttributeValueService;
use Illuminate\Routing\Controller;
use Modules\PMS\Entities\Project;

class AttributeController extends Controller
{
    /**
     * @var AttributeValueService
     */
    private $attributeValueService;

    /**
     * AttributeController constructor.
     * @param AttributeValueService $attributeValueService
     */
    public function __construct(AttributeValueService $attributeValueService)
    {
        $this->attributeValueService = $attributeValueService;
    }

    public function show(Project $project, Attribute $attribute)
    {
        return $attributeValuesByMonthYear = $this->attributeValueService->getAttributePlannedAchievedByMonthYear($attribute);

        return view('pms::attribute.show', compact('project', 'attribute'));
    }
}
