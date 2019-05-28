<?php
/**
 * Created by PhpStorm.
 * User: artisan33
 * Date: 5/16/19
 * Time: 4:30 PM
 */
namespace Modules\IMS\Services;

use App\Traits\CrudTrait;
use Closure;
use Illuminate\Support\Facades\DB;
use Modules\IMS\Entities\InventoryLocation;
use Modules\IMS\Repositories\InventoryLocationRepository;

class InventoryLocationService
{
    use CrudTrait;
    /**
     * @var InventoryLocationRepository
     */
    private $locationRepository;

    public function __construct(InventoryLocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
        $this->setActionRepository($locationRepository);
    }

    public function store(array $data)
    {
        $location = $this->locationRepository->save($data);
        return $location;
    }

    public function getAllLocationsExceptDefaults()
    {
        return $this->locationRepository->findBy(['is_default' => false]);
    }

    public function updateLocation(InventoryLocation $location, array $data)
    {
        return DB::transaction(function () use ($location, $data){
            return $location->update($data);
        });
    }

    /**
     * <h3>Locations Dropdown</h3>
     * <p>Custom Implementation of concatenation</p>
     *
     * @param Closure $implementedValue Anonymous Implementation of Value
     * @param Closure $implementedKey Anonymous Implementation Key index
     * @param array|null $query
     * @return array
     */
    public function getLocationsForDropdown(Closure $implementedValue = null, Closure $implementedKey = null, array $query = null)
    {
        $locations = $query ? $this->locationRepository->findBy($query) : $this->locationRepository->findAll();

        $locationOptions = [];

        foreach ($locations as $location) {
            $locationId = $implementedKey ? $implementedKey($location) : $location->id;

            $implementedValue = $implementedValue ? : function($location) {
                return $location->name . ' - ' . $location->departments->name;
            };

            $locationOptions[$locationId] = $implementedValue($location);
        }

        return $locationOptions;
    }
}