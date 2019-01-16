<?php
/**
 * Created by PhpStorm.
 * User: bs100
 * Date: 1/15/19
 * Time: 6:31 PM
 */

namespace Modules\PMS\Services;


use App\Traits\CrudTrait;
use Modules\PMS\Repositories\OrganizationRepository;

class OrganizationService
{
    use CrudTrait;
    private $organizationRepository;

    public function __construct(OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
        $this->setActionRepository($this->organizationRepository);

    }

    public function getAllOrganization()
    {
        $organizations = $this->organizationRepository->findAll()->pluck( 'name', 'id' )->toArray();
        $organizations['other_organization'] = '+ Add new organization';
        return $organizations;
    }

}