<?php

namespace Modules\PMS\Http\Controllers;

use App\Entities\DraftProposalBudget\DraftProposalBudget;
use App\Services\DraftProposalBudget\DraftProposalBudgetService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Accounts\Services\EconomyCodeService;
use Modules\PMS\Entities\Project;

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
     * @param Project $project
     * @return Response
     */
    public function index(Project $project)
    {
        $data = (object) $this->draftProposalBudgetService->prepareBudgetView($project);
        return view('pms::project.budget.index', compact('project', 'data'));
    }

    /**
     * @param Project $project
     * @param $tableType
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportExcel(Project $project, $tableType){
        $data = (object) $this->draftProposalBudgetService->prepareBudgetView($project);
        $viewName = '';

        if ($tableType == 'annexure-4'){
            $viewName = 'pms::project.budget.partials.annexure-4';
        } else if ($tableType == 'annexure-5'){
            $viewName = 'pms::project.budget.partials.annexure-5';
        }

        return $this->draftProposalBudgetService->exportExcel(compact('project', 'data'), $viewName, $project->title .'-' .$tableType);
    }

    /**
     * Show the form for creating a new resource.
     * @param Project $project
     * @return Response
     */
    public function create(Project $project)
    {
        $economyCodeOptions = $this->economyCodeService->getEconomyCodesForDropdown();
        $sectionTypes = $this->draftProposalBudgetService->getSectionTypesOfDraftProposalBudget();
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
     * @param  Request $request
     * @param Project $project
     * @param DraftProposalBudget $draftProposalBudget
     * @return array
     */
    public function update(Request $request, Project $project, DraftProposalBudget $draftProposalBudget)
    {
        $this->draftProposalBudgetService->updateBudget($request->all(), $draftProposalBudget);

        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('project-budget.index', $project->id);
    }
}
