<?php

namespace App\Http\Controllers;

use App\customer_info as customer_info;
use App\customer_info\attachCustomerVehicle;
use App\customer_note as customer_note;
use App\customer_vehicle as customer_vehicle;
use App\invoice as invoice;
use App\SMS as SMS;
use Auth;
use Carbon\Carbon;
use Flysystem;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Storage;
use View;

//use App\customer_int as customer_int;

class CustomerVehicleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function check_Out($id)
    {
        $this->customer_vehicle = customer_vehicle::find($id);
        $this->customer_vehicle->Checked_in = !$this->customer_vehicle->Checked_in;
        $this->customer_vehicle->update();

        return redirect::back();

    }

    public function done(Request $request, $id)
    {
        $customer_vehicle = customer_vehicle::find($id);

        $customer_vehicle->Checked_in = !$customer_vehicle->Checked_in;
        $customer_vehicle->update();

        return redirect::back();

    }

    public function updateVIN(Request $request, $id)
    {

        customer_vehicle::updateVIN($request, $id);

        Session::flash('success', 'customer Information Saved!');

        $customer_infos = customer_info::where('checked_in', '=', true)->orderBy('updated_at', 'DESC')->paginate(10);

        return back();
    }

    public function note(Request $request, $id)
    {
        $this->validate($request, [
            'Additional_info' => 'max:600'
        ]);
        customer_vehicle::createNote($request, $id);

        return redirect::back();
    }

    public function checkIncreateNote(Request $request, $id)
    {
        $user = Auth::user()->name;
        $customer_vehicle = customer_vehicle::find($id);
        customer_vehicle::newCheckIn($customer_vehicle);
        customer_note::createVehicleNote($request, $customer_vehicle);

        return redirect()->action('CustomerInfoController@custData');
    }

    public function destroy_vehicle($id)
    {
        $customer_vehicle = customer_vehicle::find($id);
        $customer_vehicle->delete();
        Session::flash('success', 'The Vehicle was Deleted');


        $SMSbody = SMS::where('created_at', '>=', Carbon::now()->subDays(10))->orderBy('created_at', 'DESC')->take(10)->get();
        $sum = invoice::all()->sum('invoice_total');

        $customer_info = customer_info::where('checked_in', '=', true)->orderBy('updated_at', 'DESC')->paginate(10);

        return view('pages.homepage', compact('customer_info', 'SMSbody', 'sum')
        );
    }

    public function destroy($id)
    {
        $customer_info = customer_info::find($id);
        $customer_info->delete();
        Session::flash('success', 'The customer Info was Deleted');


        $SMSbody = SMS::where('created_at', '>=', Carbon::now()->subDays(10))->orderBy('created_at', 'DESC')->take(10)->get();
        $sum = invoice::all()->sum('invoice_total');

        $customer_info = customer_info::where('checked_in', '=', true)->orderBy('updated_at', 'DESC')->paginate(10);

        return view('pages.homepage', compact('customer_info', 'SMSbody', 'sum')
        );

    }

}
//

