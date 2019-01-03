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

        $allRoomsCountBasedOnStatus = $this->allRoomsCountBasedOnStatus();

        return view('hm::index', compact('hostels', 'roomDetails', 'allRoomsCountBasedOnStatus'));
    }

    public function allRoomsCountBasedOnStatus()
    {
        $overAllStatus = [
            'booked' => 0,
            'available' => 0,
            'not_in_service' => 0
        ];

        $allRoomsCount = $this->roomService->getAllRoomCountByStatus()->toArray();
        $allRoomsCount = array_column($allRoomsCount, 'room_count', 'status');

        $overAllStatus['booked'] = (isset($allRoomsCount['available']) ? $allRoomsCount['available'] : 0) + (isset($allRoomsCount['partially-available']) ? $allRoomsCount['partially-available'] : 0);
        $overAllStatus['available'] = (isset($allRoomsCount['unavailable']) ? $allRoomsCount['unavailable'] : 0);
        $overAllStatus['not_in_service'] = (isset($allRoomsCount['not-in-service']) ? $allRoomsCount['not-in-service'] : 0);

        return $overAllStatus;
    }

    public function show(){
        $roomDetails = [];
        $hostels = $this->hostelService->getAll();
        foreach ($hostels as $hostel){
            $roomDetails[$hostel->name] = $this->roomService->sortRoomsByLevel($hostel->rooms);
        }

        return $hostels;
    }

    public function roomsChart()
    {
        return view('hm::dashboard.chart');
    }

}
