<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 1/16/19
 * Time: 1:15 PM
 */

namespace Modules\PMS\Services;


use App\Traits\CrudTrait;
use Modules\PMS\Repositories\AttributeRepository;

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