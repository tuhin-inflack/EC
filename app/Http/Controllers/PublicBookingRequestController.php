<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Modules\HM\Http\Requests\StoreUpdateBookingRequest;
use Modules\HM\Services\BookingRequestService;
use Modules\HM\Services\RoomTypeService;
use Modules\HRM\Services\DepartmentService;
use Modules\HRM\Services\DesignationService;
use Modules\HRM\Services\EmployeeServices;
use Modules\TMS\Services\TrainingsService;

class PublicBookingRequestController extends Controller
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
     * @var EmployeeServices
     */
    private $employeeServices;
    /**
     * @var DesignationService
     */
    private $designationService;
    /**
     * @var BookingRequestService
     */
    private $bookingRequestService;
    /**
     * @var TrainingsService
     */
    private $trainingsService;

    /**
     * PublicBookingRequestController constructor.
     * @param BookingRequestService $bookingRequestService
     * @param RoomTypeService $roomTypeService
     * @param DepartmentService $departmentService
     * @param EmployeeServices $employeeServices
     * @param DesignationService $designationService
     * @param TrainingsService $trainingsService
     */
    public function __construct(
        BookingRequestService $bookingRequestService,
        RoomTypeService $roomTypeService,
        DepartmentService $departmentService,
        EmployeeServices $employeeServices,
        DesignationService $designationService,
        TrainingsService $trainingsService
    )
    {
        $this->roomTypeService = $roomTypeService;
        $this->departmentService = $departmentService;
        $this->employeeServices = $employeeServices;
        $this->designationService = $designationService;
        $this->bookingRequestService = $bookingRequestService;
        $this->trainingsService = $trainingsService;
    }

    public function create()
    {
        $roomTypes = $this->roomTypeService->getRoomTypesThatHasRooms();
        $departments = $this->departmentService->findAll();
        $employees = $this->employeeServices->findAll();
        $employeeOptions = $this->employeeServices->getEmployeesForDropdown();
        $designations = $this->designationService->findAll();
        $trainings = $this->trainingsService->findAll();
        $type = 'booking';

        return view('hm::booking-request.public.create', compact(
            'roomTypes',
            'departments',
            'employees',
            'employeeOptions',
            'designations',
            'trainings',
            'type'
        ));
    }

    public function store(StoreUpdateBookingRequest $request)
    {
        $this->bookingRequestService->store($request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->back();
    }
}
