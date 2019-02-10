<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Accounts\Services\EconomyCodeService;
use Modules\PMS\Entities\Project;
use Modules\PMS\Entities\ProjectBudget;
use Modules\PMS\Services\ProjectBudgetService;

class ProjectBudgetController extends Controller
{
    private $economyCodeService;
    private $projectBudgetService;

    public function __construct(ProjectBudgetService $projectBudgetService,EconomyCodeService $economyCodeService)
    {
        $this->projectBudgetService = $projectBudgetService;
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
        $sectionTypes = $this->projectBudgetService->getSectionTypesOfProjectBudget();
        return view('pms::project.budget.create', compact('project', 'economyCodeOptions', 'sectionTypes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Project $project
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request, Project $project)
    {
        $this->projectBudgetService->store($request->all());

        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('project-budget.index', $project->id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Project $project
     * @param ProjectBudget $projectBudget
     * @return Response
     */
    public function edit(Project $project, ProjectBudget $projectBudget)
    {
        $economyCodeOptions = $this->economyCodeService->getEconomyCodesForDropdown();
        $sectionTypes = $this->projectBudgetService->getSectionTypesOfProjectBudget();

        return view('pms::project.budget.edit', compact('project', 'projectBudget', 'economyCodeOptions', 'sectionTypes'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @param Project $project
     * @param ProjectBudget $projectBudget
     * @return array
     */
    public function update(Request $request, Project $project, ProjectBudget $projectBudget)
    {
        $this->projectBudgetService->updateBudget($request->all(), $project, $projectBudget);

        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('project-budget.index', $project->id);
    }


    /**
     * Budget Spread Sheet
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function spreadsheet(Project $project)
    {
        $economyCodeOptions = $this->economyCodeService->getEconomyCodesForDropdown();
        return view('pms::project.budget.create_spredsheet', compact('project', 'economyCodeOptions'));
    }

}
