<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 1/16/19
 * Time: 8:15 PM
 */

namespace Modules\PMS\Services;


use App\Traits\CrudTrait;
use Carbon\Carbon;
use Modules\PMS\Repositories\AttributeValueRepository;

class AttributeValueService
{
    use CrudTrait;
    /**
     * @var AttributeValueRepository
     */
    private $attributeValueRepository;

    /**
     * AttributeValueService constructor.
     * @param AttributeValueRepository $attributeValueRepository
     */
    public function __construct(AttributeValueRepository $attributeValueRepository)
    {
        $this->attributeValueRepository = $attributeValueRepository;
        $this->setActionRepository($attributeValueRepository);
    }

    public function store(array $data)
    {
        $data['date'] = Carbon::createFromFormat('F Y', $data['date']);
        return $this->save($data);
    }
}