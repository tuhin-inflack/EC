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
    public function create(Request $request)
    {
        $roomTypes = $this->roomTypeService->findAll();
        $departments = $this->departmentService->findAll();
        $employees = $this->employeeServices->findAll();
        $employeeOptions = $this->employeeServices->getEmployeeListForBardReference();
        $designations = $this->designationService->findAll();
        $bookingType = isset($request['bookingType']) ? $request['bookingType'] : null;

        return view('hm::booking-request.create', compact(
                'roomTypes',
                'departments',
                'employees',
                'employeeOptions',
                'designations',
                'bookingType'
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
        $roomBooking = $this->bookingRequestService->save($request->all());
        Session::flash('message', 'Successfully stored room booking information');
        $route = $this->bookingRequestService->getRoute($request->all(), $roomBooking->id);
        return redirect($route);
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
        $employees = $this->employeeServices->findAll();
        $requester = $roomBooking->requester;
        $referee = $roomBooking->referee;
        $roomInfos = $roomBooking->roomInfos;
        $roomTypes = $this->roomTypeService->findAll();
        $departments = $this->departmentService->findAll();
        $guestInfos = $roomBooking->guestInfos;
        $employeeOptions = $this->employeeServices->getEmployeeListForBardReference();
        $designations = $this->designationService->findAll();
        $bookingType = isset($request['bookingType']) ? $request['bookingType'] : null;

        return view('hm::booking-request.edit', compact(
            'requester',
            'departments',
            'roomInfos',
            'guestInfos',
            'roomBooking',
            'roomTypes',
            'referee',
            'employeeOptions',
            'employees',
            'designations',
            'bookingType'
        ));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateBookingRequest $request
     * @param RoomBooking $roomBooking
     * @return Response
     */
    public function update(UpdateBookingRequest $request, RoomBooking $roomBooking)
    {
        return $request->all();
        $this->bookingRequestService->update($request->all(), $roomBooking);
        Session::flash('message', trans('labels.update_success'));

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
