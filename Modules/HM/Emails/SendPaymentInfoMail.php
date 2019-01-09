<?php

namespace Modules\HM\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPaymentInfoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $roomBooking;
    private $checkinPayment;
    private $amount;
    private $paymentType;

    public function __construct($roomBooking = null, $checkinPayment = null, $amount = null, $type = null)
    {
        $this->roomBooking = $roomBooking;
        $this->checkinPayment = $checkinPayment;
        $this->amount = $amount;
        $this->paymentType = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('hm::emails.booking_payment_info')->with(
            [
                'checkin' => $this->roomBooking,
                'checkinPayment' => $this->checkinPayment,
                'amount' => $this->amount,
                'paymentType' => $this->paymentType,
            ]);

    }
}
