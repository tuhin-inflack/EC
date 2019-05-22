<?php
/**
 * Created by PhpStorm.
 * User: artisan33
 * Date: 5/16/19
 * Time: 4:30 PM
 */
namespace Modules\IMS\Services;

use Illuminate\Support\Facades\DB;
use Modules\IMS\Entities\Location;
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

    public function getAllLocations()
    {
        return $this->locationRepository->findAll();
    }

    public function updateLocation(Location $location, array $data)
    {
        return DB::transaction(function () use ($location, $data){
            return $location->update($data);
        });
    }
}