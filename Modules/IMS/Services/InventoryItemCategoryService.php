<?php
/**
 * Created by PhpStorm.
 * User: artisan33
 * Date: 5/15/19
 * Time: 3:26 PM
 */

namespace Modules\IMS\Services;


use App\Traits\CrudTrait;
use Closure;
use Illuminate\Support\Facades\Auth;
use Modules\IMS\Entities\Inventory;
use Modules\IMS\Entities\InventoryItemCategory;
use Modules\IMS\Repositories\InventoryItemCategoryRepository;

class InventoryItemCategoryService
{
    use CrudTrait;
    /**
     * @var InventoryItemCategoryRepository
     */
    private $inventoryItemCategoryRepository;

    public function __construct(InventoryItemCategoryRepository $inventoryItemCategoryRepository)
    {
        /** @var InventoryItemCategoryRepository $inventoryItemCategoryRepository */
        $this->inventoryItemCategoryRepository = $inventoryItemCategoryRepository;
        $this->setActionRepository($inventoryItemCategoryRepository);
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

    public function updateInventoryItemCategory(InventoryItemCategory $inventoryItemCategory, array $data)
    {
        return $inventoryItemCategory->update($data);
    }

    /**
     * <h3>Inventory Item Category Dropdown</h3>
     * <p>Custom Implementation of concatenation</p>
     *
     * @param Closure $implementedValue Anonymous Implementation of Value
     * @param Closure $implementedKey Anonymous Implementation Key index
     * @param array|null $query
     * @return array
     */
    public function getItemCategoryForDropdown(Closure $implementedValue = null, Closure $implementedKey = null, array $query = null)
    {
        $inventoryItemCategories = $query ? $this->inventoryItemCategoryRepository->findBy($query) : $this->inventoryItemCategoryRepository->findAll();

        $inventoryItemCategoryOptions = [];

        foreach ($inventoryItemCategories as $inventoryItemCategory) {
            $inventoryItemCategoryId = $implementedKey ? $implementedKey($inventoryItemCategory) : $inventoryItemCategory->id;

            $implementedValue = $implementedValue ? : function($inventoryItemCategory) {
                return $inventoryItemCategory->name .' ';
            };

            $inventoryItemCategoryOptions[$inventoryItemCategoryId] = $implementedValue($inventoryItemCategory);
        }

        return $inventoryItemCategoryOptions;
    }

    public function getDepartmentalItemCategories()
    {
        $employeeDepartment = Auth::user()->employee->employeeDepartment;
        $locationIds = $employeeDepartment->inventoryLocations->pluck('id');

        $inventories = Inventory::whereIn('location_id', $locationIds)->get();
        $categoryIds = $inventories->pluck('inventory_item_category_id');
        return $itemCategories = InventoryItemCategory::whereIn('id', $categoryIds)->get();
    }
}