<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BusColour
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $busColor;

    /**
     * Create a new event instance.
     */
    public function __construct(string $busColour)
    {
        $this->busColor = $busColour;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('BusColour'),
        ];
    }
}
