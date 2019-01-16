<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
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

    public function addOrganization($id)
    {
        $organizations = $this->organizationService->getAllOrganization();
        $proposal = $this->projectProposalService->findOrFail($id);
//        type 1 = project in database
        $type = 1;
        return view('pms::proposal-submitted.add_organization', compact('proposal', 'organizations', 'type'));

    }

    public function storeOrganization(Request $request)
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
