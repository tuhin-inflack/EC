<?php
/**
 * Created by PhpStorm.
 * User: artisan33
 * Date: 5/21/19
 * Time: 12:44 PM
 */

namespace Modules\IMS\Services;

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
}