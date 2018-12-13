<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HM\Entities\HostelBudgetSection;
use Modules\HM\Services\HostelBudgetSectionService;
use Modules\HM\Services\HostelBudgetService;
use Modules\HM\Services\HostelBudgetTitleService;

class HostelBudgetController extends Controller {
	private $hostelBudgetService;
	private $hostelBudgetTitleService;
	private $hostelBudgetSectionService;

	public function __construct(
		HostelBudgetService $hostelBudgetService,
		HostelBudgetTitleService $hostelBudgetTitleService,
		HostelBudgetSectionService $hostelBudgetSectionService
	) {
		$this->hostelBudgetService        = $hostelBudgetService;
		$this->hostelBudgetTitleService   = $hostelBudgetTitleService;
		$this->hostelBudgetSectionService = $hostelBudgetSectionService;
	}

	public function index() {
		$budgetTitles = $this->hostelBudgetTitleService->getPendingOrApproveTitle();

		return view( 'hm::hostel-budget.index', compact( 'budgetTitles' ) );

	}


	public function create() {
		$budgetTitles   = $this->hostelBudgetTitleService->getHostelBudgetTitles();
		$budgetSections = $this->hostelBudgetSectionService->getHostelBudgetSectionAsPluck();

		return view( 'hm::hostel-budget.create', compact( 'budgetTitles', 'budgetSections' ) );
	}


	public function store( Request $request ) {
		$hostelBudgets       = $request->hostel_budgets;
		$hostelBudgetTitleId = $request->hostel_budget_title_id;

		$budget = $this->hostelBudgetService->storeHostelBudget( $hostelBudgets, $hostelBudgetTitleId );

		Session::flash( 'message', $budget->getContent() );

		return redirect( '/hm/hostel-budgets/' );

	}


	public function show( $id ) {
		$budgetWithTitles = $this->hostelBudgetTitleService->getTitleWithBudget( $id );
		$budgetTitles     = $this->hostelBudgetTitleService->getHostelBudgetTitles();
		$budgetSections   = $this->hostelBudgetSectionService->getHostelBudgetSectionAsPluck();

		return view( 'hm::hostel-budget.show', compact( 'budgetWithTitles', 'budgetTitles', 'budgetSections' ) );

	}

	public function approve( Request $request ) {
		$hostelBudgets = $request->hostel_budgets;
		$hostelBudgetTitleId = $request->hostel_budget_title_id;
		$budget = $this->hostelBudgetService->approvedHostelBudget( $hostelBudgets, $hostelBudgetTitleId );

		Session::flash( 'message', $budget->getContent() );

		return redirect( '/hm/hostel-budgets/'.$hostelBudgetTitleId );
	}


	public function edit() {
		return view( 'hm::edit' );
	}


	public function update( Request $request ) {
	}


	public function destroy() {
	}
}
