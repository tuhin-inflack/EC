<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Entities\Attribute;
use Modules\PMS\Entities\AttributeValue;
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

    public function create(Attribute $attribute)
    {
        $pageType = 'create';
        $module = explode("/", Request()->route()->getPrefix())[0];

        return view('attribute-value.create', compact('attribute', 'pageType', 'module'));
    }

    public function store(Request $request, Attribute $attribute)
    {
        if ($this->attributeValueService->store($request->all())) {
            Session::flash('success', trans('labels.save_success'));
        } else {
            Session::flash('error', trans('labels.save_fail'));
        }

        return redirect()->back();
    }

    public function edit(Attribute $attribute, AttributeValue $attributeValue)
    {
        if (!$attribute->values->where('id', $attributeValue->id)->count()) {
            abort(404);
        }

        $module = explode('/', Request()->route()->getPrefix())[0];
        $pageType = 'edit';

        return view('attribute-value.edit', compact('attribute', 'attributeValue', 'pageType', 'module'));
    }
}
