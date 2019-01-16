<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PMS\Entities\Attribute;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('pms::index');
    }

    /**
     * Show the form for creating a new resource.
     * @param Attribute $attribute
     * @return Response
     */
    public function create(Attribute $attribute)
    {
        return view('pms::attribute-value.create', compact('attribute'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @param Attribute $attribute
     * @return array
     */
    public function store(Request $request, Attribute $attribute)
    {
        return $request->all();
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('pms::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('pms::edit');
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
