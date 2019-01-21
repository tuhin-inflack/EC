<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Http\Requests\StoreOrganizationRequest;
use Modules\PMS\Services\OrganizationService;
use Modules\PMS\Services\ProjectProposalService;
use Modules\PMS\Services\ProjectResearchOrgService;

class OrganizationController extends Controller
{
    private $organizationService;
    private $projectResearchOrgService;
    private $projectProposalService;

    public function __construct(OrganizationService $organizationService, ProjectResearchOrgService $projectResearchOrgService, ProjectProposalService $projectProposalService)
    {
        $this->organizationService = $organizationService;
        $this->projectResearchOrgService = $projectResearchOrgService;
        $this->projectProposalService = $projectProposalService;
    }

    public function addOrganization($projectId)
    {
        $type = Config::get('constants.project');

        $organizations = $this->organizationService->getAllOrganization($projectId, $type);
        $proposal = $this->projectProposalService->getProposalById($projectId);

        return view('pms::proposal-submitted.add_organization', compact('proposal', 'organizations', 'type'));

    }

    public function storeOrganization(StoreOrganizationRequest $request, $projectId)
    {
        $response = $this->projectResearchOrgService->storeData($request->all(), $projectId);
        Session::flash('message', $response->getContent());

        return redirect()->route('project-proposal-submitted.index');
    }
}
