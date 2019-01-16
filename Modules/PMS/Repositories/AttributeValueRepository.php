<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 1/16/19
 * Time: 8:14 PM
 */

namespace Modules\PMS\Repositories;


use App\Repositories\AbstractBaseRepository;
use Modules\PMS\Entities\AttributeValue;

class AttributeValueRepository extends AbstractBaseRepository
{
    protected $modelName = AttributeValue::class;
}