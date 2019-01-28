<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Entities\Attribute;
use Modules\PMS\Http\Requests\StoreAttributeValueRequest;
use Modules\PMS\Services\AttributeValueService;

class AttributeValueController extends Controller
{
    /**
     * @var AttributeValueService
     */
    private $attributeValueService;

    /**
     * AttributeValueController constructor.
     * @param AttributeValueService $attributeValueService
     */
    public function __construct(AttributeValueService $attributeValueService)
    {
        $this->attributeValueService = $attributeValueService;
    }

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
     * @param StoreAttributeValueRequest $request
     * @param Attribute $attribute
     * @return array
     */
    public function store(StoreAttributeValueRequest $request, Attribute $attribute)
    {
        $this->attributeValueService->store($request->all());
        Session::flash('success', trans('labels.save_success'));

        return redirect()->back();
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
