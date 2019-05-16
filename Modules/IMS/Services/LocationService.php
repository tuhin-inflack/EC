<?php
/**
 * Created by PhpStorm.
 * User: artisan33
 * Date: 5/16/19
 * Time: 4:30 PM
 */
namespace Modules\IMS\Services;

use Modules\IMS\Repositories\LocationRepository;

class LocationService
{
    /**
     * @var LocationRepository
     */
    private $locationRepository;

    public function __construct(LocationRepository $locationRepository)
    {
        /** @var LocationService $locationRepository */
        $this->locationRepository = $locationRepository;
    }

    public function store(array $data)
    {
        $location = $this->locationRepository->save($data);
        return $location;
    }
}