<?php

use App\customer as customer;
use App\customer_info_model as customer_info;
use App\SMS as SMS;
use App\Events\MessagePosted;
use Illuminate\Support\Facades\Event;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();


Route::get('/chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
Route::get('/mail/queue', 'CustomerInfoController@SendEmail');
	


Route::get('/email/welcome', function() {
	return view('/emails/welcome');
});
Route::post('/sendmail', function (\Illuminate\Http\Request $request, \Illuminate\Mail\Mailer $mailer) {
	$mailer->to($request->input('mail'))->send(new \App\Mail\NewEmail($request->input('title')));
	return redirect()->back();
})->name('sendmail');
/*
|-------------------------------------------------------------------------
| React pages
|-----------------------------------------------------------------------
|
 */
Route::get('/react', function() {return view('React/Main_React');})->name('react');

/*
 * -----------------------------------------------------------------------
 */

Route::get('/googlelogin', 'SheetsInfoController@googlelogin');

Route::get('/sheetsInfo', 'SheetsInfoController@client')->name('sheetsInfo');

Route::get('/sheetapi', 'SheetsInfoController@googleapi')->name('googleapi');



Route::get('/sendnotifications', 'SMSController@SMSData')->name('SMS.sendnotifications');

Route::get('SMS', 'SMSController@create')->name('SMS.SMS');

Route::resource('customer', 'CustomerInfoController');

Route::get('/', 'CustomerInfoController@custData')->name('pages.homepage');

Route::get('/index', 'CustomerInfoController@index')->name('index');

Route::get('customer/{customer}', 'CustomerInfoController@show')->name('pages.show');
Route::match(['PUT', 'PATCH'], 'customer/{customer}', 'CustomerInfoController@update')->name('customer.update');



Route::post('newVehicle', 'CustomerInfoController@newVehicle');

Route::match(['PUT', 'PATCH'], 'customer/{customer}/createNote', 'CustomerInfoController@note')->name('customer.createNote');

Route::match(['PUT', 'PATCH'], 'customer/{customer}/editcustomer', 'CustomerInfoController@edit')->name('customer.editCustomer');

Route::match(['PUT', 'PATCH'], 'customer/{vehicle}/updateVIN', 'CustomerVehicleController@updateVIN')->name('vehicle.updateVIN');



Route::match(['PUT', 'PATCH'], 'customer/{vehicle}/checkOut', 'CustomerVehicleController@check_Out')->name('vehicle.check_Out');



Route:: get('vehicle/{vehicle}/vehicle_edit', 'CustomerVehicleController@vehicle_edit')->name( 'vehicle.vehicle_edit');

Route::get('vehicle/{customer}/main_vehicle', 'CustomerVehicleController@main_vehicle')->name('vehicle.main_vehicle');

Route::post('vehicle/{vehicle}/createVehicleNote', 'CustomerVehicleController@note')->name('vehicle.createNote');

Route::get('customer/{customer}/modal_vehicle', 'CustomerVehicleController@modal_vehicle')->name('vehicle.modal_vehicle');

Route::get('vehicle/{customer}/select_vehicle_form', 'CustomerVehicleController@select_vehicle_form')->name('vehicle.select_vehicle_form');


Route::get('vehicle/{vehicle}/showvehicle', 'CustomerVehicleController@showvehicle')->name('vehicle.showvehicle');

Route::match(['PUT', 'PATCH'], 'customer/{customer}/new_vehicle', 'CustomerInfoController@newVehicle')->name( 'customer.newVehicle');

Route::match(['PUT', 'PATCH'], 'vehicle/{vehicle}/checkIncreateNote', 'CustomerVehicleController@checkIncreateNote')->name('vehicle.checkIncreateNote');

Route::match(['PUT', 'PATCH'], 'customer/{customer}/done', 'CustomerInfoController@done')->name('customer.done');

Route::match(['PUT', 'PATCH'], 'vehicle/{vehicle}/done', 'CustomerVehicleController@done')->name('vehicle.done');


Route::match(['PUT', 'PATCH'], 'customer/{vehicle}/new_vehicle', 'CustomerVehicleController@vehicle_modal_update')->name( 'vehicle.vehicle_modal_update');


Route::match(['PUT', 'PATCH'], 'customer/{vehicle}/new_vehicle', 'CustomerVehicleController@new_vehicle')->name( 'vehicle.vehicle_update');







Route::POST('contact', 'PagesController@postContact');

Route::get('contact', 'PagesController@getContact');

Route::get('customer/{customer}/invoice_upload_form', 'invoice_controller@showinvoiceform')->name( 'forms.invoice_upload_form'); 

Route::match(['PUT', 'PATCH'], 'Invoice.{vehicle}/new_Invoice', 'invoice_controller@uploadFileToS3')->name('invoice.newInvoice');

Route::get ('vehicle/{customer}/vehicle_main_update', 'CustomerVehicleController@select_vehicle_main')->name('vehicle.vehicle_main_update');

Route::match(['PUT', 'PATCH'], 'customer/{customer}/vehicle_mainname_update',  'CustomerVehicleController@vehicle_mainname_update')->name('vehicle.vehicle_mainname_update');

Route::get('customer/{customer}/parts_invoice_upload_form', 'invoice_controller@showpartsform')->name('forms.parts_invoice_upload_form');

Route::match(['PUT', 'PATCH'], 'parts.{customer}', 'invoice_controller@parts')->name('parts.partsinvoiceuploadhandler');

Route::get('customer/{customer}/data_upload_form', 'invoice_controller@showdataform')->name( 'forms.data_upload_form'); 

Route::match(['PUT', 'PATCH'], 'data.{customer}', 'invoice_controller@otherdata')->name( 'data.datauploadhandler');

Route::get('customer/{customer}/safety_upload_form', 'invoice_controller@showsafetyform')->name( 'forms.safety_upload_form'); 

Route::match(['PUT', 'PATCH'], 'safety.{customer}', 'invoice_controller@safety')->name( 'safety.safetyuploadhandler');



Route::match(['PUT', 'PATCH'], 'customer/{vehcile}/vehicle_edit', 'CustomerVehicleController@vehicle_info_update')->name( 'vehicle.vehicle_info_update');

Route::DELETE('vehicle/{vehicle}/vehicle_edit', 'CustomerVehicleController@destroy_vehicle')->name( 'vehicle.destroy_vehicle');





