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

class HostelController extends Controller
{
    private $hostelService;

    /**
     * HostelController constructor.
     */
    public function __construct(HostelService $hostelService)
    {
        $this->hostelService = $hostelService;
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
        return view('hm::hostel.create');
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
    public function show()
    {
        return view('hm::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Hostel $hostel)
    {
        return view('hm::hostel.edit', compact('hostel'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateHostelRequest $request
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
     * @return Response
     */
    public function destroy(Hostel $hostel)
    {
        $this->hostelService->delete($hostel);
        Session::flash('message', 'Hostel deleted successfully');

        return redirect()->route('hostels.index');
    }
}
