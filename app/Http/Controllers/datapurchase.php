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
            if ($request->network == 'mtn') {
                $api = 'yeuhplp7chfn1oaw0qjkqngnurclh8md';
                $phoneNumber = $request->phoneNumber;
                $productCode = $request->packageMTN;
                $amount = $request->amount;
                $ch = curl_init();
                curl_setopt(
                    $ch,
                    CURLOPT_URL,
                    "https://smartrecharge.ng/api/v2/directdata/?api_key={$api}&product_code={$productCode}&phone={$phoneNumber}"
                );
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POST, true);
                $result = curl_exec($ch);
                $result = json_decode($result);
                return back()->with('toast_success', 'Successful');
            } elseif ($request->network == 'glo') {
                $api = 'yeuhplp7chfn1oaw0qjkqngnurclh8md';
                $phoneNumber = $request->phoneNumber;
                $productCode = $request->packageGLO;
                $amount = $request->amount;
                $ch = curl_init();
                curl_setopt(
                    $ch,
                    CURLOPT_URL,
                    "https://smartrecharge.ng/api/v2/directdata/?api_key={$api}&product_code={$productCode}&phone={$phoneNumber}"
                );
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POST, true);
                $result = curl_exec($ch);
                $result = json_decode($result);
                return back()->with('toast_success', 'Successful');
            } elseif ($request->network == 'airtel') {
                $api = 'yeuhplp7chfn1oaw0qjkqngnurclh8md';
                $phoneNumber = $request->phoneNumber;
                $productCode = $request->packageAirtel;
                $amount = $request->amount;
                $ch = curl_init();
                curl_setopt(
                    $ch,
                    CURLOPT_URL,
                    "https://smartrecharge.ng/api/v2/directdata/?api_key={$api}&product_code={$productCode}&phone={$phoneNumber}"
                );
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POST, true);
                $result = curl_exec($ch);
                $result = json_decode($result);
                return back()->with('toast_success', 'Successful');
            } elseif ($request->network == '9mobile') {
                $api = 'yeuhplp7chfn1oaw0qjkqngnurclh8md';
                $phoneNumber = $request->phoneNumber;
                $productCode = $request->package9MOBILE;
                $amount = $request->amount;
                $ch = curl_init();
                curl_setopt(
                    $ch,
                    CURLOPT_URL,
                    "https://smartrecharge.ng/api/v2/directdata/?api_key={$api}&product_code={$productCode}&phone={$phoneNumber}"
                );
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POST, true);
                $result = curl_exec($ch);
                $result = json_decode($result);
                return back()->with('toast_success', 'Successful');
            } else {
                return back()->with('toast_error', 'Contact Admin');
            }
        }
    }
}
