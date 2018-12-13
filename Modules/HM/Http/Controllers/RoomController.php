<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HM\Entities\Hostel;
use Modules\HM\Entities\Room;
use Modules\HM\Http\Requests\CreateHostelRoomRequest;
use Modules\HM\Services\HostelService;
use Modules\HM\Services\RoomService;
use Modules\HM\Services\RoomTypeService;

class RoomController extends Controller
{
    /**
     * @var RoomService
     */
    private $roomService;

    /**
     * @var RoomTypeService
     */
    private $roomTypeService;

    private $hostelService;

    /**
     * RoomController constructor.
     * @param RoomService $roomService
     * @param RoomTypeService $roomTypeService
     * @param HostelService $hostelService
     */
    public function __construct(RoomService $roomService, RoomTypeService $roomTypeService, HostelService $hostelService)
    {
        $this->roomService = $roomService;
        $this->roomTypeService = $roomTypeService;
        $this->hostelService = $hostelService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $rooms = $this->roomService->getAll();

        return view('hm::room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     * @param Hostel $hostel
     * @return Response
     */
    public function create(Hostel $hostel)
    {
        $roomTypes = $this->roomTypeService->pluck();
        return view('hm::.room.create', compact('roomTypes', 'hostel'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateHostelRoomRequest $request
     * @return array
     */
    public function store(CreateHostelRoomRequest $request)
    {
        $this->roomService->store($request->all());
        Session::flash('success', 'Room has been created successfully!');

        return redirect()->route('hostels.show', $request['hostel_id']);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('hm::room.show');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function history()
    {
        return view('hm::room.history');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Room $room
     * @return Response
     */
    public function edit(Room $room)
    {
        return view('hm::room.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @param Room $room
     * @return void
     */
    public function update(Request $request, Room $room)
    {
        $this->roomService->update($room, $request->all());
        Session::flash('message', 'Successfully updated room information');

        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->roomService->delete($id);
        Session::flash('success', 'Room deleted successfully');

        return redirect()->back();
    }
}
