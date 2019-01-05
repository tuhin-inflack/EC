<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 12/31/18
 * Time: 6:17 PM
 */

namespace Modules\HM\Services;


use App\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\HM\Repositories\BookingGuestInfoRepository;
use Modules\HM\Repositories\CheckinRepository;
use Modules\HM\Repositories\RoomBookingRepository;

class CheckinService
{
    use CrudTrait;
    private $checkinRepository;
    private $roomService;
    private $bookingGuestInfoRepository;
    /**
     * @var RoomBookingRepository
     */
    private $roomBookingRepository;

    /**
     * CheckinService constructor.
     * @param CheckinRepository $checkinRepository
     * @param RoomService $roomService
     * @param BookingGuestInfoRepository $bookingGuestInfoRepository
     * @param RoomBookingRepository $roomBookingRepository
     */
    public function __construct(
        CheckinRepository $checkinRepository,
        RoomService $roomService,
        BookingGuestInfoRepository $bookingGuestInfoRepository,
        RoomBookingRepository $roomBookingRepository
    )
    {
        $this->checkinRepository = $checkinRepository;
        $this->roomService = $roomService;
        $this->bookingGuestInfoRepository = $bookingGuestInfoRepository;
        $this->setActionRepository($this->checkinRepository);
        $this->roomBookingRepository = $roomBookingRepository;
    }

    public function store($data)
    {
        DB::transaction(function () use ($data) {
            $this->save($data);
            //$room = $this->roomService->findOne($data['room_id']);
            //$room->update(['status' => $this->getRoomStatus($room)]);
            $guestInfo = $this->bookingGuestInfoRepository->findOne($data['booking_guest_info_id']);
            $guestInfo->update(['status' => 'checkin']);
        });
    }

    public function checkout(Model $checkin)
    {
        $checkoutTime = Carbon::now();
        $this->roomBookingRepository->update($checkin, ['actual_end_date' => $checkoutTime]);

        $checkin->checkinDetails->each(function ($checkinDetail) {
           $checkinDetail->room()->update(['status' => 'available']);
        });
        $checkin->rooms()->update(['status' => 'checkedout', 'checkout_date' => $checkoutTime]);
        $checkin->checkinDetails()->update(['checkout_date' => $checkoutTime]);

        return $checkin->checkinDetails;
    }

    private function getRoomStatus($room)
    {
        $currentCheckin = $this->checkinRepository->countByRoom($room->id);
        $capacity = $room->roomType->capacity;

        if ($currentCheckin == 0) {
            return 'available';
        } else if ($currentCheckin >= $capacity) {
            return 'unavailable';
        } else {
            return 'partially-available';
        }
    }
}
