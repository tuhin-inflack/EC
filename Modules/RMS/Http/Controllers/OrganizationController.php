<?php

namespace Modules\RMS\Http\Controllers;

use App\Entities\Organization\Organization;
use App\Services\OrganizationService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Modules\RMS\Entities\Research;

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

    public function create(Research $research)
    {
        $organizableType = Config::get('constants.research');

        $organizations = $this->organizationService->getUnmappedOrganizations($research);

        return view('organization.create')->with([
            'organizable' => $research,
            'organizableType' => $organizableType,
            'organizations' => $organizations
        ]);
    }

    public function show(Research $research, Organization $organization)
    {
        if (!$research->organizations->where('id', $organization->id)->count()) {
            abort(404);
        }

        $organizableType = Config::get('constants.research');

        return view('organization.show', compact('organization', 'organizableType'));
    }
}
