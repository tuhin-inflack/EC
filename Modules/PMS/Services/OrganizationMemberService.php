<?php

namespace Modules\PMS\Services;


use App\Traits\CrudTrait;
use Modules\PMS\Repositories\OrganizationMemberRepository;

class OrganizationMemberService
{
    use CrudTrait;

    private $organizationMemberRepository;

    public function __construct(OrganizationMemberRepository $organizationMemberRepository)
    {
        $this->organizationMemberRepository = $organizationMemberRepository;
        $this->setActionRepository($this->organizationMemberRepository);
    }

    public function saveOrganizationMember($member)
    {
        $status = $this->organizationMemberRepository->save($member);
        if ($status)
            return Response('successfully updated');
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
            return Response('successfully updated');
    }

}