<?php
/**
 * Created by PhpStorm.
 * User: bs130
 * Date: 5/20/19
 * Time: 9:54 AM
 */

namespace Modules\IMS\Services;


use App\Traits\CrudTrait;
use Modules\IMS\Entities\InventoryHistory;
use Modules\IMS\Repositories\InventoryHistoryRepository;
use Modules\IMS\Repositories\InventoryRepository;
use Modules\IMS\Repositories\InventoryRequestRepository;

class InventoryService
{
    use CrudTrait;

    private $inventoryRequestRepository;
    private $inventoryRepository;
    private $inventoryHistoryRepository;

    public function __construct(InventoryRequestRepository $inventoryRequestRepository,
                                InventoryRepository $inventoryRepository,
                                InventoryHistoryRepository $inventoryHistoryRepository)
    {
        $this->inventoryRequestRepository = $inventoryRequestRepository;
        $this->inventoryRepository = $inventoryRepository;
        $this->inventoryHistoryRepository = $inventoryHistoryRepository;

        $this->setActionRepository($inventoryRepository);
    }

    public function fetchInventoryDataFromRequest($reqId)
    {
        $inventoryRequest = $this->inventoryRequestRepository->findOne($reqId);
        if(!is_null($inventoryRequest))
        {
            $data['location_id'] = $inventoryRequest->to_location_id;
            $data['type'] = $inventoryRequest->type;
            $data['status'] = $inventoryRequest->status;
            $data['category_id'] = $inventoryRequest->detail->category_id;
            $data['quantity'] = $inventoryRequest->detail->quantity;
        }
        else
            $data = null;
        return $data;
    }

    public function inventoryChangeOnRequestApproval($reqId)
    {
        $inventoryRequestData = $this->fetchInventoryDataFromRequest($reqId);
        $inventory = $this->findBy(['location_id' => $inventoryRequestData['location_id'], 'category_id' => $inventoryRequestData['category_id']]);
        if(!empty($inventory))
        {
            $savedInventory = $this->saveInventory($reqId);
            $data = $inventoryRequestData;
            $data['inventory_id'] = $savedInventory->id; $data['type'] = 'in';

            $this->saveInventoryHistory($inventoryRequestData);
        }
        else
        {
            $data = $inventoryRequestData;
            $data['quantity'] = ($inventory->quantity - $inventoryRequestData['quantity']);
            $this->updateInventory($inventoryRequestData, $inventory->id);
            $this->saveInventoryHistory($data);
        }
    }

    public function saveInventory($reqId)
    {
        $data = $this->fetchInventoryDataFromRequest($reqId);
        return $this->save($data);
    }

    public function updateInventory($data, $inventoryId)
    {
        $inventory = $this->findOne($inventoryId);
        $inventory->update($data);
    }

    public function saveInventoryHistory($data)
    {
        $this->inventoryHistoryRepository->save($data);
    }
}