<?php

namespace Modules\PMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PMS\Services\OrganizationMemberService;
use Modules\PMS\Services\OrganizationService;
use Modules\PMS\Services\ProjectProposalService;


class OrganizationMemberController extends Controller
{

    private $organizationService;
    private $organizationMemberService;

    public function __construct(OrganizationService $organizationService, OrganizationMemberService $organizationMemberService)
    {

        $this->organizationService = $organizationService;
        $this->organizationMemberService = $organizationMemberService;
    }

    public function addOrganizationMember($organizationId)
    {
        $organization = $this->organizationService->findOrganizationById($organizationId);
        return view('pms::project-members.create', compact('organization'));

    }

    public function storeOrganizationMember(Request $request)
    {
        $member = $request->all();
        $response = $this->organizationMemberService->saveOrganizationMember($member);
    }
}
