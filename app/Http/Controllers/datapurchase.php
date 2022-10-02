<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class datapurchase extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.datapurchase');
    }
    public function randomDigit()
    {
        $pass = substr(str_shuffle("01234561089abcDEfadsasfdasdfasdsfa3425542FGHIJnostXYZ"), 0, 30);
        return $pass;
    }
    public function store(Request $request)
    {
        $api = 'yeuhplp7chfn1oaw0qjkqngnurclh8md';
        $phoneNumber = $request->phoneNumber;
        $productCode = $request->package;
        $amount = $request->amount;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://smartrecharge.ng/api/v2/directdata/?api_key={$api}&product_code=mtn_1gb__500mb_bonus&phone=07069555553
            ",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
        return dd($response);
        echo $response;
    }
}
