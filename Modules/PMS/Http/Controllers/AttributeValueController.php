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
     * @param Attribute $attribute
     * @return Response
     */
    public function index(Attribute $attribute)
    {
        $attributeValues = $attribute->values;

        return view('pms::attribute-value.index', compact('attributeValues'));
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
}
