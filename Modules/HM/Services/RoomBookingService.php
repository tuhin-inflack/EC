<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 12/11/18
 * Time: 3:56 PM
 */

namespace Modules\HM\Services;


use App\Traits\CrudTrait;
use Carbon\Carbon;
use Modules\HM\Entities\BookingGuestInfo;
use Modules\HM\Entities\BookingRoomInfo;
use Modules\HM\Entities\RoomBookingReferee;
use Modules\HM\Entities\RoomBookingRequester;
use Modules\HM\Repositories\RoomBookingRepository;

class RoomBookingService
{
    use CrudTrait;
    /**
     * @var RoomBookingRepository
     */
    private $roomBookingRepository;

    /**
     * RoomBookingService constructor.
     * @param RoomBookingRepository $roomBookingRepository
     */
    public function __construct(RoomBookingRepository $roomBookingRepository)
    {
        $this->roomBookingRepository = $roomBookingRepository;
        $this->setActionRepository($roomBookingRepository);
    }

    public function save(array $data)
    {
        $data['start_date'] = Carbon::createFromFormat("d F, Y", $data['start_date']);
        $data['end_date'] = Carbon::createFromFormat("d F, Y", $data['end_date']);
        $data['status'] = 'pending';
        $roomBooking = $this->roomBookingRepository->save($data);

        $roomBookingRequester = new RoomBookingRequester($data);
        $roomBooking->requester()->save($roomBookingRequester);

        $roomBookingReferee = new RoomBookingReferee([
            'name' => $data['referee_name'],
            'department' => $data['referee_dept'],
            'contact' => $data['referee_contact']
        ]);
        $roomBooking->referee()->save($roomBookingReferee);

        $roomBooking->roomInfos()->saveMany(collect($data['roomInfos'])->map(function ($roomInfo) {
            $rateInfo = explode('_', $roomInfo['rate']);
            $rateType = $rateInfo[0];
            $rate = $rateInfo[1];
            return new BookingRoomInfo([
                'room_type_id' => $roomInfo['room_type_id'],
                'quantity' => $roomInfo['quantity'],
                'rate_type' => $rateType,
                'rate' => $rate
            ]);
        }));

        $roomBooking->guestInfos()->saveMany(collect($data['guests'])->map(function ($guest) {
            $guest['nid_doc'] = 123;
            return new BookingGuestInfo($guest);
        }));

        return $roomBooking;
    }
}