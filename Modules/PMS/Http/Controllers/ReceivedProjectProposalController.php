<?php

namespace Modules\PMS\Http\Controllers;


use App\Services\OrganizationService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Http\Requests\StoreOrganization;
use Modules\PMS\Services\ProjectProposalService;


class ReceivedProjectProposalController extends Controller
{
    private $projectProposalService;
    private $organizationService;

    public function __construct(ProjectProposalService $projectProposalService, OrganizationService $organizationService)
    {
        $this->projectProposalService = $projectProposalService;
        $this->organizationService = $organizationService;
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
//        dd($id);
        $proposal = $this->projectProposalService->findOrFail($id);
//        dd($proposal);
        return view('pms::proposal-submitted.show', compact('proposal'));
    }



    public function edit()
    {
        return view('pms::edit');
    }


}
