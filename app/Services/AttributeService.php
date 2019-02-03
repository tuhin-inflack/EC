<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 1/16/19
 * Time: 1:15 PM
 */

namespace App\Services;


use App\Repositories\AttributeRepository;
use App\Traits\CrudTrait;

class AttributeService
{
    use CrudTrait;
    /**
     * @var AttributeRepository
     */
    private $attributeRepository;

    /**
     * AttributeService constructor.
     * @param AttributeRepository $attributeRepository
     */
    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
        $this->setActionRepository($attributeRepository);
    }
}