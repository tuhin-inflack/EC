<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Entities\Attribute;
use Modules\PMS\Entities\AttributeValue;
use Modules\PMS\Http\Requests\StoreAttributeValueRequest;
use Modules\PMS\Http\Requests\UpdateAttributeValueRequest;
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
     * @param Attribute $attribute
     * @return Response
     */
    public function index(Attribute $attribute)
    {
        return view('pms::attribute-value.index', compact('attribute'));
    }

    /**
     * Show the form for creating a new resource.
     * @param Attribute $attribute
     * @return Response
     */
    public function create(Attribute $attribute)
    {
        $pageType = 'create';
        return view('pms::attribute-value.create', compact('attribute', 'pageType'));
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

    public function edit(Attribute $attribute, AttributeValue $attributeValue)
    {
        if (!$attribute->values->where('id', $attributeValue->id)->count()) {
            abort(404);
        }
        $pageType = 'edit';

        return view('pms::attribute-value.edit', compact('attribute', 'attributeValue', 'pageType'));
    }

    /**
     * @param UpdateAttributeValueRequest $request
     * @param Attribute $attribute
     * @param AttributeValue $attributeValue
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAttributeValueRequest $request, Attribute $attribute, AttributeValue $attributeValue)
    {
        if (!$attribute->values->where('id', $attributeValue->id)->count()) {
            abort(404);
        }

        if ($this->attributeValueService->update($attributeValue, $request->all())) {
            Session::flash('success', trans('labels.update_success'));
        } else {
            Session::flash('error', trans('labels.update_fail'));
        }

        return redirect()->back();
    }
}
