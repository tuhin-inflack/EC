<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HM\Entities\Hostel;
use Modules\HM\Http\Requests\CreateHostelRoomRequest;
use Modules\HM\Services\RoomService;

class RoomController extends Controller
{
    /**
     * @var RoomService
     */
    private $roomService;

    /**
     * RoomController constructor.
     * @param RoomService $roomService
     */
    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('hm::index');
    }

    /**
     * Show the form for creating a new resource.
     * @param Hostel $hostel
     * @return Response
     */
    public function create(Hostel $hostel)
    {
        return view('hm::.room.create', compact('hostel'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateHostelRoomRequest $request
     * @return array
     */
    public function store(CreateHostelRoomRequest $request)
    {
        $this->roomService->store($request->all());
        Session::flash('message', 'Successfully stored room information');

        return redirect()->back();
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
    public function edit()
    {
        return view('hm::edit');
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
}
