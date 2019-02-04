<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\HM\Entities\RoomBooking;
use Modules\HM\Http\Requests\UpdateBookingRequestStatusRequest;
use Modules\HM\Services\BookingRequestService;
use Illuminate\Support\Facades\Mail;
use Modules\HM\Emails\BookingApprovalMail;

class BookingRequestStatusController extends Controller
{
    /**
     * @var BookingRequestService
     */
    private $bookingRequestService;
    /**
     * BookingRequestStatusController constructor.
     * @param BookingRequestService $bookingRequestService
     */
    public function __construct(BookingRequestService $bookingRequestService)
    {
        $this->bookingRequestService = $bookingRequestService;
    }
    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateBookingRequestStatusRequest $request, RoomBooking $roomBooking)
    {
        if($this->bookingRequestService->updateStatus($roomBooking, $request->all())){
            Mail::to($roomBooking->requester->email)->send(new BookingApprovalMail($roomBooking));
            Session::flash('success', trans('labels.update_success'));
        } else {
            Session::flash('error', trans('labels.update_fail'));
        }

        return redirect()->back();
    }

    public function approve(UpdateBookingRequestStatusRequest $request, RoomBooking $roomBooking)
    {
        //dd($roomBooking->requester->email);
        if ($this->bookingRequestService->approveBookingRequest($roomBooking, $request->all())) {
            Mail::to($roomBooking->requester->email)->send(new BookingApprovalMail($roomBooking));
            Session::flash('success', trans('labels.update_success'));
        } else {
            Session::flash('error', trans('hm::booking-request.not_enough_available_rooms'));
        }

        return redirect()->back();
    }
}
