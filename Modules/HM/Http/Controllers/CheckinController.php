<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HM\Entities\RoomBooking;
use Modules\HM\Http\Requests\StoreBookingRequest;
use Modules\HM\Services\BookingRequestService;
use Modules\HM\Services\RoomTypeService;
use Modules\HRM\Services\DepartmentService;
use Modules\HRM\Services\DesignationService;
use Modules\HRM\Services\EmployeeServices;

class CheckinController extends Controller
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
        $checkins = $this->bookingRequestService->findBy(['type' => 'checkin']);

        return view('hm::check-in.index', compact('checkins'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createOptions()
    {
        return view('hm::check-in.create-options');
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
        $type = 'checkin';

        return view('hm::booking-request.create', compact(
                'roomTypes',
                'departments',
                'employees',
                'employeeOptions',
                'designations',
                'type'
            )
        );
    }

    public function store(StoreBookingRequest $request) {
        $checkin = $this->bookingRequestService->store($request->all(), 'checkin');
        Session::flash('success', trans('labels.save_success'));
        return redirect(route('hostel.selection', ['roomBookingId' => $checkin->id]));
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function approvedRequests()
    {
        $bookingRequests = $this->bookingRequestService->pluckContactBookingIdForApprovedBooking();
        return view('hm::check-in.approved_booking_requests', compact('bookingRequests'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        $type = 'checkin';
        $roomBooking = RoomBooking::first();
        return view('hm::booking-request.show', compact('roomBooking', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        $type = 'checkin';
        return view('hm::check-in.edit', compact('type'));
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
