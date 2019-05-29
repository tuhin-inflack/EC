<?php

namespace Modules\HM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Modules\HM\Emails\SendPaymentInfoMail;
use Modules\HM\Entities\CheckinPayment;
use Modules\HM\Entities\RoomBooking;
use Modules\HM\Http\Requests\StoreCheckinPaymentRequest;
use Modules\HM\Services\CheckinPaymentService;
use Modules\HM\Services\CheckinService;

class CheckinPaymentController extends Controller
{
    /**
     * @var CheckinPaymentService
     */
    private $checkinPaymentService;
    /**
     * @var CheckinService
     */
    private $checkinService;

    /**
     * CheckinPaymentController constructor.
     * @param CheckinPaymentService $checkinPaymentService
     * @param CheckinService $checkinService
     */
    public function __construct(CheckinPaymentService $checkinPaymentService, CheckinService $checkinService)
    {
        $this->checkinPaymentService = $checkinPaymentService;
        $this->checkinService = $checkinService;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(RoomBooking $roomBooking)
    {
        if ($roomBooking->type != 'checkin') {
            abort(404);
        }

        $totalBill = $this->checkinService->getTotalBill($roomBooking);
        $dueAmount = $this->checkinService->getDueAmount($roomBooking);

        return view('hm::check-in.payment.index')->with([
            'checkin' => $roomBooking,
            'totalBill' => $totalBill,
            'dueAmount' => $dueAmount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param RoomBooking $roomBooking
     * @return Response
     */
    public function create(RoomBooking $roomBooking)
    {
        $duration = $this->checkinService->getCheckedInDuration($roomBooking);
        $dueAmount = $this->checkinService->getDueAmount($roomBooking);

        return view('hm::check-in.payment.create')->with([
            'checkin' => $roomBooking,
            'duration' => $duration,
            'dueAmount' => $dueAmount
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreCheckinPaymentRequest $request
     * @param RoomBooking $roomBooking
     * @return Response
     */
    public function store(StoreCheckinPaymentRequest $request, RoomBooking $roomBooking)
    {
        if ($roomBooking->type != 'checkin') {
            abort(404);
        }

        $checkinPayment = $this->checkinPaymentService->save(
            array_merge(
                $request->all(),
                [
                    'checkin_id' => $roomBooking->id,
                    'shortcode' => time()
                ]
            )
        );

        if ($checkinPayment && !empty($roomBooking->requester->email)) {
            Mail::to($roomBooking->requester->email)->send(new SendPaymentInfoMail($roomBooking, $checkinPayment, $request->amount, $request->type));
        }

        Session::flash('success', trans('labels.save_success'));

        return redirect()->route('check-in-payments.index', $checkinPayment->checkin_id);
    }

    /**
     * Show the specified resource.
     * @param RoomBooking $roomBooking
     * @param CheckinPayment $checkinPayment
     * @return Response
     */
    public function show(RoomBooking $roomBooking, CheckinPayment $checkinPayment)
    {
        return view('hm::check-in.payment.show')->with(['checkin' => $roomBooking, $checkinPayment]);
    }
}
