<?php

namespace App\Events;

use App\Models\Colocation;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AddedToColocation implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $colocation;

    public function __construct(User $user, Colocation $colocation)
    {
        $this->user = $user;
        $this->colocation = $colocation;
    }
 
    public function broadcastOn()
    {
        return new PrivateChannel("colocation.update");
    }

    public function broadcastAs()
    {
        return 'member.added';
    }
}
