<?php
/**
 * Created by PhpStorm.
 * User: siaminflack
 * Date: 12/11/18
 * Time: 3:56 PM
 */

namespace Modules\HM\Services;


use App\Services\RoleService;
use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Modules\HM\Emails\BookingRequestMail;
use Modules\HM\Entities\BookingCheckin;
use Modules\HM\Entities\BookingGuestInfo;
use Modules\HM\Entities\BookingRoomInfo;
use Modules\HM\Entities\CheckinRoom;
use Modules\HM\Entities\RoomBooking;
use Modules\HM\Entities\RoomBookingRequester;
use Modules\HM\Repositories\BookingGuestInfoRepository;
use Modules\HM\Repositories\BookingRequestForwardRepository;
use Modules\HM\Repositories\RoomBookingRepository;
use Modules\HM\Repositories\RoomBookingRequesterRepository;

class BookingRequestService
{
    use CrudTrait;
    use FileTrait;
    /**
     * @var RoomBookingRepository
     */
    private $roomBookingRepository;

    private $bookingGuestInfoRepository;
    private $roomBookingRequesterRepository;
    private $bookingRequesteForwardRepository;
    private $roomService;
    private $roleService;
    /**
     * @var RoomTypeService
     */
    private $roomTypeService;

    /**
     * BookingRequestService constructor.
     * @param RoomBookingRepository $roomBookingRepository
     * @param BookingGuestInfoRepository $bookingGuestInfoRepository
     * @param RoomBookingRequesterRepository $roomBookingRequesterRepository
     * @param BookingRequestForwardRepository $bookingRequesteForwardRepository
     * @param RoomTypeService $roomTypeService
     * @param RoomService $roomService
     */
    public function __construct(
        RoomBookingRepository $roomBookingRepository,
        BookingGuestInfoRepository $bookingGuestInfoRepository,
        RoomBookingRequesterRepository $roomBookingRequesterRepository,
        BookingRequestForwardRepository $bookingRequesteForwardRepository,
        RoomTypeService $roomTypeService,
        RoomService $roomService,
        RoleService $roleService
    )
    {
        $this->roomBookingRepository = $roomBookingRepository;
        $this->bookingGuestInfoRepository = $bookingGuestInfoRepository;
        $this->roomBookingRequesterRepository = $roomBookingRequesterRepository;
        $this->bookingRequesteForwardRepository = $bookingRequesteForwardRepository;
        $this->roomTypeService = $roomTypeService;
        $this->roomService = $roomService;
        $this->roleService = $roleService;
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
                Mail::to($data['email'])->send(new BookingRequestMail($roomBooking));
                $usersForEmailNotification = $this->roleService->getUserEmailByRoles();
                foreach ($usersForEmailNotification as $email) {
                    Mail::to($email)->send(new BookingRequestMail($roomBooking));
                }
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

        list($photoPath, $nidDocPath, $passportDocPath) = $this->storeRequesterFiles($data);

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
        /*$photoPath = array_key_exists('photo', $data) ? $this->upload($data['photo'], 'booking-requests') : null;*/
        if (array_key_exists('guests', $data)) {
            $roomBooking->guestInfos()->saveMany(
                collect($data['guests'])->map(function ($guest) use ($roomBooking) {
                    $guest['nid_doc'] = array_key_exists('nid_doc', $guest) ? $this->upload($guest['nid_doc'], 'booking-requests') : null;
                    return new BookingGuestInfo($guest);
                })
            );
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

            $this->removeOldFileAttachments(
                ['photo', 'nid_doc', 'passport_doc'],
                $data,
                $roomBooking->requester->toArray()
            );

            list($data['photo'], $data['nid_doc'], $data['passport_doc']) = $this->storeRequesterFiles($data);

            $roomBooking->requester->update($data);

            $this->updateGuestInfo($roomBooking, $data);

            return $roomBooking;
        });
    }

    private function removeOldFileAttachments(array $keys, array $requestData, array $bookingRequester)
    {
        foreach ($keys as $key) {
            if (array_key_exists($key, $requestData) && $bookingRequester[$key]) {
                $this->deleteFile($bookingRequester[$key]);
            }
        }
    }

    private function updateGuestInfo($roomBooking, $data): void
    {
        if (array_key_exists('guests', $data)) {

            $allGuestIds = $roomBooking->guestInfos->pluck("id")->toArray();

            foreach ($data['guests'] as $value) {
                if ($value['id']) {
                    // TODO: update old users
                    if (($key = array_search($value['id'], $allGuestIds)) !== false)
                        unset($allGuestIds[$key]);

                    if (array_key_exists('nid_doc', $value)) {
                        $guest = $roomBooking->guestInfos()->find($value['id']);

                        if ($guest->nid_doc)
                            Storage::delete($guest->nid_doc);

                        $value['nid_doc'] = $value['nid_doc']->store('booking-requests/' . $roomBooking->shortcode . '/guests');
                    }

                    $roomBooking->guestInfos()->updateOrCreate([
                        'id' => $value['id'],
                    ], $value);

                } else {
                    // TODO : add new users
                    $value['nid_doc'] = array_key_exists('nid_doc', $value) ? $value['nid_doc']->store('booking-requests/' . $roomBooking->shortcode . '/guests') : null;
                    $roomBooking->guestInfos()->create($value);
                }
            }

            $this->deleteGuestWithNidDocStorage($roomBooking->guestInfos()->find($allGuestIds));
        } else {
            $this->deleteGuestWithNidDocStorage($roomBooking->guestInfos);
        }
    }

    /**
     * @param $guests
     */
    private function deleteGuestWithNidDocStorage($guests): void
    {
        foreach ($guests as $guest) {

            if ($guest->nid_doc)
                Storage::delete($guest->nid_doc);

            $guest->delete();
        }
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
        return $this->update($roomBooking, $data);
    }

    public function forwardBookingRequest(RoomBooking $roomBooking, array $data)
    {
        return $this->bookingRequesteForwardRepository->getModel()->updateOrCreate(
            ['room_booking_id' => $roomBooking->id],
            [
                'forwarded_to' => $data['forwardTo'],
                'forwarded_by' => Auth::user()->id,
                'comment' => $data['comment']
            ]
        );
    }

    public function getBookingRequestWithInIds(array $searchCriteria = [], array $ids = [])
    {
        $ids = $ids ?: $this->getBookingRequestIdsWithForwardedByBookingTypes($searchCriteria);
        return $this->actionRepository->getModel()->whereIn('id', $ids)->get();
    }

    public function getBookingRequestIdsWithForwardedByBookingTypes(array $searchCriteria)
    {
        $bookingRequestIds = $this->actionRepository->getModel()->where('type', 'booking')
            ->whereIn('booking_type', $searchCriteria)->get()->pluck('id')->toArray();

        $forwardedBookingRequestIds = $this->bookingRequesteForwardRepository->getModel()
            ->where('forwarded_to', Auth::user()->id)->get()->pluck('room_booking_id')->toArray();

        $forwardedBookingRequestIdsByUsers = $this->bookingRequesteForwardRepository->getModel()
            ->where('forwarded_by', Auth::user()->id)->get()->pluck('room_booking_id')->toArray();

        return array_diff(
            array_merge($bookingRequestIds, $forwardedBookingRequestIds),
            $forwardedBookingRequestIdsByUsers
        );
    }

    /**
     * @param $approvedBookingCheckinRecords
     * @return \Illuminate\Support\Collection
     */
    private function getBookedRooms(Collection $approvedBookingCheckinRecords): \Illuminate\Support\Collection
    {
        $collectionOfBookedRooms = collect();
        $approvedBookingCheckinRecords->each(function ($booking) use ($collectionOfBookedRooms) {
            if ($booking->type == 'checkin') {
                $booking->rooms->each(function ($checkedinRoom) use ($collectionOfBookedRooms) {
                    $collectionOfBookedRooms->push(['room_type_id' => $checkedinRoom->room->room_type_id, 'quantity' => 1]);
                });
            } else {
                $booking->roomInfos->each(function ($roomInfo) use ($collectionOfBookedRooms) {
                    $collectionOfBookedRooms->push(['room_type_id' => $roomInfo->room_type_id, 'quantity' => $roomInfo->quantity]);
                });
            }
        });
        return $collectionOfBookedRooms;
    }

    /**
     * @return mixed
     */
    private function getTotalRoomsByRoomType()
    {
        $roomTypes = $this->roomTypeService->findAll();

        $totalRoomsByRoomType = [];

        $roomTypes->each(function ($roomType) use (&$totalRoomsByRoomType) {
            $totalRoomsByRoomType[$roomType->id] = $roomType->rooms->count();
        });

        return $totalRoomsByRoomType;
    }

    /**
     * @param RoomBooking $roomBooking
     * @return bool
     */
    private function checkRoomsAvailability(RoomBooking $roomBooking): bool
    {
        $approvedBookingCheckinRecords = $this->roomBookingRepository->getApprovedBookingCheckinRecords($roomBooking);

        $collectionOfBookedRooms = $this->getBookedRooms($approvedBookingCheckinRecords);

        $sumOfBookedRoomTypes = $collectionOfBookedRooms->groupBy('room_type_id')->map(function ($roomInfos) {
            return $roomInfos->sum('quantity');
        });

        $totalRoomsByRoomType = $this->getTotalRoomsByRoomType();

        $requestedRoomsByRoomTypes = $roomBooking->roomInfos->groupBy('room_type_id')->map(function ($roomInfos) {
            return $roomInfos->sum('quantity');
        });

        foreach ($requestedRoomsByRoomTypes as $roomTypeId => $roomQuantities) {
            $availableRooms = $this->getAvailableRooms($roomTypeId, $sumOfBookedRoomTypes, $totalRoomsByRoomType);

            if ($roomQuantities > $availableRooms) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param RoomBooking $roomBooking
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model|mixed
     */
    public function approveBookingRequest(RoomBooking $roomBooking, array $data)
    {
        if ($this->checkRoomsAvailability($roomBooking)) {
            return $this->update($roomBooking, $data);
        }
        return false;
    }

    /**
     * @param $roomTypeId
     * @param $sumOfBookedRoomTypes
     * @param $totalRoomsByRoomType
     * @return mixed
     */
    private function getAvailableRooms($roomTypeId, $sumOfBookedRoomTypes, $totalRoomsByRoomType)
    {
        if (array_key_exists($roomTypeId, $sumOfBookedRoomTypes->toArray()) &&
            array_key_exists($roomTypeId, $totalRoomsByRoomType)) {
            $availableRooms = $totalRoomsByRoomType[$roomTypeId] - $sumOfBookedRoomTypes[$roomTypeId];
        } else {
            $availableRooms = $totalRoomsByRoomType[$roomTypeId];
        }
        return $availableRooms;
    }

    /**
     * @param $data
     * @return array
     */
    private function storeRequesterFiles($data): array
    {
        $photoPath = array_key_exists('photo', $data) ? $this->upload($data['photo'], 'booking-requests') : null;
        $nidDocPath = array_key_exists('nid_doc', $data) ? $this->upload($data['nid_doc'], 'booking-requests') : null;
        $passportDocPath = array_key_exists('passport_doc', $data) ? $this->upload($data['passport_doc'], 'booking-requests') : null;

        return array($photoPath, $nidDocPath, $passportDocPath);
    }

    public function getCheckedInDuration(RoomBooking $roomBooking)
    {
        $startDate = Carbon::createFromFormat('Y-m-d', $roomBooking->start_date);
        $endDate = $roomBooking->actual_end_date
            ? Carbon::createFromFormat('Y-m-d', $roomBooking->actual_end_date)
            : Carbon::createFromFormat('Y-m-d', $roomBooking->end_date);

        $duration = $startDate->diffInDays($endDate);

        return $duration ?: 1;
    }
}

