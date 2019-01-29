<?php

namespace Modules\RMS\Http\Controllers;

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
}
