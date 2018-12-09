<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HM\Entities\Hostel;
use Modules\HM\Http\Requests\CreateHostelRequest;
use Modules\HM\Http\Requests\UpdateHostelRequest;
use Modules\HM\Services\HostelService;
use Modules\HM\Services\RoomTypeService;

class HostelController extends Controller
{
    private $hostelService;
    private $roomTypeService;

    /**
     * HostelController constructor.
     * @param HostelService $hostelService
     */
    public function __construct(HostelService $hostelService, RoomTypeService $roomTypeService)
    {
        $this->hostelService = $hostelService;
        $this->roomTypeService = $roomTypeService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $hostels = $this->hostelService->getAll();

        return view('hm::hostel.index', compact('hostels'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $roomTypes = $this->roomTypeService->pluck();
        return view('hm::hostel.create', compact('roomTypes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateHostelRequest $request
     * @return void
     */
    public function store(CreateHostelRequest $request)
    {
        $this->hostelService->store($request->all());
        Session::flash('message', 'Hostel stored successfully');

        return redirect()->route('hostels.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Hostel $hostel)
    {
        return view('hm::hostel.show', compact('hostel'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Hostel $hostel
     * @return Response
     */
    public function edit(Hostel $hostel)
    {
        return view('hm::hostel.edit', compact('hostel'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateHostelRequest $request
     * @param Hostel $hostel
     * @return void
     */
    public function update(UpdateHostelRequest $request, Hostel $hostel)
    {
        $this->hostelService->update($hostel, $request->all());
        Session::flash('message', 'Hostel updated successfully');

        return redirect()->route('hostels.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Hostel $hostel
     * @return Response
     */
    public function destroy(Hostel $hostel)
    {
        $this->hostelService->delete($hostel);
        Session::flash('message', 'Hostel deleted successfully');

        return redirect()->route('hostels.index');
    }
}
