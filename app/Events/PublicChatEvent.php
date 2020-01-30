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
use Illuminate\Support\Facades\Auth;

class PublicChatEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $message;

    public function __construct($message = null)
    {
        $this->message = $message;
    }

    /********************************/
    public function broadcastOn()
    {
        return new Channel('public_chat_channel');
    }

    /********************************/
    public function broadcastAs()
    {
        return 'public_chat_event';
    }

    /********************************/
    public function broadcastWith()
    {
        $user = Auth::user();
        $msg_index = Carbon::now(config('app.timezone'))->format('y-m-d H:i:s');
        return [
            'user_name' => $user->name ?? 'Na',
            'date' => $msg_index,
            'message' => $this->message,
        ];
    }
    /********************************/
    /********************************/
}
