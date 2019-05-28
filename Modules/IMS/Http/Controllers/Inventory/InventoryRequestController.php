<?php

namespace Modules\IMS\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\HRM\Services\EmployeeServices;
use Modules\IMS\Entities\InventoryRequest;
use Modules\IMS\Services\InventoryItemCategoryService;
use Modules\IMS\Services\InventoryRequestService;
use Modules\IMS\Services\InventoryLocationService;

class InventoryRequestController extends Controller
{
    private $inventoryRequestService;
    private $employeeService;
    private $locationService;
    private $inventoryItemCategoryService;

    public function __construct(
        InventoryRequestService $inventoryRequestService,
        EmployeeServices $employeeService,
        InventoryLocationService $locationService,
        InventoryItemCategoryService $inventoryItemCategoryService
    )
    {
        $this->inventoryRequestService = $inventoryRequestService;
        $this->employeeService = $employeeService;
        $this->locationService = $locationService;
        $this->inventoryItemCategoryService = $inventoryItemCategoryService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $inventoryRequests = $this->inventoryRequestService->findAll();
        return view('ims::inventory.request.index', compact('inventoryRequests'));
    }

    /**
     * Show the form for creating a new resource.
     * @param string $type
     * @return Response
     */
    public function create(string $type = null)
    {
        $employeeOptions = $this->employeeService->getEmployeesForDropdown(
            null, null,
            ['department_id' => Auth::user()->employee->department_id, 'is_divisional_director' => false]
        );

        $fromLocations = $toLocations = $this->locationService->getLocationsForDropdown();
        $itemCategories = $this->inventoryItemCategoryService->getItemCategoryForDropdown();
        $itemCategories = ['' => 'Select'] + $itemCategories;

        $extra['loaded-views'] = $this->inventoryRequestService->prepareViews($type);

        return view('ims::inventory.request.create',
            compact('employeeOptions',
                'fromLocations',
                'toLocations',
                'itemCategories',
                'type',
                'extra'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // TODO: request validation

        if ($this->inventoryRequestService->store($request->all())) {
            Session::flash('success', trans('labels.save_success'));
        } else {
            Session::flash('error', trans('labels.save_fail'));
        }

        return redirect()->route('inventory-request.index');
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

}
