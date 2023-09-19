<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/contactData',  'Contact_Data_Controller@contactDataJson');

Route::put('/contactData/{id}', 'Contact_Data_Controller@update');

Route::post('/contactData', 'Contact_Data_Controller@store');

Route::delete('/contactData/{id}', 'Contact_Data_Controller@destroy');

Route::get('/contactDataCurrent',  'Contact_Data_Controller@contactDataCurrent');

Route::get('/contactDataQuery',  'Contact_Data_Controller@contactDataQuery');

Route::get('/contactDataJson', 'Contact_Data_Controller@contactDataJson');



Route::get('/smsVin', 'Contact_Data_Controller@smsVin');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


