<?php

namespace App\Http\Controllers;

use App\customer_info as customer_info;
use App\Customer_vehicle as Customer_vehicle;
use App\SMS as SMS;
use App\Vehicle_additional_information as vehicle_additional_information;
use Carbon\Carbon;
use Flysystem;
use Illuminate\Http\Request;
use Session;
use Storage;
use View;

class Contact_Data_Controller extends Controller


{

    public function __construct()
    {
        $this->middleware('cors');
    }

    public function contactDataJson()
    {
        $contactData = customer_info::where('id', '>=', 1)->exclude(['Date', 'Timestamp', 'updated_at', 'created_at'])->get();

        return response()->json($contactData, 200);

    }

    public function contactDataCurrent()
    {


        $contactDataCurrent = customer_info::where('checked_in', '=', true)->exclude(['Date', 'Timestamp', 'updated_at', 'created_at'])->get();

        return response()->json($contactDataCurrent, 200);
    }


    public function contactDataQuery(Request $request)
    {
        $query = $request->input('query');
        $contactDataQuery = customer_info::where('First_Name', 'like', "%$query%")
            ->orWhere('Last_Name', 'like', "%$query%")
            ->orWhere('Phone_number', '=', "$query")
            ->orWhere('Vehicle_Make', 'like', "%$query%")
            ->orWhere('Vehicle_Model', 'like', "%$query%")
            ->orWhere('Vehicle_Year', '=', "$query")
            ->orWhere('VIN', '=', "$query")
            ->orWhere('invoice_number', 'like', "%$query%")
            ->exclude(['Date', 'Timestamp', 'updated_at', 'created_at'])->get();


        return response()->json($contactDataQuery, 200);
    }

    public function smsVin()
    {
        $SMSbody = SMS::where('created_at', '>=', Carbon::now()->subDays(33))->get();


        return response()->json($SMSbody, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Additional_info' => 'max:600'
        ]);

        $customer_info = new customer_info;
        $Customer_vehicle = new Customer_vehicle;
        $customer_info->First_Name = $request->First_Name;
        $customer_info->Last_Name = $request->Last_Name;
        $customer_info->Phone_Number = $request->Phone_Number;
        $customer_info->Vehicle_Year = $request->Vehicle_Year;
        $customer_info->Vehicle_Make = $request->Vehicle_Make;
        $customer_info->Vehicle_Model = $request->Vehicle_Model;
        $customer_info->VIN = $request->VIN;
        $customer_info->Additional_Info = $request->Additional_Info;
        $customer_info->checked_in = 1;

        $customer_info->save();
        $Customer_vehicle->Vehicle_Year = $request->Vehicle_Year;
        $Customer_vehicle->Vehicle_Make = $request->Vehicle_Make;
        $Customer_vehicle->Vehicle_Model = $request->Vehicle_Model;
        $Customer_vehicle->VIN = $request->VIN;
        $Customer_vehicle->customer_info_id = $customer_info->id;
        $Customer_vehicle->save();

        return response()->json(['customer_info' => $customer_info], 201);
    }


    public function select_vehicle_form($id)
    {
        $customer_info = customer_info::find($id);

        return view('customer.select_vehicle_form')->withcustomer_info($customer_info);
    }
    //


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer_info = customer_info::find($id);
        $invoices = customer_info::with('invoices')->find($id)->invoices;
        $Customer_vehicle = customer_info::with('customer_vehicles')->find($id)->customer_vehicles;      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer_info = customer_info::find($id);

        if (!$customer_info) {
            return response()->json(['message' => 'Document not Found'], 404);// return view and pass in information previously inputed
        }
        $customer_info->First_Name = $request->First_Name;
        $customer_info->Last_Name = $request->Last_Name;
        $customer_info->Phone_Number = $request->Phone_Number;
        $customer_info->Vehicle_Year = $request->Vehicle_Year;
        $customer_info->Vehicle_Make = $request->Vehicle_Make;
        $customer_info->Vehicle_Model = $request->Vehicle_Model;
        $customer_info->VIN = $request->VIN;
        $customer_info->Additional_Info = $request->Additional_Info;
        $customer_info->checked_in = 1;

        $customer_info->save();
        $Customer_vehicle->Vehicle_Year = $request->Vehicle_Year;
        $Customer_vehicle->Vehicle_Make = $request->Vehicle_Make;
        $Customer_vehicle->Vehicle_Model = $request->Vehicle_Model;
        $Customer_vehicle->VIN = $request->VIN;
        $Customer_vehicle->customer_info_id = $customer_info->id;
        $Customer_vehicle->save();

        return response()->json(['customer_info' => $customer_info], 200);
    }
    //


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'Additional_info' => 'max:600'
        ]);


        $vehicle_additional_information = new Vehicle_Additional_Information;
        $customer_info = customer_info::find($id);
        $Customer_vehicle = new Customer_vehicle;
        $customer_info->First_Name = $request->First_Name;
        $customer_info->Last_Name = $request->Last_Name;
        $customer_info->Phone_Number = $request->Phone_Number;
        $customer_info->Vehicle_Year = $request->Vehicle_Year;
        $customer_info->Vehicle_Make = $request->Vehicle_Make;
        $customer_info->Vehicle_Model = $request->Vehicle_Model;
        $customer_info->VIN = $request->VIN;
        $customer_info->Additional_Info = $request->Additional_Info;
        $customer_info->checked_in = 1;

        $customer_info->save();


        return response()->json(['customer_info' => $customer_info], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer_info = customer_info::find($id);
        $customer_info->delete();

        return response()->json(['message' => 'Customer Info Deleted'], 200);// return view and pass in information previously inputed

    }
}
