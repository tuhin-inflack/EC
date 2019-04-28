<?php

namespace Modules\HM\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\HM\Entities\RoomBooking;
use Modules\HM\Services\BookingRequestService;
use Modules\HM\Services\CheckinService;

class CheckinBillController extends Controller
{
    /**
     * @var BookingRequestService
     */
    private $bookingRequestService;

    /**
     * CheckinBillController constructor.
     * @param BookingRequestService $bookingRequestService
     */
    public function __construct(BookingRequestService $bookingRequestService)
    {
        $this->bookingRequestService = $bookingRequestService;
    }

    /**
     * Display a listing of the resource.
     * @param RoomBooking $roomBooking
     * @return Response
     */
    public function index(RoomBooking $roomBooking)
    {
        $duration = $this->bookingRequestService->getCheckedInDuration($roomBooking);

        $endDate = $this->bookingRequestService->getCheckedInEndDate($roomBooking);

        return view('hm::check-in.bill.index')->with([
            'checkin' => $roomBooking,
            'duration' => $duration,
            'endDate' => $endDate,
        ]);
    }
}
