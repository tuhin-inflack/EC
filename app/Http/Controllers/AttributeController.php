<?php

namespace App\Http\Controllers;

use App\Entities\Organization\Organization;
use App\Http\Requests\StoreUpdateAttributeRequest;
use App\Services\OrganizationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Entities\Attribute;
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

    public function create(Organization $organization)
    {
        // TODO: inject organization into view for organization_id input
        $organizations = $this->organizationService->findAll()->pluck('name', 'id');
        $module = explode('/', Request()->route()->getPrefix())[0];

        return view('attribute.create', compact('module', 'organizations'));
    }

    public function store(StoreUpdateAttributeRequest $request)
    {
        if ($this->attributeService->save($request->all())) {
            Session::flash('success', trans('labels.save_success'));
        } else {
            Session::flash('error', trans('labels.save_fail'));
        }

        return redirect()->back();
    }

    public function edit(Organization $organization, Attribute $attribute)
    {
        $organizations = $this->organizationService->findAll()->pluck('name', 'id');
        $module = explode('/', Request()->route()->getPrefix())[0];
        return view('attribute.edit', compact('attribute', 'organizations', 'module'));
    }

    public function update(StoreUpdateAttributeRequest $request, Attribute $attribute)
    {
        if ($this->attributeService->update($attribute, $request->all())) {
            Session::flash('success', trans('labels.update_success'));
        } else {
            Session::flash('error', trans('labels.update_fail'));
        }

        return redirect()->back();
    }
}
