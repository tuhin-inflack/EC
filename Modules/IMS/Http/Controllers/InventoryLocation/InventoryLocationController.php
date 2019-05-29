<?php

namespace Modules\IMS\Http\Controllers\InventoryLocation;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Services\DepartmentService;
use Modules\IMS\Entities\InventoryLocation;
use Modules\IMS\Services\InventoryLocationService;

class InventoryLocationController extends Controller
{
    /**
     * @var DepartmentService
     */
    private $departmentService;
    /**
     * @var InventoryLocationService
     */
    private $locationService;
    /**
     * @var InventoryLocationService
     */
    private $inventoryLocationService;

    public function __construct(DepartmentService $departmentService, InventoryLocationService $inventoryLocationService)
    {
        /** @var DepartmentService $departmentService */
        $this->departmentService = $departmentService;
        /** @var InventoryLocationService $inventoryLocationService */
        $this->inventoryLocationService = $inventoryLocationService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $inventoryLocations = $this->inventoryLocationService->getAllLocationsExceptDefaults();
        return view('ims::inventory_location.index', compact('inventoryLocations'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $departments = $this->departmentService->getDepartmentsForDropdown();
        return view('ims::inventory_location.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->inventoryLocationService->store($request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('inventory-locations.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(InventoryLocation $location)
    {
        return view('ims::inventory_location.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param InventoryLocation $location
     * @return Response
     */
    public function edit(InventoryLocation $location)
    {
        $departments = $this->departmentService->getDepartmentsForDropdown();
        return view('ims::inventory_location.edit', compact('location', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, InventoryLocation $location)
    {
        $this->inventoryLocationService->updateLocation($location, $request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('inventory-locations.index');
    }
}
