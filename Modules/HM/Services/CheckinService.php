<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 12/31/18
 * Time: 6:17 PM
 */

namespace Modules\HM\Services;


use App\Traits\CrudTrait;
use Illuminate\Support\Facades\DB;
use Modules\HM\Repositories\BookingGuestInfoRepository;
use Modules\HM\Repositories\CheckinRepository;

class CheckinService
{
    use CrudTrait;
    private $checkinRepository;
    private $roomService;
    private $bookingGuestInfoRepository;

    /**
     * CheckinService constructor.
     * @param CheckinRepository $checkinRepository
     * @param RoomService $roomService
     * @param BookingGuestInfoRepository $bookingGuestInfoRepository
     */
    public function __construct(CheckinRepository $checkinRepository, RoomService $roomService, BookingGuestInfoRepository $bookingGuestInfoRepository)
    {
        $this->checkinRepository = $checkinRepository;
        $this->roomService = $roomService;
        $this->bookingGuestInfoRepository = $bookingGuestInfoRepository;
        $this->setActionRepository($this->checkinRepository);
    }

    public function store($data) {
        DB::transaction(function () use ($data) {
            $this->save($data);
            $room = $this->roomService->findOne($data['room_id']);
            $room->update(['status'=>$this->getRoomStatus($room)]);
            $guestInfo = $this->bookingGuestInfoRepository->findOne($data['booking_guest_info_id']);
            $guestInfo->update(['status'=>'checkin']);

        });
    }

    private function getRoomStatus($room)
    {
        $currentCheckin = $this->checkinRepository->countByRoom($room->id);
        $capacity = $room->roomType->capacity;

        if ($currentCheckin >= $capacity) {
            return 'unavailable';
        } else {
            return 'partially-available';
        }
    }
}