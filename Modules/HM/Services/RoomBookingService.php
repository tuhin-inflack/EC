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
        $data['start_date'] = Carbon::createFromFormat("j F, Y", $data['start_date']);
        $data['end_date'] = Carbon::createFromFormat("j F, Y", $data['end_date']);
        $data['shortcode'] = time();
        $data['status'] = 'pending';

        $roomBooking = $this->roomBookingRepository->save($data);

        $roomBookingRequester = new RoomBookingRequester($data);

        $photoPath = $data['photo']->store('booking-requests/' . $roomBooking->shortcode . '/requester');
        $nidDocPath = array_key_exists('nid_doc', $data) ? $data['nid_doc']->store('booking-requests/' . $roomBooking->shortcode . '/requester') : null;
        $passportDocPath = array_key_exists('passport_doc', $data) ? $data['passport_doc']->store('booking-requests/' . $roomBooking->shortcode . '/requester') : null;

        $roomBookingRequester->photo = $photoPath;
        $roomBookingRequester->nid_doc = $nidDocPath;
        $roomBookingRequester->passport_doc = $passportDocPath;

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

        if (array_key_exists('guests', $data)) {
            $roomBooking->guestInfos()->saveMany(collect($data['guests'])->map(function ($guest) use ($roomBooking) {
                $guest['nid_doc'] = array_key_exists('nid_doc', $guest) ? $guest['nid_doc']->store('booking-requests/' . $roomBooking->shortcode . '/guests') : null;
                return new BookingGuestInfo($guest);
            }));
        }

        return $roomBooking;
    }
}