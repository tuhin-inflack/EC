<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 1/16/19
 * Time: 1:14 PM
 */

namespace App\Repositories;


use App\Entities\Attribute;

class AttributeRepository extends AbstractBaseRepository
{
    protected $modelName = Attribute::class;
}