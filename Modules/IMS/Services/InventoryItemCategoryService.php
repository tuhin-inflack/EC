<?php
/**
 * Created by PhpStorm.
 * User: artisan33
 * Date: 5/15/19
 * Time: 3:26 PM
 */

namespace Modules\IMS\Services;


use Modules\IMS\Repositories\InventoryItemCategoryRepository;

class InventoryItemCategoryService
{
    /**
     * @var InventoryItemCategoryRepository
     */
    private $inventoryItemCategoryRepository;

    public function __construct(InventoryItemCategoryRepository $inventoryItemCategoryRepository)
    {
        /** @var InventoryItemCategoryRepository $inventoryItemCategoryRepository */
        $this->inventoryItemCategoryRepository = $inventoryItemCategoryRepository;
    }

    public function store(array $data)
    {
        $category = $this->inventoryItemCategoryRepository->save($data);
        return $category;
    }

    public function getAllCategories()
    {
        return $this->inventoryItemCategoryRepository->findAll();
    }
}