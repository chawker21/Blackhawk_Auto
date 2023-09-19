<?php

namespace App;

use App\SMS as SMS;
use App\invoice_model;
use App\customer_vehicle;
use Auth;
use App\Events\CustomerCreated;
use Illuminate\Database\Eloquent\Model;
use Log;
use Session;
use Illuminate\Http\Request;
use Redirect;
class customer_info extends Model
{
	 protected $fillable = [
	'id', 'Date', 'created_at', 'updated_at', 'First_Name', 'Last_Name', 'Phone_Number',
    'Vehicle_Make', 'Vehicle_Model', 'Vehicle_Year', 'VIN', 'Additional_Info', 'Checked_in', 'invoice_number', 'user_id'
    ];

	public $customer_info;
	public function scopeExclude($query,$value = array())
	{
		return $query->select( array_diff( $this->columns,(array) $value));
	}

   public function SMSData()
   {
	   return $this->hasMany('App\SMS');
   }

	public function invoices()
	{
		return $this->hasMany('App\invoice', 'customer_info_id');

	}

    public function data()
    {
        return $this->hasMany('App\data', 'customer_info_id');

    }

	public function customer_vehicles()
	{
		return $this->hasMany('App\customer_vehicle');
	}
	public function customer_notes()
	{
		return $this->hasMany('App\customer_note', 'customer_info_id');
}
public static function customerData()
{
     $customer_info = customer_info::where('checked_in', '=', true)->orderBy('updated_at', 'DESC')->paginate(5);
     return ($customer_info);
}
public static function saveCustomer($request)
{
    $user= Auth::user();
    $customer_info = new customer_info($request->except(['Vehicle_Year', 'Vehicle_Make', 'Vehicle_Model', 'VIN']));
    $data = $request->Phone_Number;
    if (preg_match('/(\d{3})(\d{3})(\d{4})$/', $data, $matches))
    {$result = $matches[1] . '-' . $matches[2] . '-' . $matches[3];
        $customer_info->Phone_Number = $result;
    } else {
        $customer_info->Phone_Number = $request->Phone_Number;
    }
    $customer_info->address = $request->address;
    $customer_info->city = $request->city;
    $customer_info->zipcode = $request->zipcode;
    $customer_info->state = $request->state;
    $customer_info->email = $request->email;
    $customer_info->user_id = $user->name;
    $customer_info->save();

    customer_vehicle::saveVehicle($request, $customer_info);
    Log::info($user->name . ' Created a Customer' . '' .  $customer_info->id . '' .  $customer_info->First_Name . '' .  $customer_info->Last_Name);
    Session()->flash('success', 'customer Information Saved');
    Event(new CustomerCreated($request, $customer_info));
}

public static function editCustomer($request, $id)
{
    $user= Auth::user();
    $customer_info = customer_info::findOrFail($id);
    $data = $request->Phone_Number;
    if (preg_match('/(\d{3})(\d{3})(\d{4})$/', $data, $matches))
    {$result = $matches[1] . '-' . $matches[2] . '-' . $matches[3];
        $customer_info->Phone_Number = $result;
    } else {
        $customer_info->Phone_Number = $request->Phone_Number;
    }
    $customer_info->address = $request->address;
    $customer_info->city = $request->city;
    $customer_info->zipcode = $request->zipcode;
    $customer_info->state = $request->state;
    $customer_info->email = $request->email;
    $customer_info->user_id = $user->name;
    $customer_info->update();
    customer_note::makeNote($request, $customer_info);

    Log::info($user->name . ' edited a Customer' . '' .  $customer_info->id . '' .  $customer_info->First_Name . '' .  $customer_info->Last_Name);
    Session()->flash('success', 'customer Information Updated');
    //Event(new CustomerCreated($customer_info));
}
public static function NewVehicle($request, $id)
{
    $user= Auth::user();
    $customer_info = customer_info::find($id);
    $customer_info->checked_in      = 1;
    $customer_info->user_id          = $user;
    $customer_info->save($request->all());

    customer_vehicle::saveVehicle($request, $customer_info);

}
public static function searcher($request, $Querys)
{
    $user= Auth::user();

    $customer_info = customer_info::where('First_Name', 'like', "%$Querys%")
        ->orWhere('Last_Name',     'like', "%$Querys%")
        ->orWhere('Phone_number',    '=',  "$Querys")->orderBy('id', 'DESC')->paginate(18);

    Log::info( $user->name . ' made a search using ' . '\'' . $Querys . '\'' . '.' );

    return ($customer_info);
}


public static function customerCheckIn($id)
{
    $customer_info = customer_info::find($id);
    $customer_info->checked_in = 1;
    $customer_info->timestamps = false;
    $customer_info->update();

}
    public static function done($id)
    {
        $customer_info = customer_info::find($id);
        $customer_info->Checked_in = !$customer_info->Checked_in;
        $customer_info->update();

        return redirect::back();
    }
}








