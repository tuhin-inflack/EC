<?php

namespace Modules\IMS\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\IMS\Entities\Inventory;
use Modules\IMS\Entities\InventoryItemCategory;
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
        $categories = $this->inventoryItemCategoryService->getAllCategories();
        return view('ims::inventory.category.index', compact('categories'));
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
    public function show(InventoryItemCategory $inventoryItemCategory)
    {
        return view('ims::inventory.category.show', compact('inventoryItemCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(InventoryItemCategory $inventoryItemCategory)
    {
        return view('ims::inventory.category.edit', compact('inventoryItemCategory'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, InventoryItemCategory $inventoryItemCategory)
    {
        $this->inventoryItemCategoryService->updateInventoryItemCategory($inventoryItemCategory, $request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('inventory-item-category.index');
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

    public function departmentalItemCategory()
    {
        $departmentalCategories = $this->inventoryItemCategoryService->getDepartmentalItemCategories();
        return view('ims::inventory.category.departmental', compact('departmentalCategories'));
    }
}
