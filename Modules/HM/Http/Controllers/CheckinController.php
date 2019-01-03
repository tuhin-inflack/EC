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
     * @param RoomBooking $roomBooking
     * @return Response
     */
    public function create(RoomBooking $roomBooking = null)
    {
        $roomTypes = $this->roomTypeService->findAll();
        $departments = $this->departmentService->findAll();
        $employees = $this->employeeServices->findAll();
        $employeeOptions = $this->employeeServices->getEmployeeListForBardReference();
        $designations = $this->designationService->findAll();
        $type = 'checkin';
        $checkinType = $roomBooking ? 'from-booking' : 'walkin';
        $viewName = $checkinType == 'walkin'? 'hm::booking-request.create' : 'hm::booking-request.edit';

        return view($viewName, compact(
                'roomTypes',
                'departments',
                'employees',
                'employeeOptions',
                'designations',
                'type',
                'checkinType',
                $roomBooking ? 'roomBooking':''
            )
        );
    }

    public function store(StoreBookingRequest $request, $roomBookingId=null) {
        $data = $request->all();
        if ($roomBookingId)
            $data['booking_id'] = $roomBookingId;
        $checkin = $this->bookingRequestService->store($data, 'checkin');
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
     * @param RoomBooking $roomBooking
     * @return Response
     */
    public function show(RoomBooking $roomBooking)
    {
        $type = 'checkin';

        if ($roomBooking->type != 'checkin')
        {
            abort(404);
        }

        return view('hm::booking-request.show', compact('roomBooking', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param RoomBooking $roomBooking
     * @return Response
     */
    public function edit(RoomBooking $roomBooking, $bookingId)
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
        $type = 'checkin';

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
            'bookingType',
            'type'
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
        $checkin = $this->bookingRequestService->update($request->all(), $roomBooking);
        Session::flash('update', trans('labels.update_success'));

        return redirect(route('hostel.selection', ['roomBookingId' => $checkin->id]));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

}
