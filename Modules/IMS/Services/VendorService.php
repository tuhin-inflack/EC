<?php
/**
 * Created by PhpStorm.
 * User: artisan33
 * Date: 5/21/19
 * Time: 12:44 PM
 */

namespace Modules\IMS\Services;

use Illuminate\Support\Facades\DB;
use Modules\IMS\Entities\Vendor;
use Modules\IMS\Repositories\VendorRepository;

class VendorService
{
    /**
     * @var VendorRepository
     */
    private $vendorRepository;

    public function __construct(VendorRepository $vendorRepository)
    {
        /** @var VendorRepository $vendorRepository */
        $this->vendorRepository = $vendorRepository;
    }

    public function store(array $data)
    {
        $vendor = $this->vendorRepository->save($data);
        return $vendor;
    }

    public function getAllVendors()
    {
        return $this->vendorRepository->findAll();
    }

    public function updateVendor(Vendor $vendor, array $data)
    {
        return DB::transaction(function () use ($vendor, $data){
            return $vendor->update($data);
        });
    }
}