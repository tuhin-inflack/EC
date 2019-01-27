<?php

namespace Modules\RMS\Http\Controllers;


use App\Services\OrganizationMemberService;
use App\Services\OrganizationService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Http\Requests\StoreUpdateOrgMemberRequest;
//use Modules\PMS\Services\OrganizationMemberService;
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
        return view('rms::project-members.create', compact('organization'));

    }

    public function storeOrganizationMember(StoreUpdateOrgMemberRequest $request)
    {

        $response = $this->organizationMemberService->saveOrganizationMember($request->all(), $request->file('nid'));
        Session::flash('success', $response->getContent());
        return redirect()->route('member.add-org-member', $request->organization_id);
    }

    public function editOrganizationMember($memberId)
    {
        $member = $this->organizationMemberService->findMemberById($memberId);
        $organization = $member->organization;
        return view('rms::project-members.edit', compact('member', 'organization'));

    }

    public function UpdateOrganizationMember(StoreUpdateOrgMemberRequest $request, $memberId)
    {
        $response = $this->organizationMemberService->updateOrganizationMember($request->all(), $memberId);
        Session::flash('success', $response->getContent());
        $organizationId = $this->organizationMemberService->findMemberById($memberId)->organization->id;
        return redirect()->route('member.add-org-member', $organizationId);

    }
}
