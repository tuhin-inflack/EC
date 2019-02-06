<?php

namespace Modules\RMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Accounts\Services\EconomyCodeService;
use Modules\RMS\Entities\Research;
use Modules\RMS\Entities\ResearchBudget;
use Modules\RMS\Services\ResearchBudgetService;

class ResearchBudgetController extends Controller
{
    private $economyCodeService;
    private $researchBudgetService;

    public function __construct(ResearchBudgetService $researchBudgetService,EconomyCodeService $economyCodeService)
    {
        $this->researchBudgetService = $researchBudgetService;
        $this->economyCodeService = $economyCodeService;
    }

    /**
     * Display a listing of the resource.
     * @param Research $research
     * @return Response
     */
    public function index(Research $research)
    {
        $economyCodeOptions = $this->economyCodeService->getEconomyCodesForDropdown();
        return view('rms::research.budget.index', compact('research', 'economyCodeOptions'));
    }

    /**
     * Show the form for creating a new resource.
     * @param Research $research
     * @return Response
     */
    public function create(Research $research)
    {
        $economyCodeOptions = $this->economyCodeService->getEconomyCodesForDropdown();
        $sectionTypes = $this->researchBudgetService->getSectionTypesOfResearchBudget();

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
        $this->researchBudgetService->store($request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('research-budget.index', $research->id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Research $research
     * @param ResearchBudget $researchBudget
     * @return Response
     */
    public function edit(Research $research, ResearchBudget $researchBudget)
    {
        $economyCodeOptions = $this->economyCodeService->getEconomyCodesForDropdown();
        $sectionTypes = $this->researchBudgetService->getSectionTypesOfResearchBudget();

        return view('rms::research.budget.edit', compact('research', 'researchBudget', 'economyCodeOptions', 'sectionTypes'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @param Research $research
     * @param ResearchBudget $researchBudget
     * @return array
     */
    public function update(Request $request, Research $research, ResearchBudget $researchBudget)
    {
        $this->researchBudgetService->updateBudget($request->all(), $research, $researchBudget);

        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('research-budget.index', $research->id);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
