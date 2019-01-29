<?php

namespace App\Services;


use App\Repositories\Organization\OrganizationMemberRepository;
use App\Traits\CrudTrait;
use Illuminate\Http\Response;

class OrganizationMemberService
{
    use CrudTrait;

    private $organizationMemberRepository;

    public function __construct(OrganizationMemberRepository $organizationMemberRepository)
    {
        $this->organizationMemberRepository = $organizationMemberRepository;
        $this->setActionRepository($this->organizationMemberRepository);
    }

    public function store(array $data)
    {

    }

    public function saveOrganizationMember($member)
    {
        $status = $this->organizationMemberRepository->save($member);
        if ($status)
            return new Response(trans('labels.save_success'));
    }

    public function findMemberById($memberId)
    {
        $member = $this->findOne($memberId);
        if (is_null($member)) {
            abort(404);
        } else {
            return $member;
        }

    }

    public function updateOrganizationMember($memberData, $memberId)
    {
        $member = $this->findOne($memberId);
        $status = $member->update($memberData);
        if ($status)
            return new Response(trans('labels.update_success'));
    }

}