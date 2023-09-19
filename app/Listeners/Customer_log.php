<?php

namespace App\Listeners;

use App\Events\CustomerCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\customer;
class Customer_log
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CustomerCreated  $event
     * @return void
     */
    public function handle(CustomerCreated $event)
    {
         
			$customer = new customer();
		$customer->First_Name = $event->First_Name;
		$customer->Last_Name = $event->Last_Name;
		$customer->Phone_Number = $event->Phone_Number;
		
		$customer->save();//
    }
}
