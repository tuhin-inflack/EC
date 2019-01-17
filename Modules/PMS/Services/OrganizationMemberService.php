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

}