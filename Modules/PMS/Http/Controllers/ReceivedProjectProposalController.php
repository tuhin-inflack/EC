<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Http\Requests\StoreOrganization;
use Modules\PMS\Http\Requests\StoreOrganizationRequest;
use Modules\PMS\Repositories\ProjectResearchOrgRepository;
use Modules\PMS\Services\OrganizationService;
use Modules\PMS\Services\ProjectProposalService;
use Modules\PMS\Services\ProjectResearchOrgService;

class ReceivedProjectProposalController extends Controller
{
    private $projectProposalService;
    private $organizationService;
    private $projectResearchOrgService;

    public function __construct(ProjectProposalService $projectProposalService,
                                OrganizationService $organizationService,
                                ProjectResearchOrgService $projectResearchOrgService)
    {
        $this->projectProposalService = $projectProposalService;
        $this->organizationService = $organizationService;
        $this->projectResearchOrgService = $projectResearchOrgService;
    }

    public function index()
    {
        $proposals = $this->projectProposalService->getAll();
        return view('pms::proposal-submitted.index', compact('proposals'));
    }


    public function create()
    {
        return view('pms::create');
    }


    public function show($id)
    {
        $proposal = $this->projectProposalService->findOrFail($id);
//        dd($proposal);
        return view('pms::proposal-submitted.show', compact('proposal'));
    }

    public function addOrganization($proposalId)
    {
        $type = Config::get('constants.project');

        $organizations = $this->organizationService->getAllOrganization($proposalId, $type);
        $proposal = $this->projectProposalService->getProposalById($proposalId);

        return view('pms::proposal-submitted.add_organization', compact('proposal', 'organizations', 'type'));

    }

    public function storeOrganization(StoreOrganizationRequest $request)
    {
//        dd($request->all());
        $response = $this->projectResearchOrgService->storeData($request->all());
        Session::flash('message', $response->getContent());

        return redirect()->route('project-proposal-submitted.index');
    }

    public function edit()
    {
        return view('pms::edit');
    }


}
