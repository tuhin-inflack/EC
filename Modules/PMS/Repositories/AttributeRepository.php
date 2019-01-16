<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 1/16/19
 * Time: 1:14 PM
 */

namespace Modules\PMS\Repositories;


use App\Repositories\AbstractBaseRepository;
use Modules\PMS\Entities\Attribute;

class AttributeRepository extends AbstractBaseRepository
{
    protected $modelName = Attribute::class;
}