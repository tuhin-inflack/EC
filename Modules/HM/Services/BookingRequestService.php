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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Modules\HM\Emails\BookingRequestMail;
use Modules\HM\Entities\BookingCheckin;
use Modules\HM\Entities\BookingGuestInfo;
use Modules\HM\Entities\BookingRoomInfo;
use Modules\HM\Entities\CheckinRoom;
use Modules\HM\Entities\Room;
use Modules\HM\Entities\RoomBooking;
use Modules\HM\Entities\RoomBookingRequester;
use Modules\HM\Repositories\BookingGuestInfoRepository;
use Modules\HM\Repositories\RoomBookingRepository;
use Modules\HM\Repositories\RoomBookingRequesterRepository;

class BookingRequestService
{
    use CrudTrait;
    /**
     * @var RoomBookingRepository
     */
    private $roomBookingRepository;

    private $bookingGuestInfoRepository;
    private $roomBookingRequesterRepository;
    private $roomService;

    /**
     * BookingRequestService constructor.
     * @param RoomBookingRepository $roomBookingRepository
     * @param BookingGuestInfoRepository $bookingGuestInfoRepository
     * @param RoomBookingRequesterRepository $roomBookingRequesterRepository
     */
    public function __construct(RoomBookingRepository $roomBookingRepository, BookingGuestInfoRepository $bookingGuestInfoRepository,
                                RoomBookingRequesterRepository $roomBookingRequesterRepository, RoomService $roomService)
    {
        $this->roomBookingRepository = $roomBookingRepository;
        $this->bookingGuestInfoRepository = $bookingGuestInfoRepository;
        $this->roomBookingRequesterRepository = $roomBookingRequesterRepository;
        $this->roomService = $roomService;
        $this->setActionRepository($roomBookingRepository);
    }

    public function store(array $data, $type = 'booking')
    {
        return DB::transaction(function () use ($data, $type) {
            $data['start_date'] = Carbon::createFromFormat("j F, Y", $data['start_date']);
            $data['end_date'] = Carbon::createFromFormat("j F, Y", $data['end_date']);
            $data['shortcode'] = time();
            $data['status'] = $this->getStatus($type);
            $data['type'] = $type;

            $roomBooking = $this->save($data);

            $this->saveRequesterInfo($data, $roomBooking);

            $this->saveRoomInfos($roomBooking, $data);

            $this->saveGuestInfos($data, $roomBooking);

            if ($type == 'checkin' && isset($data['booking_id'])) {
                BookingCheckin::create(['checkin_id' => $roomBooking->id, 'booking_id' => (int)$data['booking_id']]);
            }
            if ($type == 'checkin' && isset($data['room_numbers'])) {
                $this->saveRoomNumbers($roomBooking, $data['room_numbers']);
            }
            if ($roomBooking && !empty($data['email'])) {
                Mail::to($data['email'])
                    ->send(new BookingRequestMail($roomBooking));
            }
            return $roomBooking;
        });
    }

    private function saveRoomNumbers($checkin, $rooms)
    {
        $roomArr = explode(',', $rooms);
        foreach ($roomArr as $room) {
            CheckinRoom::create([
                'checkin_id' => $checkin->id, 'room_id' => $room
            ]);
            $room = $this->roomService->findOne($room);
            $room->update(['status' => 'unavailable']);
        }
    }

    /**
     * @param $data
     * @param $roomBooking
     */
    private function saveRequesterInfo($data, $roomBooking): void
    {
        $roomBookingRequester = new RoomBookingRequester($data);

        $photoPath = array_key_exists('photo', $data) ? $data['photo']->store('booking-requests/' . $roomBooking->shortcode . '/requester') : null;
        $nidDocPath = array_key_exists('nid_doc', $data) ? $data['nid_doc']->store('booking-requests/' . $roomBooking->shortcode . '/requester') : null;
        $passportDocPath = array_key_exists('passport_doc', $data) ? $data['passport_doc']->store('booking-requests/' . $roomBooking->shortcode . '/requester') : null;

        $roomBookingRequester->photo = $photoPath;
        $roomBookingRequester->nid_doc = $nidDocPath;
        $roomBookingRequester->passport_doc = $passportDocPath;

        $roomBooking->requester()->save($roomBookingRequester);
    }

    /**
     * @param $roomBooking
     * @param $data
     */
    private function saveRoomInfos($roomBooking, $data): void
    {
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
    }

    /**
     * @param $data
     * @param $roomBooking
     */
    private function saveGuestInfos($data, $roomBooking): void
    {
        if (array_key_exists('guests', $data)) {
            $roomBooking->guestInfos()->saveMany(collect($data['guests'])->map(function ($guest) use ($roomBooking) {
                $guest['nid_doc'] = array_key_exists('nid_doc', $guest) ? $guest['nid_doc']->store('booking-requests/' . $roomBooking->shortcode . '/guests') : null;
                return new BookingGuestInfo($guest);
            }));
        }
    }

    public function updateRequest(array $data, RoomBooking $roomBooking)
    {
        DB::transaction(function () use ($data, $roomBooking) {
            $data['start_date'] = Carbon::createFromFormat("j F, Y", $data['start_date']);
            $data['end_date'] = Carbon::createFromFormat("j F, Y", $data['end_date']);
            $data['shortcode'] = $roomBooking->shortcode;
            $data['status'] = 'pending';

            $this->update($roomBooking, $data);

            foreach ($data['roomInfos'] as $value) {
                $rateInfo = explode('_', $value['rate']);
                $rateType = $rateInfo[0];
                $rate = $rateInfo[1];
                $roomBooking->roomInfos()->updateOrCreate([
                    'id' => $value['id'],
                ], [
                    'room_type_id' => $value['room_type_id'],
                    'quantity' => $value['quantity'],
                    'rate_type' => $rateType,
                    'rate' => $rate
                ]);
            }


            if (isset($data['deleted-roominfos'])) {
                BookingRoomInfo::destroy($data['deleted-roominfos']);
            }


            if (array_key_exists('photo', $data)) {
                Storage::delete($roomBooking->requester->photo);
                $photoPath = array_key_exists('photo', $data) ? $data['photo']->store('booking-requests/' . $roomBooking->shortcode . '/requester') : null;
                $data['photo'] = $photoPath;
            }

            if (array_key_exists('nid_doc', $data)) {
                Storage::delete($roomBooking->requester->nid_doc);
                $nidDocPath = array_key_exists('nid_doc', $data) ? $data['nid_doc']->store('booking-requests/' . $roomBooking->shortcode . '/requester') : null;
                $data['nid_doc'] = $nidDocPath;
            }

            if (array_key_exists('passport_doc', $data)) {
                Storage::delete($roomBooking->requester->passport_doc);
                $passportDocPath = array_key_exists('passport_doc', $data) ? $data['passport_doc']->store('booking-requests/' . $roomBooking->shortcode . '/requester') : null;
                $data['passport_doc'] = $passportDocPath;
            }


            $roomBooking->requester->update($data);

            if (array_key_exists('guests', $data)) {
                foreach ($data['guests'] as $value) {
                    if (array_key_exists('nid_doc', $value)) {
                        $guest = $roomBooking->guestInfos()->find($value['id']);
                        if ($guest->nid_doc) {
                            Storage::delete($guest->nid_doc);
                        }
                        $value['nid_doc'] = $value['nid_doc']->store('booking-requests/' . $roomBooking->shortcode . '/guests');
                    }
                    $roomBooking->guestInfos()->updateOrCreate([
                        'id' => $value['id'],
                    ], $value);
                }
            } else {
                $roomBooking->guestInfos()->delete();
            }

            return $roomBooking;
        });
    }

    public function getStatus($type)
    {
        switch ($type) {
            case 'booking':
                return 'pending';
            case 'checkin':
                return 'approved';
            default:
                return 'pending';
        }
    }

    public function getBookingGuestInfo($roomBookingId, $status)
    {
        return $this->bookingGuestInfoRepository->pluckByBookingIdAndStatus($roomBookingId, $status);
    }

    public function pluckContactBookingIdForApprovedBooking()
    {
        return $this->roomBookingRequesterRepository->pluckContactBookingId();
    }

    public function pluckTrainingTitleBookingIdForApprovedBooking()
    {
        return $this->roomBookingRepository->pluckTrainingTitleBookingId();
    }

    public function updateStatus(RoomBooking $roomBooking, array $data)
    {
        $collectionOfBookedRooms = collect();

        $oldRoomBookings = RoomBooking::whereDate('end_date', '>', $roomBooking->start_date)
            ->join('booking_checkin', 'booking_checkin.booking_id', '!=', 'room_bookings.id')
            ->select('room_bookings.*')
            ->get();

        $oldRoomBookings->each(function ($booking) use ($collectionOfBookedRooms) {
            if ($booking->type == 'checkin') {
                $booking->rooms->each(function ($checkedinRoom) use ($collectionOfBookedRooms) {
                    $collectionOfBookedRooms->push(['room_type_id' => $checkedinRoom->room->room_type_id, 'quantity' => 1]);
                });
            } else {
                $booking->roomInfos->each(function ($roomInfo) use ($collectionOfBookedRooms) {
                    $collectionOfBookedRooms->push($roomInfo);
                });
            }
        });

        $sumOfBookedRoomTypes = $collectionOfBookedRooms->groupBy('room_type_id')->map(function ($roomInfos) {
            return $roomInfos->sum('quantity');
        });

        $rooms = Room::all();
        $totalRoomsByRoomType = $rooms->groupBy('room_type_id')->map(function ($rooms) {
            return $rooms->count();
        });

        $requestedRoomsByRoomTypes = $roomBooking->roomInfos->groupBy('room_type_id')->map(function ($roomInfos) {
            return $roomInfos->sum('quantity');
        });

        foreach ($requestedRoomsByRoomTypes as $roomTypeId => $quantity) {
            if (array_key_exists($roomTypeId, $sumOfBookedRoomTypes)) {
                $availableRooms = $totalRoomsByRoomType[$roomTypeId] - $sumOfBookedRoomTypes[$roomTypeId];
            } else {
                $availableRooms = $totalRoomsByRoomType[$roomTypeId];
            }
        }
        dd('test');
        return $this->update($roomBooking, $data);
    }
}
