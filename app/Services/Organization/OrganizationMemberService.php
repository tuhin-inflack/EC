<?php

namespace App\Services;


use App\Repositories\Organization\OrganizationMemberRepository;
use App\Traits\CrudTrait;

class OrganizationMemberService
{
    use CrudTrait;

    private $organizationMemberRepository;

    public function __construct(OrganizationMemberRepository $organizationMemberRepository)
    {
        $this->organizationMemberRepository = $organizationMemberRepository;
        $this->setActionRepository($this->organizationMemberRepository);
    }
}