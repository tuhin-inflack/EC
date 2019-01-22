<?php

namespace Modules\HM\Http\Controllers;

use App\Services\UserService;
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
use Modules\TMS\Services\TrainingsService;
use Nwidart\Modules\Facades\Module;

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
     * @var TrainingsService
     */
    private $trainingService;
    /**
     * @var DesignationService
     */
    private $userService;

    /**
     * BookingRequestController constructor.
     * @param BookingRequestService $bookingRequestService
     * @param RoomTypeService $roomTypeService
     * @param DepartmentService $departmentService
     * @param EmployeeServices $employeeServices
     * @param DesignationService $designationService
     * @param TrainingsService $trainingService
     * @param UserService $userService
     */
    public function __construct(
        BookingRequestService $bookingRequestService,
        RoomTypeService $roomTypeService,
        DepartmentService $departmentService,
        EmployeeServices $employeeServices,
        DesignationService $designationService,
        TrainingsService $trainingService,
        UserService $userService
    )
    {
        $this->roomTypeService = $roomTypeService;
        $this->departmentService = $departmentService;
        $this->bookingRequestService = $bookingRequestService;
        $this->employeeServices = $employeeServices;
        $this->designationService = $designationService;
        $this->trainingService = $trainingService;
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $bookingRequests = [];

        switch (1){
            case $this->userService->isDirectorGeneral():
                // show only forwarded requests
                $bookingRequests = $this->bookingRequestService->getBookingRequestWithInIds();
                break;
            case $this->userService->isDirectorAdmin():
                // show all General requests with forwarded ones
                $bookingRequests = $this->bookingRequestService->getBookingRequestWithInIds(['general']);
                break;
            case $this->userService->isDirectorTraining():
                // show all Training and Venue requests with forwarded ones
                $bookingRequests = $this->bookingRequestService->getBookingRequestWithInIds(['training', 'venue']);
                break;
            default:
                $bookingRequests = $this->bookingRequestService->findBy(['type' => 'booking']);
                break;
        }

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
        $employeeOptions = $this->employeeServices->getEmployeeListForBardReference(function ($employee){
            return $employee->employee_id . ' - ' . $employee->first_name . ' ' . $employee->last_name . ' - ' . $employee->mobile_one;
        });
        $designations = $this->designationService->findAll();
        $type = 'booking';

        // Collecting Training List from Training Modules
        $trainings = $this->trainingService->findAll();

        return view('hm::booking-request.create', compact(
                'roomTypes',
                'departments',
                'employees',
                'employeeOptions',
                'designations',
                'type',
                'trainings'
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
        $this->bookingRequestService->store($request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('booking-requests.index');
    }

    /**
     * Show the specified resource.
     * @param RoomBooking $roomBooking
     * @return Response
     */
    public function show(RoomBooking $roomBooking)
    {
        $forwardToUsers = $this->userService->getAdminExceptLoggedInUserRole();
        $type = 'booking';
        return view('hm::booking-request.show', compact('roomBooking', 'type', 'forwardToUsers'));
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
        $trainings = $this->trainingService->findAll();

        $type = 'booking';

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
        $this->bookingRequestService->updateRequest($request->all(), $roomBooking);
        Session::flash('success', trans('labels.update_success'));
        return redirect()->route('booking-requests.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
