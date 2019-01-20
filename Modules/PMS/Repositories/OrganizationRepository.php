<?php
/**
 * Created by PhpStorm.
 * User: bs100
 * Date: 1/15/19
 * Time: 6:30 PM
 */

namespace Modules\PMS\Repositories;


use App\Repositories\AbstractBaseRepository;
use Modules\PMS\Entities\Organization;

class OrganizationRepository extends AbstractBaseRepository
{
    protected $modelName = Organization::class;

    public function getOrganizationExceptIds($alreadyAddedIds)
    {
        $organizations = Organization::whereNotIn('id', $alreadyAddedIds)->get()->pluck('name', 'id')->toArray();
        return $organizations;
    }
}