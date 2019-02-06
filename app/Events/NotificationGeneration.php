<?php

namespace App\Events;

use App\Models\NotificationInfo;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NotificationGeneration
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $notificationInfo;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(NotificationInfo $notificationInfo)
    {
        $this->notificationInfo = $notificationInfo;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
//    public function broadcastOn()
//    {
//        return new PrivateChannel('channel-name');
//    }
}
