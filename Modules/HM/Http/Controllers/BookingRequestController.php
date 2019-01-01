<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HM\Entities\RoomBooking;
use Modules\HM\Http\Requests\StoreBookingRequest;
use Modules\HM\Http\Requests\UpdateBookingRequest;
use Modules\HM\Services\BookingRequestService;
use Modules\HM\Services\RoomTypeService;
use Modules\HRM\Services\DepartmentService;
use Modules\HRM\Services\DesignationService;
use Modules\HRM\Services\EmployeeServices;

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
     * @var EmployeeServices
     */
    private $employeeServices;
    /**
     * @var DesignationService
     */
    private $designationService;

    /**
     * BookingRequestController constructor.
     * @param BookingRequestService $bookingRequestService
     * @param RoomTypeService $roomTypeService
     * @param DepartmentService $departmentService
     * @param EmployeeServices $employeeServices
     * @param DesignationService $designationService
     */
    public function __construct(
        BookingRequestService $bookingRequestService,
        RoomTypeService $roomTypeService,
        DepartmentService $departmentService,
        EmployeeServices $employeeServices,
        DesignationService $designationService
    )
    {
        $this->roomTypeService = $roomTypeService;
        $this->departmentService = $departmentService;
        $this->bookingRequestService = $bookingRequestService;
        $this->employeeServices = $employeeServices;
        $this->designationService = $designationService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $bookingRequests = $this->bookingRequestService->findAll();
        return view('hm::booking-request.index', compact('bookingRequests'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $roomTypes = $this->roomTypeService->findAll();
        $departments = $this->departmentService->findAll();
        $employees = $this->employeeServices->findAll();
        $employeeOptions = $this->employeeServices->getEmployeeListForBardReference();
        $designations = $this->designationService->findAll();

        return view('hm::booking-request.create', compact(
                'roomTypes',
                'departments',
                'employees',
                'employeeOptions',
                'designations'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreBookingRequest $request
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
     * @param RoomBooking $roomBooking
     * @return Response
     */
    public function show(RoomBooking $roomBooking)
    {
        return view('hm::booking-request.show', compact('roomBooking'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param RoomBooking $roomBooking
     * @return Response
     */
    public function edit(RoomBooking $roomBooking)
    {
        $requester = $roomBooking->requester;
        $referee = $roomBooking->referee;
        $roomInfos = $roomBooking->roomInfos;
        $roomTypes = $this->roomTypeService->findAll();
        $departments = $this->departmentService->findAll();
        $guestInfos = $roomBooking->guestInfos;

        return view('hm::booking-request.edit', compact(
            'requester',
            'departments',
            'roomInfos',
            'guestInfos',
            'roomBooking',
            'roomTypes',
            'referee'
        ));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateBookingRequest $request, RoomBooking $roomBooking)
    {
        return $request;
        $this->bookingRequestService->update($request->all(), $roomBooking);
        Session::flash('message', 'Successfully updated room booking information');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
