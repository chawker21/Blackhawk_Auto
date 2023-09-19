<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_Sheets;
use Illuminate\Http\Request;
use Session;

class SheetsInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function client()
    {
        $client = new Google_Client();
        $client->setAuthConfig('../public/js/client_secret.json');
        $client->addScope("https://www.googleapis.com/auth/spreadsheets");
        $client->setAccessType('offline');
        $auth_url = $client->createAuthUrl();
        return redirect($auth_url);
    }

    public function googlelogin(Request $request)
    {
        $client = new Google_Client();
        $client->setAuthConfig('../public/js/client_secret.json');
        $authCode = $request->code;
        $creds = $client->fetchAccessTokenWithAuthCode($authCode);
        session(['sheets_token' => $creds]);
        Session::flash('success', 'You can now check Google Sheets Data');
        return redirect('/');
    }

    public function googleapi()
    {
        $client = new Google_Client();
        $client->setAccessToken(session('sheets_token'));
        $range = 'A76:I';
        $service = new Google_Service_Sheets($client);
        $spreadsheetId = '1ge8N7mvORKuLMXelAQdtlUVCzCGkB2_1PoG0xgghq6I';
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);


        echo '<pre>', print_r($response), '</pre>';


    }
}
