<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PMS\Services\ProjectRequestService;

class RequestedProjectProposalController extends Controller
{
    private $projectRequestService;

    /**
     * ProjectRequestController constructor.
     * @param ProjectRequestService $projectRequestService
     */
    public function __construct(ProjectRequestService $projectRequestService)
    {
        $this->projectRequestService = $projectRequestService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $requests = $this->projectRequestService->getAll();
        return view('pms::requested-project.index', compact('requests'));
    }


    public function store(Request $request)
    {
    }


    public function show()
    {
        return view('pms::show');
    }


    public function edit()
    {
        return view('pms::edit');
    }


    public function update(Request $request)
    {
    }

}
