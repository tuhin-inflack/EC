<?php

namespace Modules\IMS\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\IMS\Entities\Warehouse;
use Modules\IMS\Services\WarehouseService;

class InventoryController extends Controller
{

    /**
     * @var WarehouseService
     */
    private $warehouseService;

    public function __construct(WarehouseService $warehouseService)
    {
        /** @var WarehouseService $warehouseService */
        $this->warehouseService = $warehouseService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('ims::inventory.index');
    }

    /**
     * Show the form for creating a new resource.
     * @param Warehouse $warehouse
     * @return Response
     */
    public function create(Warehouse $warehouse)
    {
        $warehouses = $this->warehouseService->getAllWarehousesForDropdown();
        return view('ims::inventory.create', compact('warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('ims::inventory.warehouse.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('ims::inventory.add');
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
