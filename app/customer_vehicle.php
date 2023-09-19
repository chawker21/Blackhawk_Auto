<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use Log;

class customer_vehicle extends Model
{
	public function Customer_vehicle() 
	{
		return $this->belongsTo('App\customer_info');
	}

    public function vehicle_notes()
    {
        return $this->hasMany('App\customer_note', 'vehicle_info_id');
    }
    public function invoices()
    {
        return $this->hasMany('App\invoice', 'vehicle_info_id');
    }
    public function data()
    {
        return $this->hasMany('App\data', 'vehicle_info_id');
    }

public function vehicle_additional_information()
	{
		return $this->hasMany('App\Vehicle_Additional_Information', 'customer_vehicle_id');
	}
	public static function saveVehicle($request, $customer_info)
    {
        $customer_vehicle = new customer_vehicle();
        $customer_vehicle->Vehicle_Year    = $request->Vehicle_Year;
        $customer_vehicle->Vehicle_Make    = $request->Vehicle_Make;
        $customer_vehicle->Vehicle_Model   = $request->Vehicle_Model;
        $customer_vehicle->VIN             = $request->VIN;
        $customer_vehicle->customer_info_id = $customer_info->id;
        $customer_vehicle->Checked_in = 1;
        $customer_vehicle->save();

        customer_note::createNoteWithVehicle($request, $customer_vehicle);

    }
    public static function updateVIN($request, $id)
    {
        $customer_vehicle = customer_vehicle::find($id);

        $customer_vehicle->VIN = $request->VIN;
        $customer_vehicle->update();
    }
    public static function createNote($request, $id)
    {
        $user = Auth::user()->name;
        $customer_vehicle = customer_vehicle::find($id);

        $customer_vehicle->Checked_in = 1;
        $customer_vehicle->update();
        customer_note::createNoteWithVehicle($request, $customer_vehicle);
        $identity = $customer_vehicle->customer_info_id;

        customer_info::customerCheckIn($identity);
        return redirect()->action('CustomerInfoController@custData');

    }
    public static function newCheckIn($customer_vehicle)
    {


        $customer_vehicle->Checked_in = 1;
        $customer_vehicle->update();
        return $customer_vehicle;




    }
    public static function checkOutWithNote($request, $id)
    {
        $user = Auth::user()->name;
        $customer_vehicle = customer_vehicle::find($id);
        $customer_vehicle->Checked_in = 0;
        $customer_vehicle->update();
        $identity = $customer_vehicle->customer_info_id;
        customer_note::createVehicleNote($request, $customer_vehicle);
        customer_info::customerCheckIn($identity);
        return redirect()->action('CustomerInfoController@custData');

    }



}


