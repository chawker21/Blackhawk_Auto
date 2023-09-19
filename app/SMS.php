<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
   protected $fillable = ['Body'];
	

 public function Customer_Info_SMS()
	{
		
		return $this->belongsTo('App\customer_info');
	}

	public static function createSMS($request)
    {
        $Body = $request->input('Body');
        $SMS = new SMS([
            'Body' => mb_strimwidth($Body, 4, 33)]);
        $SMS->save();
        //$response = new Twiml;
        //$response->message("Thank you, Your Message has been saved!");
        //print $response;
    }
}