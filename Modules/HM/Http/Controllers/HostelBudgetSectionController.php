<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HM\Http\Requests\StoreHostelBudgetSectionRequest;
use Modules\HM\Services\HostelBudgetSectionService;

class HostelBudgetSectionController extends Controller {
	private $hostelBudgetSectionService;

	public function __construct( HostelBudgetSectionService $hostelBudgetSectionService ) {
		$this->hostelBudgetSectionService = $hostelBudgetSectionService;
	}

	public function index() {
		$sections = [];

		return view( 'hm::hostel-budget-section.index', compact( 'sections' ) );
	}


	public function create() {
		return view( 'hm::hostel-budget-section.create' );
	}


	public function store( StoreHostelBudgetSectionRequest $request ) {
		$section = $this->hostelBudgetSectionService->storeHostelBudgetSection( $request->all() );
		Session::flash( 'message', $section->getContent() );

		return redirect( '/hm/hostel-budget-section/' );

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
