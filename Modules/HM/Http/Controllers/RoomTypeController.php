<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
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

        return view('hm::room-type.index');
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
     * @param  Request $request
     * @return Response
     */
    public function store(CreateRoomTypeRequest $request)
    {
        $this->roomTypeService->store($request->all());

        return view('hm::room-type.index');
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
     * @param UpdateRoomTypeRequest $request
     * @param RoomType $roomType
     * @return Response
     */
    public function update(UpdateRoomTypeRequest $request, RoomType $roomType)
    {
        $this->roomTypeService->update($roomType, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
