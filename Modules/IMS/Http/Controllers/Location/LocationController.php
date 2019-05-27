<?php

namespace Modules\IMS\Http\Controllers\Location;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Services\DepartmentService;
use Modules\IMS\Entities\Location;
use Modules\IMS\Services\LocationService;

class LocationController extends Controller
{
    /**
     * @var DepartmentService
     */
    private $departmentService;
    /**
     * @var LocationService
     */
    private $locationService;

    public function __construct(DepartmentService $departmentService, LocationService $locationService)
    {
        /** @var DepartmentService $departmentService */
        $this->departmentService = $departmentService;
        /** @var LocationService $locationService */
        $this->locationService = $locationService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $locations = $this->locationService->getAllLocations();
        return view('ims::location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $departments = $this->departmentService->getDepartmentsForDropdown();
        return view('ims::location.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->locationService->store($request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('location.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Location $location)
    {
        return view('ims::location.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Location $location)
    {
        $departments = $this->departmentService->getDepartmentsForDropdown();
        return view('ims::location.edit', compact('location', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Location $location)
    {
        $this->locationService->updateLocation($location, $request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('location.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
