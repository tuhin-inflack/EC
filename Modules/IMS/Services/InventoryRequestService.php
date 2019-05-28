<?php


namespace Modules\IMS\Services;


use App\Traits\CrudTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Modules\IMS\Entities\InventoryRequestDetail;
use Modules\IMS\Repositories\InventoryItemCategoryRepository;
use Modules\IMS\Repositories\InventoryRequestRepository;

class InventoryRequestService
{
    use CrudTrait;
    private $inventoryRequestRepository;
    private $inventoryItemCategoryRepository;

    public function __construct(InventoryRequestRepository $inventoryRequestRepository, InventoryItemCategoryRepository $inventoryItemCategoryRepository)
    {
        $this->inventoryRequestRepository = $inventoryRequestRepository;
        $this->inventoryItemCategoryRepository = $inventoryItemCategoryRepository;
        $this->setActionRepository($inventoryRequestRepository);
    }

    public function store(array $data){
        return DB::transaction(function () use ($data) {

            $data['requester_id'] = Auth::user()->id;

            $inventoryRequest = $this->save($data);

            foreach ($data['category'] as $category) {

                $inventoryRequestDetail = new InventoryRequestDetail([
                    'category_id' => $category['category_id'],
                    'quantity' => $category['quantity'],
                ]);

                $inventoryRequest->details()->save($inventoryRequestDetail);

            }

            if ($data['request_type'] == 'requisition') {

                if (isset($data['new-category'])) {
                    foreach ($data['new-category'] as $newCategory) {

                        // Create New Inventory Item Category
                        $inventoryItemCategory = $this->inventoryItemCategoryRepository->save($newCategory);

                        // Insert Into Inventory Request Details
                        if ($inventoryItemCategory) {
                            $inventoryRequestDetail = new InventoryRequestDetail([
                                'category_id' => $inventoryItemCategory->id,
                                'quantity' => $newCategory['quantity'],
                            ]);

                            $inventoryRequest->details()->save($inventoryRequestDetail);
                        }

                    }
                }

                if (isset($data['bought-category'])) {
                    foreach ($data['bought-category'] as $boughtCategory) {
                        $inventoryRequestDetail = new InventoryRequestDetail([
                            'category_id' => $boughtCategory['category_id'],
                            'quantity' => $boughtCategory['quantity'],
                        ]);

                        $inventoryRequest->details()->save($inventoryRequestDetail);
                    }
                }
            }

            return $inventoryRequest;

        });
    }

    public function prepareViews($type){

        switch ($type){
            case 'requisition':
                return ['category', 'new-category', 'bought-category'];

                break;
            case 'transfer':
                return ['category'];

                break;
            case 'scrap':
                return ['category'];

                break;
            case 'abandon':
                return ['category'];

                break;
            default:
                return [];
                break;
        }
    }
}