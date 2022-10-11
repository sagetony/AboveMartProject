<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
            return back()->with('toast_error', 'Insufficient Funds');
        } else {
            $api = 'yeuhplp7chfn1oaw0qjkqngnurclh8md';
            $phoneNumber = $request->phoneNumber;
            $productCode = $request->package;
            $amount = $request->amount;
            $ch = curl_init();

            curl_setopt(
                $ch,
                CURLOPT_URL,
                "https://smartrecharge.ng/api/v2/airtime/?api_key={$api}&product_code={$productCode}&phone={$phoneNumber}&amount={$amount}"
            );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POST, true);
            $response = curl_exec($ch);
            $response = json_decode($response);

            // echo $response;
            if ($response->status == true) {
                DB::table('rcpurchases')
                    ->where('userId', auth()->user()->userId)
                    ->insert([
                        'transactionId' => $this->randomDigit(),
                        'userId' => auth()->user()->userId,
                        'username' => auth()->user()->username,
                        'email' => auth()->user()->email,
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
                        'userId' => auth()->user()->userId,
                        'username' => auth()->user()->username,
                        'email' => auth()->user()->email,
                        'phoneNumber' => $request->phoneNumber,
                        'amount' => $request->amount,
                        'transactionType' => 'Recharge Card',
                        'transactionService' => $request->package,
                        'status' => 'CONFIRM',
                        "created_at" => date('Y-m-d H:i:s'),
                        "updated_at" => date('Y-m-d H:i:s'),
                    ]);
                return back()->with('toast_success', 'Transaction Successful !!');
            } else {
                return back()->with('toast_error', 'Oops!!, Kindly reach out to admin');
            }
        }
    }
}
