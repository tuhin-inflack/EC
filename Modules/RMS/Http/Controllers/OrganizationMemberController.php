<?php

namespace Modules\RMS\Http\Controllers;


use App\Entities\Organization\Organization;
use App\Entities\Organization\OrganizationMember;
use App\Services\OrganizationMemberService;
use App\Services\OrganizationService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PMS\Http\Requests\StoreUpdateOrgMemberRequest;

class OrganizationMemberController extends Controller
{
    private $organizationService;
    private $organizationMemberService;

    public function __construct(OrganizationService $organizationService, OrganizationMemberService $organizationMemberService)
    {
        $this->organizationService = $organizationService;
        $this->organizationMemberService = $organizationMemberService;
    }

    public function create(Organization $organization)
    {
        return view('rms::project-members.create', compact('organization'));
    }

    public function store(StoreUpdateOrgMemberRequest $request, Organization $organization)
    {
        if ($this->organizationMemberService->save($request->all())) {
            Session::flash('success', trans('labels.save_success'));
        } else {
            Session::flash('error', trans('labels.save_fail'));
        }

        return redirect()->back();
    }

    public function edit(Organization $organization, OrganizationMember $member)
    {
        return view('rms::project-members.edit', compact('organization', 'member'));
    }

    public function update(StoreUpdateOrgMemberRequest $request, Organization $organization, OrganizationMember $member)
    {
        if ($this->organizationMemberService->update($member, $request->all())) {
            Session::flash('success', trans('labels.update_success'));
        } else {
            Session::flash('error', trans('labels.update_fail'));
        }

        return redirect()->back();
    }
}
