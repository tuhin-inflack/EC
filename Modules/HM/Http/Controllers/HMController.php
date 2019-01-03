<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\HM\Services\HostelService;
use Modules\HM\Services\RoomService;

class HMController extends Controller
{
    private $hostelService;
    private $roomService;
    /**
     * HostelController constructor.
     * @param HostelService $hostelService
     * @param RoomService $roomService
     */
    public function __construct(HostelService $hostelService, RoomService $roomService)
    {
        $this->hostelService = $hostelService;
        $this->roomService = $roomService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $roomDetails = [];
        $hostels = $this->hostelService->getAll();

        foreach ($hostels as $hostel){
            $roomDetails[$hostel->name] = $this->roomService->sortRoomsByLevel($hostel->rooms);
        }

        $allRoomsCountBasedOnStatus = $this->hostelService->getRoomsCountBasedOnStatus();

        return view('hm::index', compact('hostels', 'roomDetails', 'allRoomsCountBasedOnStatus'));
    }

    public function show(){
        return $this->hostelService->getRoomsCountBasedOnStatus();
    }

    public function roomsChart()
    {
        return view('hm::dashboard.chart');
    }

}
