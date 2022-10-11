<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class lightController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.lightpurchase');
    }
    public function randomDigit()
    {
        $pass = substr(str_shuffle("01234561089abcDEfadsasfdasdfasdsfa3425542FGHIJnostXYZ"), 0, 30);
        return $pass;
    }
    public function store(Request $request)
    {
        $expenses = DB::table('transactions')
            ->where('userId', auth()->user()->userId)
            ->where('transactionType', '!=', 'Deposit')
            ->sum('amount');
        $capital = DB::table('funds')
            ->where('userId', auth()->user()->userId)
            ->sum('amount');
        $bonus = DB::table('bonuses')
            ->where('sponsorId', auth()->user()->mySponsorId)
            ->sum('amount');
        $balance = $capital + $bonus - $expenses;
        if ($balance < $request->amount) {
            return back()->with('toast_error', 'Insufficient');
        } else {
            if ($request->package == 'none') {
                return back()->with('toast_error', 'Select an electricity services');
            } else {
                $api = 'yeuhplp7chfn1oaw0qjkqngnurclh8md';
                $productCode = $request->package;
                $amount = $request->amount;
                $meterNumber = $request->meterNumber;

                $ch = curl_init();

                // $curl = curl_init();

                curl_setopt(
                    $ch,
                    CURLOPT_URL,
                    "https://smartrecharge.ng/api/v2/electric/?api_key={$api}&meter_number={$meterNumber}&product_code=jedc_prepaid_custom&task=verify"
                );
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POST, true);
                $result = curl_exec($ch);

                $result = json_decode($result);
                // return dd($result->status);
                if ($result->status == true) {
                    curl_setopt(
                        $ch,
                        CURLOPT_URL,
                        "https://smartrecharge.ng/api/v2/electric/?api_key={$api}&product_code={$productCode}&meter_number={$meterNumber}&amount={$amount}"
                    );
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    $response = curl_exec($ch);
                    $response = json_decode($response);

                    // return dd($response);

                    if ($response->status == true) {
                        DB::table('lightpurchases')
                            ->where('userId', auth()->user()->userId)
                            ->insert([
                                'transactionId' => $this->randomDigit(),
                                'userId' => auth()->user->userId(),
                                'username' => auth()->user->username,
                                'email' => auth()->user->email,
                                'phoneNumber' => auth()->user()->phoneNumber,
                                'amount' => $request->amount,
                                'meter' => $request->meterNumber,
                                'product' => $request->package,
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
                                'phoneNumber' => auth()->user()->phoneNumber,
                                'amount' => $request->amount,
                                'transactionType' => 'Electricity',
                                'transactionService' => $request->package,
                                'status' => 'CONFIRM',
                                "created_at" => date('Y-m-d H:i:s'),
                                "updated_at" => date('Y-m-d H:i:s'),
                            ]);
                        return back()->with('toast_success', 'Transaction Successful !!');
                    } else {
                        return back()->with('toast_error', 'Oops!!, Kindly reach out to admin');
                    }
                } else {
                    return back()->with('toast_error', 'Oops!!, Meter number failed to verify');
                }
            }
        }
    }
}
