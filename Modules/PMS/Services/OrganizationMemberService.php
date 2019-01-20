<?php
/**
 * Created by PhpStorm.
 * User: bs100
 * Date: 1/17/19
 * Time: 5:15 PM
 */

namespace Modules\PMS\Services;


use App\Traits\CrudTrait;
use Modules\PMS\Repositories\OrganizationMemberRepository;
use Nexmo\Response;

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
        $this->organizationMemberRepository->save($member);
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