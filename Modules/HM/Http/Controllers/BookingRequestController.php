<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HM\Http\Requests\StoreBookingRequest;
use Modules\HM\Services\BookingRequestService;
use Modules\HM\Services\RoomTypeService;
use Modules\HRM\Services\DepartmentService;

class BookingRequestController extends Controller
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
     * @var BookingRequestService
     */
    private $bookingRequestService;

    /**
     * BookingRequestController constructor.
     * @param BookingRequestService $bookingRequestService
     * @param RoomTypeService $roomTypeService
     * @param DepartmentService $departmentService
     */
    public function __construct(
        BookingRequestService $bookingRequestService,
        RoomTypeService $roomTypeService,
        DepartmentService $departmentService
    ) {
        $this->roomTypeService = $roomTypeService;
        $this->departmentService = $departmentService;
        $this->bookingRequestService = $bookingRequestService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $bookings = $this->bookingRequestService->findAll();
        return view('hm::booking-request.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $roomTypes = $this->roomTypeService->findAll();
        $departments = $this->departmentService->findAll();

        return view('hm::booking-request.create', compact('roomTypes', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(StoreBookingRequest $request)
    {
        $this->bookingRequestService->save($request->all());
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
