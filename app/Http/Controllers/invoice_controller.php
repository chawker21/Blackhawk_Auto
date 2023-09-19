<?php

namespace App\Http\Controllers;

use App\customer_info;
use App\customer_vehicle;
use App\data;
use App\invoice;
use Carbon\Carbon;
use Flysystem;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Storage;

class invoice_controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showinvoiceform($id)
    {

        $customer_info = customer_info::find($id);

        return view('forms.invoice_upload_form')->withcustomer_info($customer_info);

    }

    public function showpartsform($id)
    {

        $customer_info = customer_info::find($id);

        return view('forms.parts_invoice_upload_form')->withcustomer_info($customer_info);
    }

    public function showdataform($id)
    {

        $customer_info = customer_info::find($id);

        return view('forms.data_upload_form')->withcustomer_info($customer_info);
    }

    public function showsafetyform($id)
    {

        $customer_info = customer_info::find($id);

        return view('forms.safety_upload_form')->withcustomer_info($customer_info);
    }

    public function uploadFileToS3(Request $request, $id)
    {

        $vehicle = customer_vehicle::find($id);

        $invoice = new invoice;
        $request->hasFile('invoice');

        $file = $request->file('invoice');
        $fileName = 'customer-' . $vehicle->customer_info_id . '-vehicle-' . $vehicle->id . '-' . carbon::now('America/Denver')->format('m-d-Y-h-i-s');
        $destinationPath = config('app.fileDestinationPath') . '/' . $fileName;


        $invoice->invoice_name = $destinationPath;


        $invoice->customer_info_id = $vehicle->customer_info_id;
        $invoice->vehicle_info_id = $vehicle->id;
        $invoice->invoice_total = $request->invoice_total;

        $invoice->job_description = $request->job_description;
       // flysystem::put($destinationPath, file_get_contents($file), ['Content-Type' => $file->getMimeType()]);

        $invoice->save();

        Session::flash('success', 'Invoice uploaded and added to records');

        return redirect()->route('pages.show', $vehicle->customer_info_id);
    }


    public function otherdata(Request $request, $id)
    {

        $vehicle = customer_vehicle::find($id);

        $data = new data;
        $request->hasFile('data');
        $file = $request->file('data');
        $fileName ='customer-' . $vehicle->customer_info_id . '-vehicle-' . $vehicle->id . '-' . carbon::now('America/Denver')->format('m-d-Y-h-i-s');

        $dataPath = config('app.fileDataPath') . '/' . $fileName;



        $data->data_name = $dataPath;

        $data->type = 'Data';
        $data->customer_info_id = $vehicle->customer_info_id;
        $data->vehicle_info_id = $vehicle->id;
        $data->job_description = $request->job_description;
       // flysystem::put($dataPath, file_get_contents($file), ['Content-Type' => $file->getMimeType()]);

        $data->save();

        Session::flash('success', 'Data uploaded and added to records');


        return redirect()->route('pages.show', $vehicle->customer_info_id);


    }

    public function safety(Request $request, $id)
    {

        $customer_info = customer_info::find($id);
        $invoice = new invoice;
        $request->hasFile('invoice');
        $file = $request->file('invoice');
        $fileName = $request->invoice_number . ' ' . $customer_info->Last_Name . ' Safety ' . '' . carbon::now();
        $destinationPath = config('app.fileDestinationPath') . '/' . $fileName;

        $Invoice = $destinationPath;

        $invoice->invoice_name = $invoice['invoice'] . '' . $Invoice;

        $invoice->type = 'Safety';
        $invoice->customer_info_id = $customer_info->id;

       // flysystem::put($destinationPath, file_get_contents($file), ['Content-Type' => $file->getMimeType()]);

        $invoice->save();
        $customer_info->update();
        Session::flash('success', 'Safety inspection uploaded and added to records');


        return redirect()->route('pages.show', $customer_info->id);


    }
}
