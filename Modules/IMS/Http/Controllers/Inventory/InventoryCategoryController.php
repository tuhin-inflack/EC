<?php

namespace Modules\IMS\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\IMS\Services\InventoryItemCategoryService;

class InventoryCategoryController extends Controller
{

    /**
     * @var InventoryItemCategoryService
     */
    private $inventoryItemCategoryService;

    public function __construct(InventoryItemCategoryService $inventoryItemCategoryService)
    {
        /** @var InventoryItemCategoryService $inventoryItemCategoryService */
        $this->inventoryItemCategoryService = $inventoryItemCategoryService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('ims::inventory.category.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('ims::inventory.category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->inventoryItemCategoryService->store($request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('inventory-item-category.index');
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
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('ims::edit');
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
