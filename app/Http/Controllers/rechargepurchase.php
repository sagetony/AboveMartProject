<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\recharge;

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
            $api = getenv('TELECOM_API');
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
                if ($request->payment == 'wallet') {
                    DB::table('transactions')->insert([
                        'transactionId' => $this->randomDigit(),
                        'userId' => auth()->user()->userId,
                        'username' => auth()->user()->username,
                        'email' => auth()->user()->email,
                        'phoneNumber' => $request->phoneNumber,
                        'amount' => $request->amount,
                        'transactionType' => 'Recharge Card',
                        'transactionService' => $request->package,
                        'status' => 'CONFIRM',
                        'paymentMethod' => 'wallet',
                        "created_at" => date('Y-m-d H:i:s'),
                        "updated_at" => date('Y-m-d H:i:s'),
                    ]);
                    // email......
                    $userData = DB::table('users')
                        ->where('userId', auth()->user()->username)
                        ->first();

                    $details = [
                        'name' => auth()->user()->firstName . ' ' . auth()->user()->lastName,
                        'amount' => $request->amount,
                        'network' => $request->package,
                        'date' => date('Y-m-d H:i:s'),
                    ];
                    Mail::to(auth()->user()->email)->send(new recharge($details));
                    return back()->with('toast_success', 'Transaction Successful !!');
                } elseif ($request->payment == 'epin') {
                    DB::table('transactions')->insert([
                        'transactionId' => $this->randomDigit(),
                        'userId' => auth()->user()->userId,
                        'username' => auth()->user()->username,
                        'email' => auth()->user()->email,
                        'phoneNumber' => $request->phoneNumber,
                        'amount' => $request->amount,
                        'transactionType' => 'Recharge Card',
                        'transactionService' => $request->package,
                        'status' => 'CONFIRM',
                        'paymentMethod' => 'epin',
                        "created_at" => date('Y-m-d H:i:s'),
                        "updated_at" => date('Y-m-d H:i:s'),
                    ]);
                    // email......
                    $userData = DB::table('users')
                        ->where('userId', auth()->user()->username)
                        ->first();

                    $details = [
                        'name' => auth()->user()->firstName . ' ' . auth()->user()->lastName,
                        'amount' => $request->amount,
                        'network' => $request->package,
                        'date' => date('Y-m-d H:i:s'),
                    ];
                    Mail::to(auth()->user()->email)->send(new recharge($details));
                    return back()->with('toast_success', 'Transaction Successful !!');
                } elseif ($request->payment == 'promo') {
                    DB::table('transactions')->insert([
                        'transactionId' => $this->randomDigit(),
                        'userId' => auth()->user()->userId,
                        'username' => auth()->user()->username,
                        'email' => auth()->user()->email,
                        'phoneNumber' => $request->phoneNumber,
                        'amount' => $request->amount,
                        'transactionType' => 'Recharge Card',
                        'transactionService' => $request->package,
                        'status' => 'CONFIRM',
                        'paymentMethod' => 'promo',
                        "created_at" => date('Y-m-d H:i:s'),
                        "updated_at" => date('Y-m-d H:i:s'),
                    ]);
                    // email......
                    $userData = DB::table('users')
                        ->where('userId', auth()->user()->username)
                        ->first();

                    $details = [
                        'name' => auth()->user()->firstName . ' ' . auth()->user()->lastName,
                        'amount' => $request->amount,
                        'network' => $request->package,
                        'date' => date('Y-m-d H:i:s'),
                    ];
                    Mail::to(auth()->user()->email)->send(new recharge($details));
                    return back()->with('toast_success', 'Transaction Successful !!');
                } else {
                    return back()->with('toast_error', 'Oops!!, Kindly reach out to admin');
                }
            } else {
                return back()->with('toast_error', 'Oops!!, Kindly reach out to admin');
            }
        }
    }
}
