<?php


namespace Modules\IMS\Services;


use App\Traits\CrudTrait;
use Modules\IMS\Repositories\InventoryRequestRepository;

class InventoryRequestService
{
    use CrudTrait;
    private $inventoryRequestRepository;

    public function __construct(InventoryRequestRepository $inventoryRequestRepository)
    {
        $this->inventoryRequestRepository = $inventoryRequestRepository;
        $this->setActionRepository($inventoryRequestRepository);
    }
}