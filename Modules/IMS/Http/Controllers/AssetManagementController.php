<?php

namespace Modules\IMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AssetManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $assets = [
            ['title' => 'Monitor','type' => 'Electronics', 'price' => '11200 BDT', 'status' => 'Active','appreciation' => 'N/A', 'depreciation' => 'N/A', 'purchase_date' => '2019-01-15'],
            ['title' => 'Almirah','type' => 'Furniture', 'price' => '25000 BDT', 'status' => 'Active','appreciation' => 'N/A', 'depreciation' => 'N/A', 'purchase_date' => '2018-04-11'],
            ['title' => 'Test Asset','type' => 'Test Type', 'price' => '1100 BDT', 'status' => 'Active', 'appreciation' => 'N/A', 'depreciation' => 'N/A', 'purchase_date' => '2018-01-25'],
        ];
        return view('ims::asset-management.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('ims::create');
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
        $assets = [
            ['title' => 'Monitor','type' => 'Electronics', 'price' => '11200 BDT', 'status' => 'Active','appreciation' => 'N/A', 'depreciation' => 'N/A', 'purchase_date' => '2019-01-15'],
            ['title' => 'Almirah','type' => 'Furniture', 'price' => '25000 BDT', 'status' => 'Active','appreciation' => 'N/A', 'depreciation' => 'N/A', 'purchase_date' => '2018-04-11'],
            ['title' => 'Test Asset','type' => 'Test Type', 'price' => '1100 BDT', 'status' => 'Active', 'appreciation' => 'N/A', 'depreciation' => 'N/A', 'purchase_date' => '2018-01-25'],
        ];
        $asset = $assets[$id];

        return view('ims::asset-management.show', compact('asset'));
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
