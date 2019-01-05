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
use Modules\HM\Services\HostelService;
use Modules\HM\Services\RoomService;
use Modules\HM\Services\RoomTypeService;
use Modules\HRM\Services\DepartmentService;
use Modules\HRM\Services\DesignationService;
use Modules\HRM\Services\EmployeeServices;
use Modules\TMS\Services\TrainingsService;

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
     * @var TrainingsService
     */
    private $trainingsService;

    private $hostelService;
    private $roomService;

    /**
     * BookingRequestController constructor.
     * @param BookingRequestService $bookingRequestService
     * @param RoomTypeService $roomTypeService
     * @param DepartmentService $departmentService
     * @param EmployeeServices $employeeServices
     * @param DesignationService $designationService
     * @param TrainingsService $trainingsService
     * @param HostelService $hostelService
     */
    public function __construct(
        BookingRequestService $bookingRequestService,
        RoomTypeService $roomTypeService,
        DepartmentService $departmentService,
        EmployeeServices $employeeServices,
        DesignationService $designationService,
        TrainingsService $trainingsService,
        HostelService $hostelService,
        RoomService $roomService
    )
    {
        $this->roomTypeService = $roomTypeService;
        $this->departmentService = $departmentService;
        $this->bookingRequestService = $bookingRequestService;
        $this->employeeServices = $employeeServices;
        $this->designationService = $designationService;
        $this->trainingsService = $trainingsService;
        $this->hostelService = $hostelService;
        $this->roomService = $roomService;
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
        $viewName = $checkinType == 'walkin' ? 'hm::booking-request.create' : 'hm::booking-request.edit';
        $trainings = $this->trainingsService->findAll();

        $roomDetails = [];
        $hostels = $this->hostelService->getAll();

        foreach ($hostels as $hostel){
            $roomDetails[$hostel->name] = $this->roomService->sortRoomsByLevel($hostel->rooms);
        }

        return view($viewName, compact(
                'roomTypes',
                'departments',
                'employees',
                'employeeOptions',
                'designations',
                'type',
                'checkinType',
                'trainings',
                'hostels',
                'roomDetails',
                $roomBooking ? 'roomBooking' : ''
            )
        );
    }

    public function store(StoreBookingRequest $request, $roomBookingId = null)
    {
        $data = $request->all();
        if ($roomBookingId)
            $data['booking_id'] = $roomBookingId;
        $checkin = $this->bookingRequestService->store($data, 'checkin');
        Session::flash('success', trans('labels.save_success'));
        return redirect(route('hostel.selection', ['roomCheckinId' => $checkin->id]));
    }

    /**
     * Display a listing of the resource.
     * @param bool $isTraining
     * @return Response
     */
    public function approvedRequests($isTraining = false)
    {
        $bookingRequests = $isTraining ? $this->bookingRequestService->pluckTrainingTitleBookingIdForApprovedBooking() : $this->bookingRequestService->pluckContactBookingIdForApprovedBooking();
        return view('hm::check-in.approved-booking-requests', compact('bookingRequests'));
    }

    /**
     * Show the specified resource.
     * @param RoomBooking $roomBooking
     * @return Response
     */
    public function show(RoomBooking $roomBooking)
    {
        $type = 'checkin';

        if ($roomBooking->type != 'checkin') {
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
        $trainings = $this->trainingsService->findAll();

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
            'trainings',
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
