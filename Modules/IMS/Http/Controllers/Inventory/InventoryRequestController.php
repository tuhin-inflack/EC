<?php

namespace Modules\IMS\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\HRM\Services\EmployeeServices;
use Modules\IMS\Entities\InventoryRequest;
use Modules\IMS\Services\InventoryRequestService;
use Modules\IMS\Services\LocationService;

class InventoryRequestController extends Controller
{

    private $inventoryRequestService;
    private $employeeService;
    private $locationService;

    public function __construct(InventoryRequestService $inventoryRequestService,
                                EmployeeServices $employeeService, LocationService $locationService)
    {
        $this->inventoryRequestService = $inventoryRequestService;
        $this->employeeService = $employeeService;
        $this->locationService = $locationService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $inventoryRequests = $this->inventoryRequestService->findAll();
        return view('ims::inventory.request.index')->with(compact('inventoryRequests'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $employeeOptions = $this->employeeService->getEmployeesForDropdown(
            null, null,
            ['department_id' => Auth::user()->employee->department_id, 'is_divisional_director' => false]
        );

        $fromLocations = $toLocations = $this->locationService->getLocationsForDropdown();

        return view('ims::inventory.request.create', compact('employeeOptions', 'fromLocations', 'toLocations'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('ims::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param InventoryRequest $inventoryRequest
     * @return Response
     */
    public function edit(InventoryRequest $inventoryRequest)
    {
        return view('ims::inventory.request.edit', compact('inventoryRequest'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
