<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 10/11/18
 * Time: 6:43 PM
 */

namespace Modules\HM\Services;


use Modules\HM\Entities\Hostel;
use Modules\HM\Entities\RoomType;
use Modules\HM\Repositories\HostelRepository;

class HostelService
{
    private $hostelRepository;

    /**
     * HostelService constructor.
     * @param HostelRepository $hostelRepository
     */
    public function __construct(HostelRepository $hostelRepository)
    {
        $this->hostelRepository = $hostelRepository;
    }

    public function getAll()
    {
        return $this->hostelRepository->findAll();
    }

    public function store(array $data)
    {
//        $roomTypesCollection = collect($data['room_types']);
//        $roomTypes = $roomTypesCollection->map(function ($roomType) {
//            return new RoomType($roomType);
//        });

        $hostel = $this->hostelRepository->save($data);
//        $hostel->roomTypes()->saveMany($roomTypes);

        return $hostel;
    }

    public function update(Hostel $hostel, array $data)
    {
        $roomTypeCollection = collect($data['room_types']);
        $roomTypeCollection->map(function ($roomType) use ($hostel) {
            $hostel->roomTypes()
                ->updateOrCreate(['id' => $roomType['id']],
                    array_merge($roomType, ['hostel_id' => $hostel->id]));
        });

        return $this->hostelRepository->update($hostel, $data);
    }

    public function delete(Hostel $hostel)
    {
        return $this->hostelRepository->delete($hostel);
    }
}
