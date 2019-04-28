<?php
/**
 * Created by PhpStorm.
 * User: artisan33
 * Date: 4/28/19
 * Time: 11:50 AM
 */

namespace Modules\IMS\Services;


use App\Traits\CrudTrait;
use Illuminate\Support\Facades\DB;
use Modules\IMS\Repositories\WarehouseRepository;

class WarehouseService
{
    use CrudTrait;

    /**
     * @var WarehouseRepository
     */
    private $warehouseRepository;

    public function __construct(WarehouseRepository $warehouseRepository)
    {
        $this->warehouseRepository = $warehouseRepository;
    }

    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {

            $warehouse = $this->warehouseRepository->save($data);

            return $warehouse;
        });
    }

    public function getAllWarehouses()
    {
        return $this->warehouseRepository->findAll();
    }

}