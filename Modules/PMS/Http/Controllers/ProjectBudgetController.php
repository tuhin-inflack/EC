<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounts\Services\EconomyCodeService;
use Modules\PMS\Entities\Project;

class ProjectBudgetController extends Controller
{
    private $economyCodeService;


    public function __construct(EconomyCodeService $economyCodeService)
    {
        $this->economyCodeService = $economyCodeService;
    }

    /**
     * Display a listing of the resource.
     * @param Project $project
     * @return Response
     */
    public function index(Project $project)
    {
        $economyCodeOptions = $this->economyCodeService->getEconomyCodesForDropdown();
        return view('pms::project.budget.index', compact('project', 'economyCodeOptions'));
    }

    /**
     * Show the form for creating a new resource.
     * @param Project $project
     * @return Response
     */
    public function create(Project $project)
    {
        $economyCodeOptions = $this->economyCodeService->getEconomyCodesForDropdown();
        return view('pms::project.budget.create', compact('project', 'economyCodeOptions'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('pms::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('pms::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }


    /**
     * Budget Spread Sheet
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function spreadsheet(Project $project)
    {
        $economyCodeOptions = $this->economyCodeService->getEconomyCodesForDropdown();
        return view('pms::project.budget.create', compact('project', 'economyCodeOptions'));
    }

}
