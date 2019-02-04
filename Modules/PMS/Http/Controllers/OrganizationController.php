<?php

namespace Modules\PMS\Http\Controllers;

use App\Entities\Organization\Organization;
use App\Services\AttributeValueService;
use App\Services\OrganizationService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Modules\PMS\Entities\Project;

class OrganizationController extends Controller
{
    /**
     * @var OrganizationService
     */
    private $organizationService;
    /**
     * @var AttributeValueService
     */
    private $attributeValueService;

    /**
     * OrganizationController constructor.
     * @param OrganizationService $organizationService
     * @param AttributeValueService $attributeValueService
     */
    public function __construct(OrganizationService $organizationService, AttributeValueService $attributeValueService)
    {
        $this->organizationService = $organizationService;
        $this->attributeValueService = $attributeValueService;
    }

    public function create(Project $project)
    {
        $organizableType = Config::get('constants.project');

        $organizations = $this->organizationService->getUnmappedOrganizations($project);

        return view('organization.create')->with([
            'organizable' => $project,
            'organizableType' => $organizableType,
            'organizations' => $organizations
        ]);
    }

    public function show(Project $project, Organization $organization)
    {
        if (!$project->organizations->where('id', $organization->id)->count()) {
            abort(404);
        }

        $organizableType = Config::get('constants.project');

        $attributeIds = $organization->attributes->map(function ($attribute) {
            return $attribute->id;
        })->toArray();

        $attributeValues = $this->attributeValueService->findIn('attribute_id', $attributeIds);

        $attributeValueSumsByMonth = $this->attributeValueService->getAttributeValuesSumByMonth($attributeValues);

        return view('organization.show', compact('organization', 'organizableType', 'attributeValueSumsByMonth'));
    }
}
