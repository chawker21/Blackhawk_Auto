<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_additional_information extends Model
{
    public function vehicle_additional_information() 
	{
		return $this->belongsTo('App\Customer_Vehicle');
	}//
}
