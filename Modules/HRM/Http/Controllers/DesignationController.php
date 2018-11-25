<?php

namespace Modules\HRM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Services\DesignationService;

class DesignationController extends Controller {
	protected $designationService;

	public function __construct( DesignationService $designationService ) {
		$this->designationService = $designationService;
	}


	public function index() {
		$designationList = $this->designationService->getDesignationList();

		return view( 'hrm::designation.index', compact( 'designationList' ) );

	}


	public function create() {
		return view( 'hrm::designation.create' );

	}


	public function store( Request $request ) {
		$response = $this->designationService->storeDesignation( $request->all() );
		Session::flash( 'message', $response->getContent() );

		return redirect()->route( 'designation.index' );
	}


	public function show($id) {
		$designation = $this->designationService->findOrFail( $id );

		return view( 'hrm::designation.show', compact( 'designation' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 * @return Response
	 */
	public function edit() {
		return view( 'hrm::edit' );
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
