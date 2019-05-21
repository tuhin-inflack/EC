<?php

namespace Modules\IMS\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\IMS\Entities\Vendor;
use Modules\IMS\Services\VendorService;

class VendorController extends Controller
{

    /**
     * @var VendorService
     */
    private $vendorService;

    public function __construct(VendorService $vendorService)
    {
        /** @var VendorService $vendorService */
        $this->vendorService = $vendorService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $vendors = $this->vendorService->getAllVendors();
        return view('ims::vendor.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('ims::vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->vendorService->store($request->all());
        Session::flash('success', trans('labels.save_success'));
        return redirect()->route('vendor.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Vendor $vendor)
    {
        return view('ims::vendor.show', compact('vendor'));
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
