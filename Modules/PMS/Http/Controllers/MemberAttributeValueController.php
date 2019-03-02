<?php

namespace Modules\PMS\Http\Controllers;

use App\Entities\Attribute;
use App\Entities\Organization\Organization;
use App\Entities\Organization\OrganizationMember;
use Illuminate\Routing\Controller;
use Modules\PMS\Entities\Project;

class MemberAttributeValueController extends Controller
{
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
}
