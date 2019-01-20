<?php
/**
 * Created by PhpStorm.
 * User: bs100
 * Date: 1/15/19
 * Time: 7:36 PM
 */

namespace Modules\PMS\Repositories;


use App\Repositories\AbstractBaseRepository;
use Illuminate\Support\Facades\DB;
use Modules\PMS\Entities\ProjectResearchOrganization;

class ProjectResearchOrgRepository extends AbstractBaseRepository
{
    protected $modelName = ProjectResearchOrganization::class;

}