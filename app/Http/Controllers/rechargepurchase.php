<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rechargepurchase extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.rechargepurchase');
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
            CURLOPT_URL => "https://smartrecharge.ng/api/v2/airtime/?api_key={$api}&product_code={$productCode}&phone={$phoneNumber}&amount={$amount}",
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

        echo $response;
        if ($response['status'] == true) {
            DB::table('rcpurchases')
                ->where('userId', auth()->user()->userId)
                ->insert([
                    'transactionId' => $this->randomDigit(),
                    'userId' => auth()->user->userId(),
                    'username' => auth()->user->username,
                    'email' => auth()->user->email,
                    'phoneNumber' => $request->phoneNumber,
                    'amount' => $request->amount,
                    'network' => $request->package,
                    'status' => 'CONFIRM',
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ]);
                DB::table('transactions')
                ->where('userId', auth()->user()->userId)
                ->insert([
                    'transactionId' => $this->randomDigit(),
                    'userId' => auth()->user->userId(),
                    'username' => auth()->user->username,
                    'email' => auth()->user->email,
                    'phoneNumber' => $request->phoneNumber,
                    'amount' => $request->amount,
                    'transactionType' => 'Recharge Card',
                    'transactionService' => $request->package,
                    'status' => 'CONFIRM',
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ]);
            return back()->with('success', 'Transaction Successful !!');
        } else {
            return back()->with('errors', 'Oop!!, Kindly reach out to admin');
        }
    }
}