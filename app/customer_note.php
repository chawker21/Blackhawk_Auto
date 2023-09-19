<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use Log;
use Redirect;

class customer_note extends Model
{
    protected $fillable = ['customer_info_id', 'Additional_note', 'created_at', 'updated_at', 'user_id'];

    public function customer_notes() 
	{
		return $this->belongsTo('App\customer_info');
	}

	public function vehicle_notes()
    {
        return $this->belongsTo('App\customer_vehicle');
    }

    public static function makeNote($request, $customer_info)
    {
        $customer_note = new customer_note();
        $customer_note->customer_info_id = $customer_info->id;
        $customer_note->Additional_note = $request->Additional_note;
        $customer_note->save();
    }
    public static function createVehicleNote($request, $customer_vehicle)
{
    $user = Auth::user()->name;
    if($request->Additional_note !== '') {
        $customer_note = new customer_note();


        $customer_note->customer_info_id = $customer_vehicle->customer_info_id;

        $customer_note->vehicle_info_id = $customer_vehicle->id;
        $customer_note->Additional_note = $request->Additional_note;

        $customer_note->save();

        Session::flash('success', 'Customer Note Added');
        Log::info('a new Note was added to vehicle ' . $customer_vehicle->id);
    }
}

    public static function createNoteWithVehicle($request, $customer_vehicle)
    {
        if($request->Additional_note !== '') {
            $user = Auth::user()->name;
            $customer_note = new customer_note();


            $customer_note->customer_info_id = $customer_vehicle->customer_info_id;

            $customer_note->vehicle_info_id = $customer_vehicle->id;
            $customer_note->Additional_note = $request->Additional_note;

            $customer_note->save();

            Session::flash('success', 'Customer Note Added');
            Log::info('a new Note was added to vehicle ' . $customer_vehicle->id);

            return $customer_note;
        }
    }
    public static function checkOutNote($request, $id)
    {
        $customer_note = new customer_note();
        $customer_note->customer_info_id = $customer_vehicle->customer_info_id;

        $customer_note->vehicle_info_id = $customer_vehicle->id;
        $customer_note->Additional_note = $request->Additional_note;
        $customer_note->update();
    }
}