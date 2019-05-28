<?php

namespace Modules\IMS\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\IMS\Entities\InventoryRequest;
use Modules\IMS\Services\InventoryRequestService;

class InventoryRequestController extends Controller
{
    private $inventoryRequestService;

    public function __construct(InventoryRequestService $inventoryRequestService)
    {
        $this->inventoryRequestService = $inventoryRequestService;
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
    public function create(string $type)
    {
        list(
            $loadedViews,
            $employeeOptions,
            $fromLocations,
            $toLocations,
            $itemCategories
        ) = $this->inventoryRequestService->prepareViews($type);

        return view('ims::inventory.request.create',
            compact('employeeOptions',
                'fromLocations',
                'toLocations',
                'itemCategories',
                'type',
                'loadedViews'
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

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        return redirect();
    }

}
