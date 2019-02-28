<?php

namespace Modules\PMS\Http\Controllers;


use App\Entities\Organization\Organization;
use App\Entities\Organization\OrganizationMember;
use App\Services\AttributeValueService;
use Illuminate\Routing\Controller;
use Modules\PMS\Entities\Project;


class OrganizationMemberController extends Controller
{
    /**
     * @var AttributeValueService
     */
    private $attributeValueService;

    /**
     * OrganizationMemberController constructor.
     * @param AttributeValueService $attributeValueService
     */
    public function __construct(AttributeValueService $attributeValueService)
    {
        $this->attributeValueService = $attributeValueService;
    }

    public function show(Project $project, Organization $organization, OrganizationMember $member)
    {
        $attributeIds = $project->attributes->pluck('id')->toArray();

        $attributeValues = $this->attributeValueService->getMemberAttributeValues($member->id, $attributeIds);

        return view('pms::organization-member.show', compact(
                'project',
                'organization',
                'member',
                'attributeValues'
            )
        );
    }
}
