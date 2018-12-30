<?php

namespace Modules\HM\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingRequestMail extends Mailable
{
    use Queueable, SerializesModels;
    private $bookingRequestData ;


    public function __construct(array  $data)
    {
        $this->bookingRequestData = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('hm::emails.booking_request_overview')->with(['bookingRequestData' => $this->bookingRequestData]);

    }
}
