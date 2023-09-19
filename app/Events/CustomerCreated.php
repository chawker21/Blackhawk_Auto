<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Auth;
class CustomerCreated
{
    use InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($request, $customer_info)
    { $user= Auth::user();
        $this->First_Name    = $customer_info->First_Name;
        $this->Last_Name     = $customer_info->Last_Name;
        $this->Phone_Number  = $customer_info->Phone_Number;
        $this->Vehicle_Make = $request->Vehicle_Make;
        $this->Vehicle_Model = $request->Vehicle_Model;
        $this->Vehicle_Year  = $request->Vehicle_Year;
        $this->Additional_Info = $request->Additional_Info;
        $this->user_id = $user->name;

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
