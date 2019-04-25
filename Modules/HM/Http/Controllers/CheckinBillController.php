<?php

namespace Modules\HM\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\HM\Entities\RoomBooking;

class CheckinBillController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(RoomBooking $roomBooking)
    {
        $startDate = Carbon::createFromFormat('Y-m-d', $roomBooking->start_date);
        $endDate = $roomBooking->actual_end_date
            ? Carbon::createFromFormat('Y-m-d', $roomBooking->actual_end_date)
            : Carbon::createFromFormat('Y-m-d', $roomBooking->end_date);

        $duration = $startDate->diffInDays($endDate);

        return view('hm::check-in.bill.index')->with([
            'checkin' => $roomBooking,
            'duration' => $duration
        ]);
    }
}
