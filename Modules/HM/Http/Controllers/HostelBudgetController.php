<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\HM\Services\HostelBudgetTitleService;

class HostelBudgetController extends Controller {
	private $hostelBudgetTitleService;

	public function __construct( HostelBudgetTitleService $hostelBudgetTitleService ) {
		$this->hostelBudgetTitleService = $hostelBudgetTitleService;
	}

	public function index() {
		$budgets = [];

		return view( 'hm::hostel-budget.index', compact( 'budgets' ) );

	}


	public function create() {
		$budgetTitles = $this->hostelBudgetTitleService->getHostelBudgetTitles();

		return view( 'hm::hostel-budget.create', compact('budgetTitles') );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request $request
	 *
	 * @return Response
	 */
	public function store( Request $request ) {
		dd($request->all());
		return redirect()->back();
	}

	/**
	 * Show the specified resource.
	 * @return Response
	 */
	public function show() {
		return view( 'hm::show' );
	}

	/**
	 * Show the form for editing the specified resource.
	 * @return Response
	 */
	public function edit() {
		return view( 'hm::edit' );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request $request
	 *
	 * @return Response
	 */
	public function update( Request $request ) {
	}

	/**
	 * Remove the specified resource from storage.
	 * @return Response
	 */
	public function destroy() {
	}
}
