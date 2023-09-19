<?php

namespace App\Http\Controllers;

use App\SMS;
use CustomerInfoController;
use Illuminate\Http\Request;
use Session;
use View;


class SMSController extends Controller
{

    public function SMSData()
    {
        $SMSS = SMS::all();
        return view('pages.sendnotifications');
    }

    public function create(Request $request)
    {
        SMS::createSMS($request);
    }

}
