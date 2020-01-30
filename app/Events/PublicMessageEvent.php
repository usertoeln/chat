<?php

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PublicMessageEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $message;

    /********************************/
    public function __construct($message = null)
    {
        $this->message = $message;
    }

    /********************************/
    public function broadcastOn()
    {
        return new Channel('public_channel');
    }

    /********************************/
    public function broadcastAs()
    {
        return 'public_message_event';
    }

    /********************************/
    public function broadcastWith()
    {
        $msg_index = Carbon::now(config('app.timezone'))->format('y-m-d H:i:s');
        return [
            'date' => $msg_index,
            'value' => $this->message,
        ];
    }
    /********************************/
    /********************************/
}
