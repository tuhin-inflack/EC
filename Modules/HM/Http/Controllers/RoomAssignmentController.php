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
use Modules\HM\Services\HostelService;
use Modules\HM\Services\RoomService;

class RoomAssignmentController extends Controller
{
    private $hostelService;
    private $roomService;

    /**
     * RoomAssignmentController constructor.
     * @param HostelService $hostelService
     * @param RoomService $roomService
     */
    public function __construct(HostelService $hostelService, RoomService $roomService)
    {
        $this->hostelService = $hostelService;
        $this->roomService = $roomService;
    }


    public function index(Request $request)
    {
        $hostel = $this->hostelService->findOne($request['hostelId']);
        $rooms = $this->roomService->sortRoomsByLevel($hostel->rooms);
        return view('hm::check-in.seat', compact('hostel', 'rooms'));
    }
}
