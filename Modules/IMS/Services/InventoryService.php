<?php
/**
 * Created by PhpStorm.
 * User: bs130
 * Date: 5/20/19
 * Time: 9:54 AM
 */

namespace Modules\IMS\Services;


use App\Traits\CrudTrait;
use Modules\IMS\Repositories\InventoryRepository;
use Modules\IMS\Repositories\InventoryRequestRepository;

class InventoryService
{
    use CrudTrait;

    private $inventoryRequestRepository;
    private $inventoryRepository;

    public function __construct(InventoryRequestRepository $inventoryRequestRepository, InventoryRepository $inventoryRepository)
    {
        $this->inventoryRequestRepository = $inventoryRequestRepository;
        $this->inventoryRepository = $inventoryRepository;

        $this->setActionRepository($inventoryRepository);
    }

    public function fetchInventoryDataFromRequest($reqId)
    {
        $inventoryRequest = $this->inventoryRequestRepository->findOne($reqId);
        if(!is_null($inventoryRequest))
        {
            $data['location_id'] = $inventoryRequest->to_location_id;
            $data['category_id'] = $inventoryRequest->detail->category_id;
            $data['quantity'] = $inventoryRequest->detail->quantity;
        }
        else
            $data = null;
        return $data;
    }

    public function saveInventory($reqId)
    {
        $data = $this->fetchInventoryDataFromRequest($reqId);
        $this->save($data);
    }

}