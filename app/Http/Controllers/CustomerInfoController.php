<?php

namespace App\Http\Controllers;

use App\customer_info;
use App\customer_note as customer_note;
use App\customer_vehicle as customer_vehicle;
use App\invoice as invoice;
use App\SMS;
use Auth;
use Flysystem;
use Illuminate\Http\Request;
use JavaScript;
use Redirect;
use Session;
use Storage;
use View;

//use App\customer_int as customer_int;

class customerInfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function contactDataJson()
    {
        $contactData = customer_info::all()->pluck('Last_Name', 'First_Name')->toJson();

        return response()->json($contactData);
    }

    /*---------------------------- returns list of current customers, updated SMS, and invoice totals to current WIP page ---------*/
    public function custData()
    {
        $customer_infos = customer_info::customerData();
        $SMSbody = SMS::orderBy('created_at', 'DESC')->limit(6)->get();
        $customer_vehicle = customer_info::with('customer_vehicles')->get();
        $customer_note = customer_info::with('customer_notes')->get();
        $invoices = customer_vehicle::with('invoices')->get();
       $invoiceTotals = invoice::invoiceTotals();
       // return view('pages.homepage.home', compact('customer_infos', 'SMSbody', 'customer_vehicle', 'customer_note'));
        return view('pages.homepage.home', compact('customer_infos', 'SMSbody', 'customer_vehicle', 'customer_note', 'invoiceTotals', 'invoices'));
    }

    /*------------------ queries database for all records of customers ------------------*/
    public function index(Request $request)
    {
        $Querys = $request->input('query');
        $customer_infos = customer_info::searcher($request, $Querys);


        return view('pages.index', ['customer_infos' => $customer_infos, 'query' => $Querys]);
    }

    /*-------------- Stores newly created customer info to Database, button found on current work in progress page ---------------*/
    public function store(Request $request)
    {
        $this->validate($request, [
            'Additional_info' => 'max:600'
        ]);
        customer_info::saveCustomer($request);
        return redirect()->action('CustomerInfoController@custData');
    }



    /*---------- newVehicle used by Add Vehicle button on Show Page, adds additional vehicle to existing customer --------------*/
    public function newVehicle(Request $request, $id)
    {
        $this->validate($request, [
            'Additional_info' => 'max:600'
        ]);
        // Read the JSON file
        $json_str = File::get(storage_path('path/to/vehicle_makes.json')); // Replace 'path/to' with the actual path
        $vehicle_makes = json_decode($json_str, true);
        customer_info::NewVehicle($request, $id);

        return redirect::back();
    }


    /*-------------- Main customer information page with access to invoices and Data stored for individual customers ---------*/
    public function show($id)
    {

        $customer_info = customer_info::find($id);
        $invoices = customer_info::with('invoices')->find($id)->invoices;
        $data = customer_info::with('data')->find($id)->data;
        $total = customer_info::with('invoices')->find($id)->invoices->sum('invoice_total');


        $customer_vehicle = customer_info::with('customer_vehicles')->find($id)->customer_vehicles;
        $current_vehicle = $customer_vehicle->where('Checked_in', '==', 1);
        $customer_note = customer_info::with('customer_notes')->find($id)->customer_notes;


        return view('pages.show', compact('customer_info', 'invoices', 'total', 'customer_vehicle', 'customer_note', 'data', 'current_vehicle'));
    }

    public function edit(Request $request, $id)
    {
        customer_info::editCustomer($request, $id);

        return redirect::back();

    }


    /*------ function note is used by the Add Note button on the Show Page, found in ('modals._add_note_modal') -------*/

    public function done($id)
    {
        $this->customer_info = customer_info::find($id);
        $this->customer_info->Checked_in = !$this->customer_info->Checked_in;
        $this->customer_info->update();

        return redirect::back();
    }

    /*--------------- destroys customer data, only administrator has access to button on show page --------------*/
    public function destroy($id)
    {
        $customer_info = customer_info::find($id);
        $customer_info->delete();
        Session::flash('success', 'The customer Info was Deleted');

        return redirect()->action(
            'CustomerInfoController@custData');
    }
}
