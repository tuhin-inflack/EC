<?php

namespace Modules\PMS\Http\Controllers;

use App\Services\OrganizationService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Entities\Attribute;
use Modules\PMS\Http\Requests\StoreUpdateAttributeRequest;
use Modules\PMS\Http\Requests\UpdateAttributeRequest;
use Modules\PMS\Services\AttributeService;


class AttributeController extends Controller
{
    /**
     * @var AttributeService
     */
    private $attributeService;
    /**
     * @var OrganizationService
     */
    private $organizationService;

    /**
     * AttributeController constructor.
     * @param AttributeService $attributeService
     * @param OrganizationService $organizationService
     */
    public function __construct(AttributeService $attributeService, OrganizationService $organizationService)
    {
        $this->attributeService = $attributeService;
        $this->organizationService = $organizationService;
    }

    public function index()
    {
        $attributes = $this->attributeService->findAll();
        return view('pms::attribute.index', compact('attributes'));
    }

    public function create()
    {
        $organizations = $this->organizationService->findAll()->pluck('name', 'id');
        return view('pms::attribute.create', compact('organizations'));
    }

    public function store(StoreUpdateAttributeRequest $request)
    {
        $this->attributeService->save($request->all());
        Session::flash('success', trans('labels.save_success'));

        return redirect()->back();
//        return redirect()->route('attributes.index');
    }

    public function edit(Attribute $attribute)
    {
        $organizations = $this->organizationService->findAll()->pluck('name', 'id');
        return view('pms::attribute.edit', compact('attribute', 'organizations'));
    }

    public function update(UpdateAttributeRequest $request, Attribute $attribute)
    {
        $this->attributeService->update($attribute, $request->all());
        Session::flash('success', trans('labels.update_success'));

        return redirect()->route('attributes.index');
    }
}
