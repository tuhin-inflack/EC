<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HM\Entities\RoomType;
use Modules\HM\Http\Requests\CreateRoomTypeRequest;
use Modules\HM\Http\Requests\UpdateRoomTypeRequest;
use Modules\HM\Services\RoomTypeService;

class RoomTypeController extends Controller
{
    private $roomTypeService;

    /**
     * RoomTypeController constructor.
     * @param RoomTypeService $roomTypeService
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
        $roomTypes = $this->roomTypeService->getAll();

        return view('hm::room-type.index', compact('roomTypes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('hm::room-type.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateRoomTypeRequest $request
     * @return Response
     */
    public function store(CreateRoomTypeRequest $request)
    {
        $this->roomTypeService->store($request->all());
        Session::flash('message', 'Room Type stored successfully!');

        return redirect()->route('room-types.index');
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
     * @param RoomType $roomType
     * @return Response
     */
    public function edit(RoomType $roomType)
    {
        return view('hm::room-type.edit', compact('roomType'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRoomTypeRequest $request
     * @param RoomType $roomType
     * @return Response
     */
    public function update(UpdateRoomTypeRequest $request, RoomType $roomType)
    {
        $this->roomTypeService->update($roomType, $request->all());
        Session::flash('message', 'Room Type updated successfully!');

        return redirect()->route('room-types.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param RoomType $roomType
     * @return Response
     */
    public function destroy(RoomType $roomType)
    {
        $this->roomTypeService->delete($roomType);
        Session::flash('message', 'Room Type deleted successfully!');

        return redirect()->back();
    }
}
