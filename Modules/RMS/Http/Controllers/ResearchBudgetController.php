<?php

namespace Modules\RMS\Http\Controllers;

use App\Entities\DraftProposalBudget\DraftProposalBudget;
use App\Services\DraftProposalBudget\DraftProposalBudgetService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Accounts\Services\EconomyCodeService;
use Modules\RMS\Entities\Research;

class ResearchBudgetController extends Controller
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
     * @param Research $research
     * @return Response
     */
    public function index(Research $research)
    {
        $data = (object) $this->draftProposalBudgetService->prepareBudgetView($research);
        return view('rms::research.budget.index', compact('research', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     * @param Research $research
     * @return Response
     */
    public function create(Research $research)
    {
        $economyCodeOptions = $this->economyCodeService->getEconomyCodesForDropdown();
        $sectionTypes = $this->draftProposalBudgetService->getSectionTypesOfDraftProposalBudget();
        return view('rms::research.budget.create', compact('research', 'economyCodeOptions', 'sectionTypes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @param Research $research
     * @return Response
     */
    public function store(Request $request, Research $research)
    {
        $this->draftProposalBudgetService->store($research, $request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('research-budget.index', $research->id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Research $research
     * @param DraftProposalBudget $draftProposalBudget
     * @return Response
     */
    public function edit(Research $research, DraftProposalBudget $draftProposalBudget)
    {
        $economyCodeOptions = $this->economyCodeService->getEconomyCodesForDropdown();
        $sectionTypes = $this->draftProposalBudgetService->getSectionTypesOfDraftProposalBudget();

        return view('rms::research.budget.edit', compact('research', 'draftProposalBudget', 'economyCodeOptions', 'sectionTypes'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @param Research $research
     * @param DraftProposalBudget $draftProposalBudget
     * @return array
     */
    public function update(Request $request, Research $research, DraftProposalBudget $draftProposalBudget)
    {
        $this->draftProposalBudgetService->updateBudget($request->all(), $draftProposalBudget);

        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('research-budget.index', $research->id);
    }

}
