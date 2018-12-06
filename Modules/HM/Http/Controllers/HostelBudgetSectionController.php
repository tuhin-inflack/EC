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
		$sections = $this->hostelBudgetSectionService->getHostelBudgetSections();

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


	public function edit($id) {
		$section = $this->hostelBudgetSectionService->findOrFail($id);
		return view( 'hm::hostel-budget-section.edit', compact('section'));
	}


	public function update( StoreHostelBudgetSectionRequest $request, $id ) {
		$section = $this->hostelBudgetSectionService->updateBudgetSection( $request->all(), $id );
		Session::flash( 'message', $section->getContent() );

		return redirect( '/hm/hostel-budget-section/' );

	}


}
