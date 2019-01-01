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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Modules\HM\Emails\BookingRequestMail;
use Modules\HM\Entities\BookingGuestInfo;
use Modules\HM\Entities\BookingRoomInfo;
use Modules\HM\Entities\RoomBooking;
use Modules\HM\Entities\RoomBookingReferee;
use Modules\HM\Entities\RoomBookingRequester;
use Modules\HM\Repositories\BookingGuestInfoRepository;
use Modules\HM\Repositories\RoomBookingRepository;

class BookingRequestService
{
    use CrudTrait;
    /**
     * @var RoomBookingRepository
     */
    private $roomBookingRepository;

    private $bookingGuestInfoRepository;

    /**
     * BookingRequestService constructor.
     * @param RoomBookingRepository $roomBookingRepository
     * @param BookingGuestInfoRepository $bookingGuestInfoRepository
     */
    public function __construct(RoomBookingRepository $roomBookingRepository, BookingGuestInfoRepository $bookingGuestInfoRepository)
    {
        $this->roomBookingRepository = $roomBookingRepository;
        $this->bookingGuestInfoRepository = $bookingGuestInfoRepository;
        $this->setActionRepository($roomBookingRepository);
    }

    public function save(array $data)
    {
        DB::transaction(function () use ($data) {
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

            /*$roomBookingReferee = new RoomBookingReferee([
                'name' => $data['referee_name'],
                'department_id' => $data['referee_dept'],
                'contact' => $data['referee_contact']
            ]);
            $roomBooking->referee()->save($roomBookingReferee);*/

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
            if ($roomBooking && !empty( $data['email'])) {
                Mail::to($data['email'])
//                    ->cc($moreUsers)
//                    ->bcc($evenMoreUsers)
                    ->send(new BookingRequestMail($data));
            }


            return $roomBooking;
        });
    }


    public function update(array $data, RoomBooking $roomBooking)
    {
        DB::transaction(function () use ($data, $roomBooking) {
            $data['start_date'] = Carbon::createFromFormat("j F, Y", $data['start_date']);
            $data['end_date'] = Carbon::createFromFormat("j F, Y", $data['end_date']);
            $data['shortcode'] = $roomBooking->shortcode;
            $data['status'] = 'pending';

            $this->roomBookingRepository->update($roomBooking, $data);

            foreach ($data['roomInfos'] as $value){
                $rateInfo = explode('_', $value['rate']);
                $rateType = $rateInfo[0];
                $rate = $rateInfo[1];
                $roomBooking->roomInfos()->updateOrCreate([
                    'id'   => $value['id'],
                ],[
                    'room_type_id' => $value['room_type_id'],
                    'quantity' => $value['quantity'],
                    'rate_type' => $rateType,
                    'rate' => $rate
                ]);
            }

            return $roomBooking;
        });
    }

    public function getBookingGuestInfo($roomBookingId, $status)
    {
        return $this->bookingGuestInfoRepository->pluckByBookingIdAndStatus($roomBookingId, $status);
    }
}