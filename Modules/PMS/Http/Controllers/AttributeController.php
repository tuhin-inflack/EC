<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Services\AttributeService;

class AttributeController extends Controller
{
    /**
     * @var AttributeService
     */
    private $attributeService;

    /**
     * AttributeController constructor.
     * @param AttributeService $attributeService
     */
    public function __construct(AttributeService $attributeService)
    {
        $this->attributeService = $attributeService;
    }

    public function create()
    {
        // TODO: inject organization select options
        return view('pms::attribute.create');
    }

    public function store(Request $request)
    {
        $this->attributeService->save($request->all());
        Session::flash('success', trans('labels.save_success'));

        return redirect()->back();
    }
}
