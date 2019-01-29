<?php

namespace Modules\PMS\Http\Controllers;

use App\Entities\Organization\Organization;
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
     * OrganizationController constructor.
     * @param OrganizationService $organizationService
     */
    public function __construct(OrganizationService $organizationService)
    {
        $this->organizationService = $organizationService;
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

        return view('organization.show', compact('organization', 'organizableType'));
    }
}
