<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class rechargeprinting extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.rechargeprinting');
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
        if ($balance < $request->package) {
            return back()->with('toast_error', 'Insufficient Funds');
        } else {
            DB::table('rechargeprintings')
                ->where('userId', auth()->user()->userId)
                ->insert([
                    'transactionId' => $this->randomDigit(),
                    'userId' => auth()->user()->userId,
                    'username' => auth()->user()->username,
                    'email' => auth()->user()->email,
                    'phoneNumber' => auth()->user()->phoneNumber,
                    'amount' => $request->package,
                    'network' => $request->network,
                    'networkPlan' => $request->package,
                    'businessName' => $request->businessName,
                    'photo' => '',
                    'rechargecardPin' => 3123123123,
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
                    'phoneNumber' => auth()->user()->phoneNumber,
                    'amount' => $request->package,
                    'transactionType' => 'Recharge Printing',
                    'transactionService' => $request->network,
                    'status' => 'CONFIRM',
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ]);
            return back()->with('toast_success', 'Transaction Successful !!');
        }
    }
}
