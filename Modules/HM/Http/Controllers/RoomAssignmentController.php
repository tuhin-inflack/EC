<?php
/**
 * Created by PhpStorm.
 * User: jahangir
 * Date: 12/26/18
 * Time: 1:05 PM
 */

namespace Modules\HM\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\HM\Services\BookingRequestService;
use Modules\HM\Services\CheckinService;
use Modules\HM\Services\HostelService;
use Modules\HM\Services\RoomService;

class RoomAssignmentController extends Controller
{
    private $hostelService;
    private $roomService;
    private $roomBookingService;
    private $checkinService;

    /**
     * RoomAssignmentController constructor.
     * @param HostelService $hostelService
     * @param RoomService $roomService
     * @param BookingRequestService $roomBookingService
     * @param CheckinService $checkinService
     */
    public function __construct(HostelService $hostelService, RoomService $roomService, BookingRequestService $roomBookingService, CheckinService $checkinService)
    {
        $this->hostelService = $hostelService;
        $this->roomService = $roomService;
        $this->checkinService = $checkinService;
        $this->roomBookingService = $roomBookingService;
    }


    public function index(Request $request)
    {
        $hostel = $this->hostelService->findOrFail($request['hostelId']);
        $roomDetails = $this->roomService->sortRoomsByLevel($hostel->rooms);
        $roomBookingDetails = $this->roomBookingService->findOrFail($request['roomBookingId']);
        $guests = $this->roomBookingService->getBookingGuestInfo($roomBookingDetails->id, 'booked');
        $guests->prepend('Please select guest', '');
        return view('hm::check-in.seat', compact('hostel', 'roomDetails', 'roomBookingDetails', 'guests'));
    }

    public function store(Request $request)
    {
        $this->checkinService->store($request->all());
        Session::flash('success', 'Checkedin successfull');
        return redirect(route('room.assign', ['hostelId'=>$request['hostel_id'], 'roomBookingId'=>$request['room_booking_id']]));
    }

    public function getHostelList(Request $request)
    {
        $roomBookingId = $request['roomBookingId'];
        $hostels = $this->hostelService->getHostelAndRoomDetails();
        return view('hm::check-in.hostel', compact('hostels', 'roomBookingId'));
    }
}
