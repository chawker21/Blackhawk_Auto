<?php

namespace App\Listeners;

use App\Events\CustomerCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\customer;
use Twilio\Twiml;
use Twilio\Rest\Client;
use App\SMS as SMS;
use SMSController;
use Auth;
class SendSMSCustomer
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
    public function handle (CustomerCreated $event)

	{

		$customer = new customer();
		$customer->First_Name    = $event->First_Name;
		$customer->Last_Name     = $event->Last_Name;
		$customer->Phone_Number  = $event->Phone_Number;
		$customer->Vehicle_Make  = $event->Vehicle_Make;
		$customer->Vehicle_Model = $event->Vehicle_Model;
		$customer->Vehicle_Year  = $event->Vehicle_Year;
		$customer->Additional_Info = $event->Additional_Info;
		$customer->user_id	     = $event->user_id;

		$accountsid = "AC0d71576ac0927ae03e1fab389696f4f0";
        $authtoken = "fa57e1e9950f3aed021919bbffbf1013";
        $twilionumber = "+13853556545";

        $client = new Client($accountsid, $authtoken);

		$user = Auth::user();
	 if ($user->name !== 'User: Chris') {
		$body = 'New customer info, '. '||' .' '.
		$customer->First_Name .' '.
		$customer->Last_Name .' '. '||' .' '.
		$customer->Phone_Number .' '. '||' .' '.
		$customer->Vehicle_Year .' '.
		$customer->Vehicle_Make .' '.
		$customer->Vehicle_Model .' '. '||' .''.
		$customer->Additional_Info .' '. '||' .' Sent in by '.
		ltrim($customer->user_id, 'User:');
		$client->messages->create(
		"+18016945779",
		array(
		'from' => $twilionumber,
		'Body' => $body,

		));

		}

   else {
		$body = 'New customer info, '. '||' .' '.
		$customer->First_Name .' '.
		$customer->Last_Name .' '. '||' .' '.
		$customer->Phone_Number .' '. '||' .' '.
		$customer->Vehicle_Year .' '.
		$customer->Vehicle_Make .' '.
		$customer->Vehicle_Model;
		$client->messages->create(
		"+18018790769",
		array(
		'from' => $twilionumber,
		'Body' => $body,

		));

		}
	}

}
