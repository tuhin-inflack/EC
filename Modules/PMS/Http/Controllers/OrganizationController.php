<?php

namespace Modules\PMS\Http\Controllers;

use App\Entities\District;
use App\Entities\Organization\Organization;
use App\Entities\Thana;
use App\Entities\Union;
use App\Services\AttributeValueService;
use App\Services\DivisionService;
use App\Services\OrganizationService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Entities\Project;
use Modules\PMS\Http\Requests\StoreOrganizationRequest;

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
     * @param DivisionService $divisionService
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
        return view('pms::organization.create')->with([
            'organizable' => $project,
            'organizableType' => $organizableType,
            'organizations' => $organizations,
            'unions' => Union::all()
        ]);
    }
    public function show(Project $project, Organization $organization)
    {
        if (!$project->organizations->where('id', $organization->id)->count()) {
            abort(404);
        }

        return view('pms::organization.show', compact(
                'organization',
                'project'
            )
        );
    }
    /*
     * If You are looking for store function
     * Store function is kept global OrganiationController , you can find the route in Global web.php
     */
}
