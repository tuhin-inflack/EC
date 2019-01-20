<?php
/**
 * Created by PhpStorm.
 * User: bs100
 * Date: 1/17/19
 * Time: 5:14 PM
 */

namespace Modules\PMS\Repositories;


use App\Repositories\AbstractBaseRepository;
use Modules\PMS\Entities\OrganizationMember;

class OrganizationMemberRepository extends AbstractBaseRepository
{

    protected $modelName = OrganizationMember::class;
}