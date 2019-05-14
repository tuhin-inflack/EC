<?php

namespace Modules\PMS\Http\Controllers;

use App\Entities\DraftProposalBudget\DraftProposalBudget;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Accounts\Services\EconomyCodeService;
use Modules\PMS\Entities\Project;
use Modules\PMS\Entities\ProjectRequest;
use Modules\PMS\Http\Requests\CreateProjectBudgetRequest;
use Modules\PMS\Http\Requests\UpdateProjectBudgetRequest;
use Modules\PMS\Services\DraftProposalBudgetService;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ProjectBudgetController extends Controller
{
    private $economyCodeService;
    private $draftProposalBudgetService;

    public function __construct(DraftProposalBudgetService $draftProposalBudgetService, EconomyCodeService $economyCodeService)
    {
        $this->draftProposalBudgetService = $draftProposalBudgetService;
        $this->economyCodeService = $economyCodeService;
    }

    /**
     * Display a listing of the resource.
     * @param ProjectRequest $project
     * @return Response
     */
    public function index(ProjectRequest $project)
    {
        $data = (object) $this->draftProposalBudgetService->prepareDataForBudgetView($project);
        $projectBudgets = $this->draftProposalBudgetService->getEconomyCodeWiseSortedBudgets($project);
        return view('pms::project.budget.index', compact('project', 'data', 'projectBudgets'));
    }

    public function getBudgetExpense(ProjectRequest $project)
    {
        return $this->draftProposalBudgetService->getTotalExpenseOfRevenueAndCapital($project);
    }

    /**
     * @param ProjectRequest $project
     * @param $tableType
     * @return BinaryFileResponse
     */
    public function exportExcel(ProjectRequest $project, $tableType){
        $data = (object) $this->draftProposalBudgetService->prepareDataForBudgetView($project);
        $viewName = 'pms::project.budget.partials.' . $tableType;
        return $this->draftProposalBudgetService->exportExcel(compact('project', 'data'), $viewName, $project->title .'-' .$tableType);
    }

    /**
     * Show the form for creating a new resource.
     * @param ProjectRequest $project
     * @return Response
     */
    public function create(ProjectRequest $project)
    {
        $economyCodeOptions = $this->economyCodeService->getEconomyCodesForDropdown();
        $sectionTypes = $this->draftProposalBudgetService->getSectionTypesOfDraftProposalBudget();
        return view('pms::project.budget.create', compact('project', 'economyCodeOptions', 'sectionTypes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateProjectBudgetRequest $request
     * @param Project $project
     * @return Response
     */
    public function store(CreateProjectBudgetRequest $request, Project $project)
    {
        $this->draftProposalBudgetService->store($project, $request->all());

        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('project-budget.index', $project->id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Project $project
     * @param DraftProposalBudget $draftProposalBudget
     * @return Response
     */
    public function edit(Project $project, DraftProposalBudget $draftProposalBudget)
    {
        $economyCodeOptions = $this->economyCodeService->getEconomyCodesForDropdown();
        $sectionTypes = $this->draftProposalBudgetService->getSectionTypesOfDraftProposalBudget();

        return view('pms::project.budget.edit', compact('project', 'draftProposalBudget', 'economyCodeOptions', 'sectionTypes'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateProjectBudgetRequest $request
     * @param Project $project
     * @param DraftProposalBudget $draftProposalBudget
     * @return array
     */
    public function update(UpdateProjectBudgetRequest $request, Project $project, DraftProposalBudget $draftProposalBudget)
    {
        $this->draftProposalBudgetService->updateBudget($request->all(), $draftProposalBudget);

        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('project-budget.index', $project->id);
    }
}
