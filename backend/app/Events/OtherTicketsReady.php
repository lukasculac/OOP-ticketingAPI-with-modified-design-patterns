<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OtherTicketsReady
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $otherTickets;

    /**
     * Create a new event instance.
     */
    public function __construct($otherTickets)
    {
        $this->otherTickets = $otherTickets;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('other-tickets'),
        ];
    }
}
