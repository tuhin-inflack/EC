<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
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
    public function store(Request $request)
    {
        return $this->bookingService->save($request->all());
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
