<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HM\Entities\RoomBooking;
use Modules\HM\Http\Requests\StoreBookingRequest;
use Modules\HM\Services\RoomBookingService;
use Modules\HM\Services\RoomTypeService;
use Modules\HRM\Services\DepartmentService;

class HostelBookingController extends Controller
{
    /**
     * @var RoomTypeService
     */
    private $roomTypeService;
    /**
     * @var DepartmentService
     */
    private $departmentService;
    /**
     * @var RoomBookingService
     */
    private $bookingService;

    /**
     * HostelBookingController constructor.
     * @param RoomBookingService $bookingService
     * @param RoomTypeService $roomTypeService
     * @param DepartmentService $departmentService
     */
    public function __construct(
        RoomBookingService $bookingService,
        RoomTypeService $roomTypeService,
        DepartmentService $departmentService
    ) {
        $this->roomTypeService = $roomTypeService;
        $this->departmentService = $departmentService;
        $this->bookingService = $bookingService;
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
     * @return Response
     */
    public function create()
    {
        $roomTypes = $this->roomTypeService->findAll();
        $departments = $this->departmentService->findAll();

        return view('hm::booking.create', compact('roomTypes', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(StoreBookingRequest $request)
    {
        $this->bookingService->save($request->all());
        Session::flash('message', 'Successfully stored room booking information');
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
     * @param RoomBooking $roomBooking
     * @return Response
     */
    public function edit(RoomBooking $roomBooking)
    {
        $requester = $roomBooking->requester;
        /*return $requester;*/
        $departments  = $roomBooking->referee;
        $roomInfos = $roomBooking->roomInfos;
        $roomTypes = $this->roomTypeService->findAll();
        $guestInfos = $roomBooking->guestInfos;
        /*return $guestInfos;*/
        return view('hm::booking.edit',compact('requester','departments','roomInfos','guestInfos','roomBooking', 'roomTypes'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(StoreBookingRequest $request)
    {
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
