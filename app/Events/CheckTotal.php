<?php

namespace App\Events;

use App\invoice as invoice;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CheckTotal
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $week;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($week)
    {
          $this->week = $week -> invoice::where('created_at', '>=', Carbon::now()->subDays(7))->sum('invoice_total');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
