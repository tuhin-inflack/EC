<?php

namespace Modules\HRM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\HM\Services\RoomTypeService;

class AppraisalController extends Controller
{


    private $roomTypeService;

    /**
     * HostelController constructor.
     * @param HostelService $hostelService
     */
    public function __construct(RoomTypeService $roomTypeService)
    {
        $this->roomTypeService = $roomTypeService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        //todo: Detect if the user is supervisor or a single user, then sends the only specific
        // Appraisal List
        return view('hrm::appraisal.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $supervisor = 0;
        return view('hrm::appraisal.create', compact('supervisor'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        //todo: find the value using id and send it to view
        //Normal user can only view the form , supervisor can give number to it
        $supervisor = 1;
        return view('hrm::appraisal.show', compact('supervisor'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('hrm::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function retirement()
    {
        return view('hrm::appraisal.retirement_form');

    }
}
