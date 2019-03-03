<?php

namespace Modules\PMS\Http\Controllers;

use App\Entities\Attribute;
use App\Entities\Organization\Organization;
use App\Entities\Organization\OrganizationMember;
use App\Services\AttributeValueService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Entities\Project;
use Modules\PMS\Http\Requests\StoreAttributeValueRequest;

class MemberAttributeValueController extends Controller
{
    /**
     * @var AttributeValueService
     */
    private $attributeValueService;

    /**
     * MemberAttributeValueController constructor.
     * @param AttributeValueService $attributeValueService
     */
    public function __construct(AttributeValueService $attributeValueService)
    {
        $this->attributeValueService = $attributeValueService;
    }

    public function create(
        Project $project,
        Organization $organization,
        OrganizationMember $member,
        Attribute $attribute
    )
    {
        $pageType = 'create';
        return view('attribute-value.create', compact(
                'project',
                'organization',
                'member',
                'attribute',
                'pageType'
            )
        );
    }

    public function store(
        StoreAttributeValueRequest $request,
        Project $project,
        Organization $organization,
        OrganizationMember $member,
        Attribute $attribute
    )
    {
        $requestData = array_merge($request->all(), ['organization_member_id' => $member->id]);
        if ($this->attributeValueService->store($requestData)) {
            Session::flash('success', trans('labels.save_success'));
        } else {
            Session::flash('error', trans('labels.save_fail'));
        }

        return redirect()->route('member-attributes.show', [$project->id, $organization->id, $member->id, $attribute->id]);
    }
}
