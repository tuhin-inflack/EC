<?php

namespace Modules\PMS\Http\Controllers;

use App\Entities\Organization\Organization;
use App\Entities\Union;
use App\Services\AttributeValueService;
use App\Services\DivisionService;
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
     * @var DivisionService
     */
    private $divisionService;

    /**
     * OrganizationController constructor.
     * @param OrganizationService $organizationService
     * @param AttributeValueService $attributeValueService
     */
    public function __construct(
        OrganizationService $organizationService,
        DivisionService $divisionService,
        AttributeValueService $attributeValueService
    )
    {
        $this->organizationService = $organizationService;
        $this->attributeValueService = $attributeValueService;
        $this->divisionService = $divisionService;
    }

    public function create(Project $project)
    {
        $organizableType = Config::get('constants.project');

        $organizations = $this->organizationService->getUnmappedOrganizations($project);

        return view('organization.create')->with([
            'organizable' => $project,
            'organizableType' => $organizableType,
            'organizations' => $organizations,
            'divisions' => $this->divisionService->findAll(),
            'unions' => Union::all()
        ]);
    }

    public function show(Project $project, Organization $organization)
    {
        if (!$project->organizations->where('id', $organization->id)->count()) {
            abort(404);
        }

        return view('organization.show', compact(
                'organization',
                'project'
            )
        );
    }
}
