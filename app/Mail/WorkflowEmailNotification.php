<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WorkflowEmailNotification extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Model
     */
    private $model;
    private $message;
    private $url;

    /**
     * Create a new message instance.
     *
     * @param Model $model
     * @param $message
     * @param $url
     */
    public function __construct(Model $model, $message, $url)
    {
        $this->model = $model;
        $this->message = $message;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.workflow.notification_email')
            ->with([
                'title' => $this->model->title,
                'message' => $this->message,
                'url' => $this->url
            ]);
    }
}
