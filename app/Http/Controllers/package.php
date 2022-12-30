<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\buypackage;
use App\Models\bonus;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class package extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = DB::table('packages')->get();
        return view('user.package')->with('data', $data);
    }
    public function randomDigit()
    {
        $pass = substr(str_shuffle("01234561089abcDEfadsasfdasdfasdsfa3425542FGHIJnostXYZ"), 0, 30);
        return $pass;
    }
    public function store(Request $request)
    {
        $datapackage = DB::table('packages')
            ->where('packageName', $request->package)
            ->first();
        $walletamount = DB::table('funds')
            ->where('userId', auth()->user()->userId)
            ->sum('amount');
        $withdrawamount = DB::table('withdraws')
            ->where('userId', auth()->user()->userId)
            ->sum('amount');
        $uplineOne = DB::table('users')
            ->where('uplineOne', '!=', 'Admin')
            ->first();
        $uplineTwo = DB::table('users')
            ->where('uplineTwo', '!=', 'Admin')
            ->first();
        $uplineThree = DB::table('users')
            ->where('uplineThree', '!=', 'Admin')
            ->first();
        $uplineFour = DB::table('users')
            ->where('uplineFour', '!=', 'Admin')
            ->first();
        $uplineFive = DB::table('users')
            ->where('uplineFive', '!=', 'Admin')
            ->first();
        $uplineSix = DB::table('users')
            ->where('uplineSix', '!=', 'Admin')
            ->first();
        $uplineSeven = DB::table('users')
            ->where('uplineSeven', '!=', 'Admin')
            ->first();
        $totalamount = $walletamount - $withdrawamount;

        DB::table('transactions')
            ->where('userId', auth()->user()->userId)
            ->insert([
                'transactionId' => $this->randomDigit(),
                'userId' => auth()->user->userId(),
                'username' => auth()->user->username,
                'email' => auth()->user->email,
                'phoneNumber' => auth()->user->phoneNumber,
                'amount' => $request->amount,
                'transactionType' => 'Package Transaction',
                'transactionService' => 'Package Purchase',
                'status' => 'CONFIRM',
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        if ($request->package == "NONE") {
            return back()->with('toast_error', 'Failed transaction');
        } else {
            if ($totalamount < $datapackage->packageAmount) {
                return back()->with('toast_error', 'Insufficient amount for the transaction');
            } else {
                if (
                    User::where('sponsor', auth()->user()->sponsor)->exists() &&
                    auth()->user()->sponsor != 'Admin'
                ) {
                    if ($request->package == 'Bronze') {
                        $goldenbonus = 5000;
                        // update
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['package' => $datapackage->packageName]);
                        // create
                        buypackage::create([
                            'transactionId' => $this->randomDigit(),
                            'userId' => auth()->user()->userId,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'phoneNumber' => auth()->user()->userId,
                            'amount' => $datapackage->packageAmount,
                            'package' => $datapackage->packageName,
                            'goldenBonus' => $goldenbonus,
                            'goldenBonusStatus' => 'Pending',
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        // bonus
                        $bonus1000 = 1000;
                        $bonus500 = 500;
                        $data = DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->where('sponsor', '!=', 'Admin')
                            ->first();
                        $sponsordata = $data->sponsor;
                        $bronzepoint = 0.15;
                        $oldpoint = $data->point;
                        $newpoint = $oldpoint + $bronzepoint;

                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['point' => $newpoint]);
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->where('mySponsorId', $sponsordata)
                            ->update(['point' => $newpoint]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->username,
                            'sponsorId' => auth()->user()->mySponsorId,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus1000,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineOne,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus1000,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineTwo,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineThree,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineFour,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineFive,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineSix,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineSeven,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        // email
                        return back()->with('toast_success', 'Transaction Successful');
                    } elseif ($request->package == 'Silver') {
                        $goldenbonus = 15000;
                        // update
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['package' => $datapackage->packageName]);
                        // create
                        buypackage::create([
                            'transactionId' => $this->randomDigit(),
                            'userId' => auth()->user()->userId,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'phoneNumber' => auth()->user()->userId,
                            'amount' => $datapackage->packageAmount,
                            'package' => $datapackage->packageName,
                            'goldenBonus' => $goldenbonus,
                            'goldenBonusStatus' => 'Pending',
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        // bonus
                        $bonus1000 = 3000;
                        $bonus500 = 1500;
                        $data = DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->where('sponsor', '!=', 'Admin')
                            ->first();
                        $sponsordata = $data->sponsor;
                        $bronzepoint = 0.2;
                        $oldpoint = $data->point;
                        $newpoint = $oldpoint + $bronzepoint;

                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['point' => $newpoint]);
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->where('mySponsorId', $sponsordata)
                            ->update(['point' => $newpoint]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->username,
                            'sponsorId' => auth()->user()->mySponsorId,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus1000,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineOne,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus1000,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineTwo,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineThree,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineFour,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineFive,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineSix,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineSeven,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        // email
                        return back()->with('toast_success', 'Transaction Successful');
                    } elseif ($request->package == 'Gold') {
                        $goldenbonus = 30000;
                        // update
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['package' => $datapackage->packageName]);
                        // create
                        buypackage::create([
                            'transactionId' => $this->randomDigit(),
                            'userId' => auth()->user()->userId,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'phoneNumber' => auth()->user()->userId,
                            'amount' => $datapackage->packageAmount,
                            'package' => $datapackage->packageName,
                            'goldenBonus' => $goldenbonus,
                            'goldenBonusStatus' => 'Pending',
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        // bonus
                        $bonus1000 = 6000;
                        $bonus500 = 3000;
                        $data = DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->where('sponsor', '!=', 'Admin')
                            ->first();
                        $sponsordata = $data->sponsor;
                        $bronzepoint = 0.25;
                        $oldpoint = $data->point;
                        $newpoint = $oldpoint + $bronzepoint;

                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['point' => $newpoint]);
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->where('mySponsorId', $sponsordata)
                            ->update(['point' => $newpoint]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->username,
                            'sponsorId' => auth()->user()->mySponsorId,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus1000,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineOne,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus1000,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineTwo,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineThree,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineFour,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineFive,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineSix,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineSeven,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        // email
                        return back()->with('toast_success', 'Transaction Successful');
                    } elseif ($request->package == 'Platinum') {
                        $goldenbonus = 30000;
                        // update
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['package' => $datapackage->packageName]);
                        // create
                        buypackage::create([
                            'transactionId' => $this->randomDigit(),
                            'userId' => auth()->user()->userId,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'phoneNumber' => auth()->user()->userId,
                            'amount' => $datapackage->packageAmount,
                            'package' => $datapackage->packageName,
                            'goldenBonus' => $goldenbonus,
                            'goldenBonusStatus' => 'Pending',
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        // bonus
                        $bonus1000 = 10000;
                        $bonus500 = 5000;
                        $data = DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->where('sponsor', '!=', 'Admin')
                            ->first();
                        $sponsordata = $data->sponsor;
                        $bronzepoint = 0.3;
                        $oldpoint = $data->point;
                        $newpoint = $oldpoint + $bronzepoint;

                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['point' => $newpoint]);
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->where('mySponsorId', $sponsordata)
                            ->update(['point' => $newpoint]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->username,
                            'sponsorId' => auth()->user()->mySponsorId,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus1000,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineOne,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus1000,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineTwo,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineThree,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineFour,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineFive,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineSix,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->uplineSeven,
                            'sponsorId' => auth()->user()->sponsor,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'amount' => $bonus500,
                            'package' => $request->package,
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        // email
                        return back()->with('toast_success', 'Transaction Successful');
                    } else {
                        return back()->with('toast_error', 'Invalid Transaction');
                    }
                } else {
                    if ($request->package == 'Bronze') {
                        $goldenbonus = 5000;
                        $bronzepoint = 0.15;

                        buypackage::create([
                            'transactionId' => $this->randomDigit(),
                            'userId' => auth()->user()->userId,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'phoneNumber' => auth()->user()->userId,
                            'amount' => $datapackage->packageAmount,
                            'package' => $datapackage->packageName,
                            'goldenBonus' => $goldenbonus,
                            'goldenBonusStatus' => 'Pending',
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);

                        $data = DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->where('sponsor', 'Admin')
                            ->first();
                        $oldpoint = $data->point;
                        $newpoint = $oldpoint + $bronzepoint;

                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['point' => $newpoint]);
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['package' => $datapackage->packageName]);

                        // Bonus Package

                        // Uplines

                        if ($uplineOne != null) {
                            DB::table('bonuses')->insert([
                                'bonusId' => $this->randomDigit(),
                                'sponsor' => auth()->user()->uplineOne,
                                'sponsorId' => auth()->user()->uplineOne,
                                'username' => auth()->user()->username,
                                'email' => auth()->user()->username,
                                'amount' => 1000,
                                'package' => 'Package Bonus',
                                'status' => 'CONFRIM',
                                'dayCounter' => 0,
                                "created_at" => date('Y-m-d H:i:s'),
                                "updated_at" => date('Y-m-d H:i:s'),
                            ]);
                            DB::table('transactions')->insert([
                                'transactionId' => $this->randomDigit(),
                                'userId' => $uplineOne->userId,
                                'username' => $uplineOne->username,
                                'email' => $uplineOne->email,
                                'phoneNumber' => $uplineOne->phoneNumber,
                                'amount' => 1000,
                                'transactionType' => 'Package Bonus',
                                'transactionService' => 'Mentor Bonus',
                                'status' => 'CONFIRM',
                                'paymentMethod' => 'commission',
                                "created_at" => date('Y-m-d H:i:s'),
                                "updated_at" => date('Y-m-d H:i:s'),
                            ]);
                            if (auth()->user()->uplineTwo != 'Admin') {
                                DB::table('bonuses')->insert([
                                    'bonusId' => $this->randomDigit(),
                                    'sponsor' => auth()->user()->uplineTwo,
                                    'sponsorId' => auth()->user()->uplineTwo,
                                    'username' => auth()->user()->username,
                                    'email' => auth()->user()->username,
                                    'amount' => 500,
                                    'package' => 'Package Bonus',
                                    'status' => 'CONFRIM',
                                    'dayCounter' => 0,
                                    "created_at" => date('Y-m-d H:i:s'),
                                    "updated_at" => date('Y-m-d H:i:s'),
                                ]);
                                DB::table('transactions')->insert([
                                    'transactionId' => $this->randomDigit(),
                                    'userId' => $uplineTwo->userId,
                                    'username' => $uplineTwo->username,
                                    'email' => $uplineTwo->email,
                                    'phoneNumber' => $uplineTwo->phoneNumber,
                                    'amount' => 500,
                                    'transactionType' => 'Package Bonus',
                                    'transactionService' => 'Royalty Bonus',
                                    'status' => 'CONFIRM',
                                    'paymentMethod' => 'commission',
                                    "created_at" => date('Y-m-d H:i:s'),
                                    "updated_at" => date('Y-m-d H:i:s'),
                                ]);
                                if (auth()->user()->uplineThree != 'Admin') {
                                    DB::table('bonuses')->insert([
                                        'bonusId' => $this->randomDigit(),
                                        'sponsor' => auth()->user()->uplineThree,
                                        'sponsorId' => auth()->user()->uplineThree,
                                        'username' => auth()->user()->username,
                                        'email' => auth()->user()->username,
                                        'amount' => 500,
                                        'package' => 'Package Bonus',
                                        'status' => 'CONFRIM',
                                        'dayCounter' => 0,
                                        "created_at" => date('Y-m-d H:i:s'),
                                        "updated_at" => date('Y-m-d H:i:s'),
                                    ]);
                                    DB::table('transactions')->insert([
                                        'transactionId' => $this->randomDigit(),
                                        'userId' => $uplineThree->userId,
                                        'username' => $uplineThree->username,
                                        'email' => $uplineThree->email,
                                        'phoneNumber' => $uplineThree->phoneNumber,
                                        'amount' => 500,
                                        'transactionType' => 'Package Bonus',
                                        'transactionService' => 'Royalty Bonus',
                                        'status' => 'CONFIRM',
                                        'paymentMethod' => 'commission',
                                        "created_at" => date('Y-m-d H:i:s'),
                                        "updated_at" => date('Y-m-d H:i:s'),
                                    ]);
                                    if (auth()->user()->uplineFour != 'Admin') {
                                        DB::table('bonuses')->insert([
                                            'bonusId' => $this->randomDigit(),
                                            'sponsor' => auth()->user()->uplineFour,
                                            'sponsorId' => auth()->user()->uplineFour,
                                            'username' => auth()->user()->username,
                                            'email' => auth()->user()->username,
                                            'amount' => 500,
                                            'package' => 'Package Bonus',
                                            'status' => 'CONFRIM',
                                            'dayCounter' => 0,
                                            "created_at" => date('Y-m-d H:i:s'),
                                            "updated_at" => date('Y-m-d H:i:s'),
                                        ]);
                                        DB::table('transactions')->insert([
                                            'transactionId' => $this->randomDigit(),
                                            'userId' => $uplineFour->userId,
                                            'username' => $uplineFour->username,
                                            'email' => $uplineFour->email,
                                            'phoneNumber' => $uplineFour->phoneNumber,
                                            'amount' => 500,
                                            'transactionType' => 'Package Bonus',
                                            'transactionService' => 'Royalty Bonus',
                                            'status' => 'CONFIRM',
                                            'paymentMethod' => 'commission',
                                            "created_at" => date('Y-m-d H:i:s'),
                                            "updated_at" => date('Y-m-d H:i:s'),
                                        ]);
                                        if (auth()->user()->uplineFive != 'Admin') {
                                            DB::table('bonuses')->insert([
                                                'bonusId' => $this->randomDigit(),
                                                'sponsor' => auth()->user()->uplineFive,
                                                'sponsorId' => auth()->user()->uplineFive,
                                                'username' => auth()->user()->username,
                                                'email' => auth()->user()->username,
                                                'amount' => 500,
                                                'package' => 'Package Bonus',
                                                'status' => 'CONFRIM',
                                                'dayCounter' => 0,
                                                "created_at" => date('Y-m-d H:i:s'),
                                                "updated_at" => date('Y-m-d H:i:s'),
                                            ]);
                                            DB::table('transactions')->insert([
                                                'transactionId' => $this->randomDigit(),
                                                'userId' => $uplineFive->userId,
                                                'username' => $uplineFive->username,
                                                'email' => $uplineFive->email,
                                                'phoneNumber' => $uplineFive->phoneNumber,
                                                'amount' => 500,
                                                'transactionType' => 'Package Bonus',
                                                'transactionService' => 'Royalty Bonus',
                                                'status' => 'CONFIRM',
                                                'paymentMethod' => 'commission',
                                                "created_at" => date('Y-m-d H:i:s'),
                                                "updated_at" => date('Y-m-d H:i:s'),
                                            ]);
                                            if (auth()->user()->uplineSix != 'Admin') {
                                                DB::table('bonuses')->insert([
                                                    'bonusId' => $this->randomDigit(),
                                                    'sponsor' => auth()->user()->uplineSix,
                                                    'sponsorId' => auth()->user()->uplineSix,
                                                    'username' => auth()->user()->username,
                                                    'email' => auth()->user()->username,
                                                    'amount' => 500,
                                                    'package' => 'Package Bonus',
                                                    'status' => 'CONFRIM',
                                                    'dayCounter' => 0,
                                                    "created_at" => date('Y-m-d H:i:s'),
                                                    "updated_at" => date('Y-m-d H:i:s'),
                                                ]);
                                                DB::table('transactions')->insert([
                                                    'transactionId' => $this->randomDigit(),
                                                    'userId' => $uplineSix->userId,
                                                    'username' => $uplineSix->username,
                                                    'email' => $uplineSix->email,
                                                    'phoneNumber' => $uplineSix->phoneNumber,
                                                    'amount' => 500,
                                                    'transactionType' => 'Package Bonus',
                                                    'transactionService' => 'Royalty Bonus',
                                                    'status' => 'CONFIRM',
                                                    'paymentMethod' => 'commission',
                                                    "created_at" => date('Y-m-d H:i:s'),
                                                    "updated_at" => date('Y-m-d H:i:s'),
                                                ]);
                                                if (auth()->user()->uplineSeven != 'Admin') {
                                                    DB::table('bonuses')->insert([
                                                        'bonusId' => $this->randomDigit(),
                                                        'sponsor' => auth()->user()->uplineSeven,
                                                        'sponsorId' => auth()->user()->uplineSeven,
                                                        'username' => auth()->user()->username,
                                                        'email' => auth()->user()->username,
                                                        'amount' => 500,
                                                        'package' => 'Package Bonus',
                                                        'status' => 'CONFRIM',
                                                        'dayCounter' => 0,
                                                        "created_at" => date('Y-m-d H:i:s'),
                                                        "updated_at" => date('Y-m-d H:i:s'),
                                                    ]);
                                                    DB::table('transactions')->insert([
                                                        'transactionId' => $this->randomDigit(),
                                                        'userId' => $uplineSeven->userId,
                                                        'username' => $uplineSeven->username,
                                                        'email' => $uplineSeven->email,
                                                        'phoneNumber' => $uplineSeven->phoneNumber,
                                                        'amount' => 500,
                                                        'transactionType' => 'Package Bonus',
                                                        'transactionService' => 'Royalty Bonus',
                                                        'status' => 'CONFIRM',
                                                        'paymentMethod' => 'commission',
                                                        "created_at" => date('Y-m-d H:i:s'),
                                                        "updated_at" => date('Y-m-d H:i:s'),
                                                    ]);
                                                    return back()->with(
                                                        'toast_success',
                                                        'Transaction Successful'
                                                    );
                                                } else {
                                                    DB::table('bonuses')->insert([
                                                        'bonusId' => $this->randomDigit(),
                                                        'sponsor' => auth()->user()->uplineSeven,
                                                        'sponsorId' => auth()->user()->uplineSeven,
                                                        'username' => auth()->user()->username,
                                                        'email' => auth()->user()->username,
                                                        'amount' => 500,
                                                        'package' => 'Package Bonus',
                                                        'status' => 'CONFRIM',
                                                        'dayCounter' => 0,
                                                        "created_at" => date('Y-m-d H:i:s'),
                                                        "updated_at" => date('Y-m-d H:i:s'),
                                                    ]);
                                                    return back()->with(
                                                        'toast_success',
                                                        'Transaction Successful'
                                                    );
                                                }
                                            } else {
                                                DB::table('bonuses')->insert([
                                                    'bonusId' => $this->randomDigit(),
                                                    'sponsor' => auth()->user()->uplineSix,
                                                    'sponsorId' => auth()->user()->uplineSix,
                                                    'username' => auth()->user()->username,
                                                    'email' => auth()->user()->username,
                                                    'amount' => 1000,
                                                    'package' => 'Package Bonus',
                                                    'status' => 'CONFRIM',
                                                    'dayCounter' => 0,
                                                    "created_at" => date('Y-m-d H:i:s'),
                                                    "updated_at" => date('Y-m-d H:i:s'),
                                                ]);
                                                return back()->with(
                                                    'toast_success',
                                                    'Transaction Successful'
                                                );
                                            }
                                        } else {
                                            DB::table('bonuses')->insert([
                                                'bonusId' => $this->randomDigit(),
                                                'sponsor' => auth()->user()->uplineFive,
                                                'sponsorId' => auth()->user()->uplineFive,
                                                'username' => auth()->user()->username,
                                                'email' => auth()->user()->username,
                                                'amount' => 1500,
                                                'package' => 'Package Bonus',
                                                'status' => 'CONFRIM',
                                                'dayCounter' => 0,
                                                "created_at" => date('Y-m-d H:i:s'),
                                                "updated_at" => date('Y-m-d H:i:s'),
                                            ]);
                                            return back()->with(
                                                'toast_success',
                                                'Transaction Successful'
                                            );
                                        }
                                    } else {
                                        DB::table('bonuses')->insert([
                                            'bonusId' => $this->randomDigit(),
                                            'sponsor' => auth()->user()->uplineFour,
                                            'sponsorId' => auth()->user()->uplineFour,
                                            'username' => auth()->user()->username,
                                            'email' => auth()->user()->username,
                                            'amount' => 2000,
                                            'package' => 'Package Bonus',
                                            'status' => 'CONFRIM',
                                            'dayCounter' => 0,
                                            "created_at" => date('Y-m-d H:i:s'),
                                            "updated_at" => date('Y-m-d H:i:s'),
                                        ]);
                                        return back()->with(
                                            'toast_success',
                                            'Transaction Successful'
                                        );
                                    }
                                } else {
                                    DB::table('bonuses')->insert([
                                        'bonusId' => $this->randomDigit(),
                                        'sponsor' => auth()->user()->uplineThree,
                                        'sponsorId' => auth()->user()->uplineThree,
                                        'username' => auth()->user()->username,
                                        'email' => auth()->user()->username,
                                        'amount' => 2500,
                                        'package' => 'Package Bonus',
                                        'status' => 'CONFRIM',
                                        'dayCounter' => 0,
                                        "created_at" => date('Y-m-d H:i:s'),
                                        "updated_at" => date('Y-m-d H:i:s'),
                                    ]);
                                    return back()->with('toast_success', 'Transaction Successful');
                                }
                            } else {
                                DB::table('bonuses')->insert([
                                    'bonusId' => $this->randomDigit(),
                                    'sponsor' => auth()->user()->uplineTwo,
                                    'sponsorId' => auth()->user()->uplineTwo,
                                    'username' => auth()->user()->username,
                                    'email' => auth()->user()->username,
                                    'amount' => 3000,
                                    'package' => 'Package Bonus',
                                    'status' => 'CONFRIM',
                                    'dayCounter' => 0,
                                    "created_at" => date('Y-m-d H:i:s'),
                                    "updated_at" => date('Y-m-d H:i:s'),
                                ]);
                                return back()->with('toast_success', 'Transaction Successful');
                            }
                        } else {
                            DB::table('bonuses')->insert([
                                'bonusId' => $this->randomDigit(),
                                'sponsor' => auth()->user()->uplineOne,
                                'sponsorId' => auth()->user()->uplineOne,
                                'username' => auth()->user()->username,
                                'email' => auth()->user()->username,
                                'amount' => 4000,
                                'package' => 'Package Bonus',
                                'status' => 'CONFRIM',
                                'dayCounter' => 0,
                                "created_at" => date('Y-m-d H:i:s'),
                                "updated_at" => date('Y-m-d H:i:s'),
                            ]);
                            DB::table('transactions')->insert([
                                'transactionId' => $this->randomDigit(),
                                'userId' => auth()->user()->userId,
                                'username' => auth()->user()->username,
                                'email' => auth()->user()->email,
                                'phoneNumber' => auth()->user()->phoneNumber,
                                'amount' => 1000,
                                'transactionType' => 'Package Bonus',
                                'transactionService' => 'Mentee Bonus',
                                'status' => 'CONFIRM',
                                'paymentMethod' => 'commission',
                                "created_at" => date('Y-m-d H:i:s'),
                                "updated_at" => date('Y-m-d H:i:s'),
                            ]);
                            return back()->with('toast_success', 'Transaction Successful');
                        }

                        // Email
                        return back()->with('toast_success', 'Transaction Successful');
                    } elseif ($request->package == 'Silver') {
                        $goldenbonus = 15000;
                        buypackage::create([
                            'transactionId' => $this->randomDigit(),
                            'userId' => auth()->user()->userId,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'phoneNumber' => auth()->user()->userId,
                            'amount' => $datapackage->packageAmount,
                            'package' => $datapackage->packageName,
                            'goldenBonus' => $goldenbonus,
                            'goldenBonusStatus' => 'Pending',
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        $data = DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->where('sponsor', 'Admin')
                            ->first();
                        $bronzepoint = 0.2;
                        $oldpoint = $data->point;
                        $newpoint = $oldpoint + $bronzepoint;

                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['point' => $newpoint]);
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['package' => $datapackage->packageName]);

                        // Bonus Package

                        // Uplines

                        if ($uplineOne != null) {
                            DB::table('bonuses')->insert([
                                'bonusId' => $this->randomDigit(),
                                'sponsor' => auth()->user()->uplineOne,
                                'sponsorId' => auth()->user()->uplineOne,
                                'username' => auth()->user()->username,
                                'email' => auth()->user()->username,
                                'amount' => 3000,
                                'package' => 'Package Bonus',
                                'status' => 'CONFRIM',
                                'dayCounter' => 0,
                                "created_at" => date('Y-m-d H:i:s'),
                                "updated_at" => date('Y-m-d H:i:s'),
                            ]);
                            DB::table('transactions')->insert([
                                'transactionId' => $this->randomDigit(),
                                'userId' => $uplineOne->userId,
                                'username' => $uplineOne->username,
                                'email' => $uplineOne->email,
                                'phoneNumber' => $uplineOne->phoneNumber,
                                'amount' => 3000,
                                'transactionType' => 'Package Bonus',
                                'transactionService' => 'Mentee Bonus',
                                'status' => 'CONFIRM',
                                'paymentMethod' => 'commission',
                                "created_at" => date('Y-m-d H:i:s'),
                                "updated_at" => date('Y-m-d H:i:s'),
                            ]);
                            if (auth()->user()->uplineTwo != 'Admin') {
                                DB::table('bonuses')->insert([
                                    'bonusId' => $this->randomDigit(),
                                    'sponsor' => auth()->user()->uplineTwo,
                                    'sponsorId' => auth()->user()->uplineTwo,
                                    'username' => auth()->user()->username,
                                    'email' => auth()->user()->username,
                                    'amount' => 1500,
                                    'package' => 'Package Bonus',
                                    'status' => 'CONFRIM',
                                    'dayCounter' => 0,
                                    "created_at" => date('Y-m-d H:i:s'),
                                    "updated_at" => date('Y-m-d H:i:s'),
                                ]);
                                DB::table('transactions')->insert([
                                    'transactionId' => $this->randomDigit(),
                                    'userId' => $uplineTwo->userId,
                                    'username' => $uplineTwo->username,
                                    'email' => $uplineTwo->email,
                                    'phoneNumber' => $uplineTwo->phoneNumber,
                                    'amount' => 1500,
                                    'transactionType' => 'Package Bonus',
                                    'transactionService' => 'Royalty Bonus',
                                    'status' => 'CONFIRM',
                                    'paymentMethod' => 'commission',
                                    "created_at" => date('Y-m-d H:i:s'),
                                    "updated_at" => date('Y-m-d H:i:s'),
                                ]);
                                if (auth()->user()->uplineThree != 'Admin') {
                                    DB::table('bonuses')->insert([
                                        'bonusId' => $this->randomDigit(),
                                        'sponsor' => auth()->user()->uplineThree,
                                        'sponsorId' => auth()->user()->uplineThree,
                                        'username' => auth()->user()->username,
                                        'email' => auth()->user()->username,
                                        'amount' => 1500,
                                        'package' => 'Package Bonus',
                                        'status' => 'CONFRIM',
                                        'dayCounter' => 0,
                                        "created_at" => date('Y-m-d H:i:s'),
                                        "updated_at" => date('Y-m-d H:i:s'),
                                    ]);
                                    DB::table('transactions')->insert([
                                        'transactionId' => $this->randomDigit(),
                                        'userId' => $uplineThree->userId,
                                        'username' => $uplineThree->username,
                                        'email' => $uplineThree->email,
                                        'phoneNumber' => $uplineThree->phoneNumber,
                                        'amount' => 1500,
                                        'transactionType' => 'Package Bonus',
                                        'transactionService' => 'Royalty Bonus',
                                        'status' => 'CONFIRM',
                                        'paymentMethod' => 'commission',
                                        "created_at" => date('Y-m-d H:i:s'),
                                        "updated_at" => date('Y-m-d H:i:s'),
                                    ]);
                                    if (auth()->user()->uplineFour != 'Admin') {
                                        DB::table('bonuses')->insert([
                                            'bonusId' => $this->randomDigit(),
                                            'sponsor' => auth()->user()->uplineFour,
                                            'sponsorId' => auth()->user()->uplineFour,
                                            'username' => auth()->user()->username,
                                            'email' => auth()->user()->username,
                                            'amount' => 1500,
                                            'package' => 'Package Bonus',
                                            'status' => 'CONFRIM',
                                            'dayCounter' => 0,
                                            "created_at" => date('Y-m-d H:i:s'),
                                            "updated_at" => date('Y-m-d H:i:s'),
                                        ]);
                                        DB::table('transactions')->insert([
                                            'transactionId' => $this->randomDigit(),
                                            'userId' => $uplineFour->userId,
                                            'username' => $uplineFour->username,
                                            'email' => $uplineFour->email,
                                            'phoneNumber' => $uplineFour->phoneNumber,
                                            'amount' => 1500,
                                            'transactionType' => 'Package Bonus',
                                            'transactionService' => 'Royalty Bonus',
                                            'status' => 'CONFIRM',
                                            'paymentMethod' => 'commission',
                                            "created_at" => date('Y-m-d H:i:s'),
                                            "updated_at" => date('Y-m-d H:i:s'),
                                        ]);
                                        if (auth()->user()->uplineFive != 'Admin') {
                                            DB::table('bonuses')->insert([
                                                'bonusId' => $this->randomDigit(),
                                                'sponsor' => auth()->user()->uplineFive,
                                                'sponsorId' => auth()->user()->uplineFive,
                                                'username' => auth()->user()->username,
                                                'email' => auth()->user()->username,
                                                'amount' => 1500,
                                                'package' => 'Package Bonus',
                                                'status' => 'CONFRIM',
                                                'dayCounter' => 0,
                                                "created_at" => date('Y-m-d H:i:s'),
                                                "updated_at" => date('Y-m-d H:i:s'),
                                            ]);
                                            DB::table('transactions')->insert([
                                                'transactionId' => $this->randomDigit(),
                                                'userId' => $uplineFive->userId,
                                                'username' => $uplineFive->username,
                                                'email' => $uplineFive->email,
                                                'phoneNumber' => $uplineFive->phoneNumber,
                                                'amount' => 1500,
                                                'transactionType' => 'Package Bonus',
                                                'transactionService' => 'Royalty Bonus',
                                                'status' => 'CONFIRM',
                                                'paymentMethod' => 'commission',
                                                "created_at" => date('Y-m-d H:i:s'),
                                                "updated_at" => date('Y-m-d H:i:s'),
                                            ]);
                                            if (auth()->user()->uplineSix != 'Admin') {
                                                DB::table('bonuses')->insert([
                                                    'bonusId' => $this->randomDigit(),
                                                    'sponsor' => auth()->user()->uplineSix,
                                                    'sponsorId' => auth()->user()->uplineSix,
                                                    'username' => auth()->user()->username,
                                                    'email' => auth()->user()->username,
                                                    'amount' => 1500,
                                                    'package' => 'Package Bonus',
                                                    'status' => 'CONFRIM',
                                                    'dayCounter' => 0,
                                                    "created_at" => date('Y-m-d H:i:s'),
                                                    "updated_at" => date('Y-m-d H:i:s'),
                                                ]);
                                                DB::table('transactions')->insert([
                                                    'transactionId' => $this->randomDigit(),
                                                    'userId' => $uplineSix->userId,
                                                    'username' => $uplineSix->username,
                                                    'email' => $uplineSix->email,
                                                    'phoneNumber' => $uplineSix->phoneNumber,
                                                    'amount' => 1500,
                                                    'transactionType' => 'Package Bonus',
                                                    'transactionService' => 'Royalty Bonus',
                                                    'status' => 'CONFIRM',
                                                    'paymentMethod' => 'commission',
                                                    "created_at" => date('Y-m-d H:i:s'),
                                                    "updated_at" => date('Y-m-d H:i:s'),
                                                ]);
                                                if (auth()->user()->uplineSeven != 'Admin') {
                                                    DB::table('bonuses')->insert([
                                                        'bonusId' => $this->randomDigit(),
                                                        'sponsor' => auth()->user()->uplineSeven,
                                                        'sponsorId' => auth()->user()->uplineSeven,
                                                        'username' => auth()->user()->username,
                                                        'email' => auth()->user()->username,
                                                        'amount' => 1500,
                                                        'package' => 'Package Bonus',
                                                        'status' => 'CONFRIM',
                                                        'dayCounter' => 0,
                                                        "created_at" => date('Y-m-d H:i:s'),
                                                        "updated_at" => date('Y-m-d H:i:s'),
                                                    ]);
                                                    DB::table('transactions')->insert([
                                                        'transactionId' => $this->randomDigit(),
                                                        'userId' => $uplineSeven->userId,
                                                        'username' => $uplineSeven->username,
                                                        'email' => $uplineSeven->email,
                                                        'phoneNumber' => $uplineSeven->phoneNumber,
                                                        'amount' => 1500,
                                                        'transactionType' => 'Package Bonus',
                                                        'transactionService' => 'Royalty Bonus',
                                                        'status' => 'CONFIRM',
                                                        'paymentMethod' => 'commission',
                                                        "created_at" => date('Y-m-d H:i:s'),
                                                        "updated_at" => date('Y-m-d H:i:s'),
                                                    ]);
                                                    return back()->with(
                                                        'toast_success',
                                                        'Transaction Successful'
                                                    );
                                                } else {
                                                    DB::table('bonuses')->insert([
                                                        'bonusId' => $this->randomDigit(),
                                                        'sponsor' => auth()->user()->uplineSeven,
                                                        'sponsorId' => auth()->user()->uplineSeven,
                                                        'username' => auth()->user()->username,
                                                        'email' => auth()->user()->username,
                                                        'amount' => 1500,
                                                        'package' => 'Package Bonus',
                                                        'status' => 'CONFRIM',
                                                        'dayCounter' => 0,
                                                        "created_at" => date('Y-m-d H:i:s'),
                                                        "updated_at" => date('Y-m-d H:i:s'),
                                                    ]);
                                                    return back()->with(
                                                        'toast_success',
                                                        'Transaction Successful'
                                                    );
                                                }
                                            } else {
                                                DB::table('bonuses')->insert([
                                                    'bonusId' => $this->randomDigit(),
                                                    'sponsor' => auth()->user()->uplineSix,
                                                    'sponsorId' => auth()->user()->uplineSix,
                                                    'username' => auth()->user()->username,
                                                    'email' => auth()->user()->username,
                                                    'amount' => 3000,
                                                    'package' => 'Package Bonus',
                                                    'status' => 'CONFRIM',
                                                    'dayCounter' => 0,
                                                    "created_at" => date('Y-m-d H:i:s'),
                                                    "updated_at" => date('Y-m-d H:i:s'),
                                                ]);
                                                return back()->with(
                                                    'toast_success',
                                                    'Transaction Successful'
                                                );
                                            }
                                        } else {
                                            DB::table('bonuses')->insert([
                                                'bonusId' => $this->randomDigit(),
                                                'sponsor' => auth()->user()->uplineFive,
                                                'sponsorId' => auth()->user()->uplineFive,
                                                'username' => auth()->user()->username,
                                                'email' => auth()->user()->username,
                                                'amount' => 4500,
                                                'package' => 'Package Bonus',
                                                'status' => 'CONFRIM',
                                                'dayCounter' => 0,
                                                "created_at" => date('Y-m-d H:i:s'),
                                                "updated_at" => date('Y-m-d H:i:s'),
                                            ]);
                                            return back()->with(
                                                'toast_success',
                                                'Transaction Successful'
                                            );
                                        }
                                    } else {
                                        DB::table('bonuses')->insert([
                                            'bonusId' => $this->randomDigit(),
                                            'sponsor' => auth()->user()->uplineFour,
                                            'sponsorId' => auth()->user()->uplineFour,
                                            'username' => auth()->user()->username,
                                            'email' => auth()->user()->username,
                                            'amount' => 5000,
                                            'package' => 'Package Bonus',
                                            'status' => 'CONFRIM',
                                            'dayCounter' => 0,
                                            "created_at" => date('Y-m-d H:i:s'),
                                            "updated_at" => date('Y-m-d H:i:s'),
                                        ]);
                                        return back()->with(
                                            'toast_success',
                                            'Transaction Successful'
                                        );
                                    }
                                } else {
                                    DB::table('bonuses')->insert([
                                        'bonusId' => $this->randomDigit(),
                                        'sponsor' => auth()->user()->uplineThree,
                                        'sponsorId' => auth()->user()->uplineThree,
                                        'username' => auth()->user()->username,
                                        'email' => auth()->user()->username,
                                        'amount' => 7500,
                                        'package' => 'Package Bonus',
                                        'status' => 'CONFRIM',
                                        'dayCounter' => 0,
                                        "created_at" => date('Y-m-d H:i:s'),
                                        "updated_at" => date('Y-m-d H:i:s'),
                                    ]);
                                    return back()->with('toast_success', 'Transaction Successful');
                                }
                            } else {
                                DB::table('bonuses')->insert([
                                    'bonusId' => $this->randomDigit(),
                                    'sponsor' => auth()->user()->uplineTwo,
                                    'sponsorId' => auth()->user()->uplineTwo,
                                    'username' => auth()->user()->username,
                                    'email' => auth()->user()->username,
                                    'amount' => 9000,
                                    'package' => 'Package Bonus',
                                    'status' => 'CONFRIM',
                                    'dayCounter' => 0,
                                    "created_at" => date('Y-m-d H:i:s'),
                                    "updated_at" => date('Y-m-d H:i:s'),
                                ]);
                                return back()->with('toast_success', 'Transaction Successful');
                            }
                        } else {
                            DB::table('bonuses')->insert([
                                'bonusId' => $this->randomDigit(),
                                'sponsor' => auth()->user()->uplineOne,
                                'sponsorId' => auth()->user()->uplineOne,
                                'username' => auth()->user()->username,
                                'email' => auth()->user()->username,
                                'amount' => 12000,
                                'package' => 'Package Bonus',
                                'status' => 'CONFRIM',
                                'dayCounter' => 0,
                                "created_at" => date('Y-m-d H:i:s'),
                                "updated_at" => date('Y-m-d H:i:s'),
                            ]);
                            DB::table('transactions')->insert([
                                'transactionId' => $this->randomDigit(),
                                'userId' => auth()->user()->userId,
                                'username' => auth()->user()->username,
                                'email' => auth()->user()->email,
                                'phoneNumber' => auth()->user()->phoneNumber,
                                'amount' => 3000,
                                'transactionType' => 'Package Bonus',
                                'transactionService' => 'Mentor Bonus',
                                'status' => 'CONFIRM',
                                'paymentMethod' => 'commission',
                                "created_at" => date('Y-m-d H:i:s'),
                                "updated_at" => date('Y-m-d H:i:s'),
                            ]);
                            return back()->with('toast_success', 'Transaction Successful');
                        }

                        // Email
                        return back()->with('toast_success', 'Transaction Successful');
                    } elseif ($request->package == 'Gold') {
                        $goldenbonus = 30000;
                        buypackage::create([
                            'transactionId' => $this->randomDigit(),
                            'userId' => auth()->user()->userId,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'phoneNumber' => auth()->user()->userId,
                            'amount' => $datapackage->packageAmount,
                            'package' => $datapackage->packageName,
                            'goldenBonus' => $goldenbonus,
                            'goldenBonusStatus' => 'Pending',
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        $data = DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->where('sponsor', 'Admin')
                            ->first();
                        $point = 0.25;
                        $oldpoint = $data->point;
                        $newpoint = $oldpoint + $point;

                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['point' => $newpoint]);
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['package' => $datapackage->packageName]);
                        // Bonus Package

                        // Uplines

                        if ($uplineOne != null) {
                            DB::table('bonuses')->insert([
                                'bonusId' => $this->randomDigit(),
                                'sponsor' => auth()->user()->uplineOne,
                                'sponsorId' => auth()->user()->uplineOne,
                                'username' => auth()->user()->username,
                                'email' => auth()->user()->username,
                                'amount' => 6000,
                                'package' => 'Package Bonus',
                                'status' => 'CONFRIM',
                                'dayCounter' => 0,
                                "created_at" => date('Y-m-d H:i:s'),
                                "updated_at" => date('Y-m-d H:i:s'),
                            ]);
                            DB::table('transactions')->insert([
                                'transactionId' => $this->randomDigit(),
                                'userId' => $uplineOne->userId,
                                'username' => $uplineOne->username,
                                'email' => $uplineOne->email,
                                'phoneNumber' => $uplineOne->phoneNumber,
                                'amount' => 6000,
                                'transactionType' => 'Package Bonus',
                                'transactionService' => 'Mentor Bonus',
                                'status' => 'CONFIRM',
                                'paymentMethod' => 'commission',
                                "created_at" => date('Y-m-d H:i:s'),
                                "updated_at" => date('Y-m-d H:i:s'),
                            ]);
                            if (auth()->user()->uplineTwo != 'Admin') {
                                DB::table('bonuses')->insert([
                                    'bonusId' => $this->randomDigit(),
                                    'sponsor' => auth()->user()->uplineTwo,
                                    'sponsorId' => auth()->user()->uplineTwo,
                                    'username' => auth()->user()->username,
                                    'email' => auth()->user()->username,
                                    'amount' => 1500,
                                    'package' => 'Package Bonus',
                                    'status' => 'CONFRIM',
                                    'dayCounter' => 0,
                                    "created_at" => date('Y-m-d H:i:s'),
                                    "updated_at" => date('Y-m-d H:i:s'),
                                ]);
                                DB::table('transactions')->insert([
                                    'transactionId' => $this->randomDigit(),
                                    'userId' => $uplineTwo->userId,
                                    'username' => $uplineTwo->username,
                                    'email' => $uplineTwo->email,
                                    'phoneNumber' => $uplineTwo->phoneNumber,
                                    'amount' => 1500,
                                    'transactionType' => 'Package Bonus',
                                    'transactionService' => 'Royalty Bonus',
                                    'status' => 'CONFIRM',
                                    'paymentMethod' => 'commission',
                                    "created_at" => date('Y-m-d H:i:s'),
                                    "updated_at" => date('Y-m-d H:i:s'),
                                ]);
                                if (auth()->user()->uplineThree != 'Admin') {
                                    DB::table('bonuses')->insert([
                                        'bonusId' => $this->randomDigit(),
                                        'sponsor' => auth()->user()->uplineThree,
                                        'sponsorId' => auth()->user()->uplineThree,
                                        'username' => auth()->user()->username,
                                        'email' => auth()->user()->username,
                                        'amount' => 1500,
                                        'package' => 'Package Bonus',
                                        'status' => 'CONFRIM',
                                        'dayCounter' => 0,
                                        "created_at" => date('Y-m-d H:i:s'),
                                        "updated_at" => date('Y-m-d H:i:s'),
                                    ]);
                                    DB::table('transactions')->insert([
                                        'transactionId' => $this->randomDigit(),
                                        'userId' => $uplineThree->userId,
                                        'username' => $uplineThree->username,
                                        'email' => $uplineThree->email,
                                        'phoneNumber' => $uplineThree->phoneNumber,
                                        'amount' => 1500,
                                        'transactionType' => 'Package Bonus',
                                        'transactionService' => 'Royalty Bonus',
                                        'status' => 'CONFIRM',
                                        'paymentMethod' => 'commission',
                                        "created_at" => date('Y-m-d H:i:s'),
                                        "updated_at" => date('Y-m-d H:i:s'),
                                    ]);
                                    if (auth()->user()->uplineFour != 'Admin') {
                                        DB::table('bonuses')->insert([
                                            'bonusId' => $this->randomDigit(),
                                            'sponsor' => auth()->user()->uplineFour,
                                            'sponsorId' => auth()->user()->uplineFour,
                                            'username' => auth()->user()->username,
                                            'email' => auth()->user()->username,
                                            'amount' => 1500,
                                            'package' => 'Package Bonus',
                                            'status' => 'CONFRIM',
                                            'dayCounter' => 0,
                                            "created_at" => date('Y-m-d H:i:s'),
                                            "updated_at" => date('Y-m-d H:i:s'),
                                        ]);
                                        DB::table('transactions')->insert([
                                            'transactionId' => $this->randomDigit(),
                                            'userId' => $uplineFour->userId,
                                            'username' => $uplineFour->username,
                                            'email' => $uplineFour->email,
                                            'phoneNumber' => $uplineFour->phoneNumber,
                                            'amount' => 1500,
                                            'transactionType' => 'Package Bonus',
                                            'transactionService' => 'Royalty Bonus',
                                            'status' => 'CONFIRM',
                                            'paymentMethod' => 'commission',
                                            "created_at" => date('Y-m-d H:i:s'),
                                            "updated_at" => date('Y-m-d H:i:s'),
                                        ]);
                                        if (auth()->user()->uplineFive != 'Admin') {
                                            DB::table('bonuses')->insert([
                                                'bonusId' => $this->randomDigit(),
                                                'sponsor' => auth()->user()->uplineFive,
                                                'sponsorId' => auth()->user()->uplineFive,
                                                'username' => auth()->user()->username,
                                                'email' => auth()->user()->username,
                                                'amount' => 1500,
                                                'package' => 'Package Bonus',
                                                'status' => 'CONFRIM',
                                                'dayCounter' => 0,
                                                "created_at" => date('Y-m-d H:i:s'),
                                                "updated_at" => date('Y-m-d H:i:s'),
                                            ]);
                                            DB::table('transactions')->insert([
                                                'transactionId' => $this->randomDigit(),
                                                'userId' => $uplineFive->userId,
                                                'username' => $uplineFive->username,
                                                'email' => $uplineFive->email,
                                                'phoneNumber' => $uplineFive->phoneNumber,
                                                'amount' => 1500,
                                                'transactionType' => 'Package Bonus',
                                                'transactionService' => 'Royalty Bonus',
                                                'status' => 'CONFIRM',
                                                'paymentMethod' => 'commission',
                                                "created_at" => date('Y-m-d H:i:s'),
                                                "updated_at" => date('Y-m-d H:i:s'),
                                            ]);
                                            if (auth()->user()->uplineSix != 'Admin') {
                                                DB::table('bonuses')->insert([
                                                    'bonusId' => $this->randomDigit(),
                                                    'sponsor' => auth()->user()->uplineSix,
                                                    'sponsorId' => auth()->user()->uplineSix,
                                                    'username' => auth()->user()->username,
                                                    'email' => auth()->user()->username,
                                                    'amount' => 1500,
                                                    'package' => 'Package Bonus',
                                                    'status' => 'CONFRIM',
                                                    'dayCounter' => 0,
                                                    "created_at" => date('Y-m-d H:i:s'),
                                                    "updated_at" => date('Y-m-d H:i:s'),
                                                ]);
                                                DB::table('transactions')->insert([
                                                    'transactionId' => $this->randomDigit(),
                                                    'userId' => $uplineSix->userId,
                                                    'username' => $uplineSix->username,
                                                    'email' => $uplineSix->email,
                                                    'phoneNumber' => $uplineSix->phoneNumber,
                                                    'amount' => 1500,
                                                    'transactionType' => 'Package Bonus',
                                                    'transactionService' => 'Royalty Bonus',
                                                    'status' => 'CONFIRM',
                                                    'paymentMethod' => 'commission',
                                                    "created_at" => date('Y-m-d H:i:s'),
                                                    "updated_at" => date('Y-m-d H:i:s'),
                                                ]);
                                                if (auth()->user()->uplineSeven != 'Admin') {
                                                    DB::table('bonuses')->insert([
                                                        'bonusId' => $this->randomDigit(),
                                                        'sponsor' => auth()->user()->uplineSeven,
                                                        'sponsorId' => auth()->user()->uplineSeven,
                                                        'username' => auth()->user()->username,
                                                        'email' => auth()->user()->username,
                                                        'amount' => 1500,
                                                        'package' => 'Package Bonus',
                                                        'status' => 'CONFRIM',
                                                        'dayCounter' => 0,
                                                        "created_at" => date('Y-m-d H:i:s'),
                                                        "updated_at" => date('Y-m-d H:i:s'),
                                                    ]);
                                                    DB::table('transactions')->insert([
                                                        'transactionId' => $this->randomDigit(),
                                                        'userId' => $uplineSeven->userId,
                                                        'username' => $uplineSeven->username,
                                                        'email' => $uplineSeven->email,
                                                        'phoneNumber' => $uplineSeven->phoneNumber,
                                                        'amount' => 1500,
                                                        'transactionType' => 'Package Bonus',
                                                        'transactionService' => 'Royalty Bonus',
                                                        'status' => 'CONFIRM',
                                                        'paymentMethod' => 'commission',
                                                        "created_at" => date('Y-m-d H:i:s'),
                                                        "updated_at" => date('Y-m-d H:i:s'),
                                                    ]);
                                                    return back()->with(
                                                        'toast_success',
                                                        'Transaction Successful'
                                                    );
                                                } else {
                                                    DB::table('bonuses')->insert([
                                                        'bonusId' => $this->randomDigit(),
                                                        'sponsor' => auth()->user()->uplineSeven,
                                                        'sponsorId' => auth()->user()->uplineSeven,
                                                        'username' => auth()->user()->username,
                                                        'email' => auth()->user()->username,
                                                        'amount' => 1500,
                                                        'package' => 'Package Bonus',
                                                        'status' => 'CONFRIM',
                                                        'dayCounter' => 0,
                                                        "created_at" => date('Y-m-d H:i:s'),
                                                        "updated_at" => date('Y-m-d H:i:s'),
                                                    ]);
                                                    return back()->with(
                                                        'toast_success',
                                                        'Transaction Successful'
                                                    );
                                                }
                                            } else {
                                                DB::table('bonuses')->insert([
                                                    'bonusId' => $this->randomDigit(),
                                                    'sponsor' => auth()->user()->uplineSix,
                                                    'sponsorId' => auth()->user()->uplineSix,
                                                    'username' => auth()->user()->username,
                                                    'email' => auth()->user()->username,
                                                    'amount' => 3000,
                                                    'package' => 'Package Bonus',
                                                    'status' => 'CONFRIM',
                                                    'dayCounter' => 0,
                                                    "created_at" => date('Y-m-d H:i:s'),
                                                    "updated_at" => date('Y-m-d H:i:s'),
                                                ]);
                                                return back()->with(
                                                    'toast_success',
                                                    'Transaction Successful'
                                                );
                                            }
                                        } else {
                                            DB::table('bonuses')->insert([
                                                'bonusId' => $this->randomDigit(),
                                                'sponsor' => auth()->user()->uplineFive,
                                                'sponsorId' => auth()->user()->uplineFive,
                                                'username' => auth()->user()->username,
                                                'email' => auth()->user()->username,
                                                'amount' => 4500,
                                                'package' => 'Package Bonus',
                                                'status' => 'CONFRIM',
                                                'dayCounter' => 0,
                                                "created_at" => date('Y-m-d H:i:s'),
                                                "updated_at" => date('Y-m-d H:i:s'),
                                            ]);
                                            return back()->with(
                                                'toast_success',
                                                'Transaction Successful'
                                            );
                                        }
                                    } else {
                                        DB::table('bonuses')->insert([
                                            'bonusId' => $this->randomDigit(),
                                            'sponsor' => auth()->user()->uplineFour,
                                            'sponsorId' => auth()->user()->uplineFour,
                                            'username' => auth()->user()->username,
                                            'email' => auth()->user()->username,
                                            'amount' => 5000,
                                            'package' => 'Package Bonus',
                                            'status' => 'CONFRIM',
                                            'dayCounter' => 0,
                                            "created_at" => date('Y-m-d H:i:s'),
                                            "updated_at" => date('Y-m-d H:i:s'),
                                        ]);
                                        return back()->with(
                                            'toast_success',
                                            'Transaction Successful'
                                        );
                                    }
                                } else {
                                    DB::table('bonuses')->insert([
                                        'bonusId' => $this->randomDigit(),
                                        'sponsor' => auth()->user()->uplineThree,
                                        'sponsorId' => auth()->user()->uplineThree,
                                        'username' => auth()->user()->username,
                                        'email' => auth()->user()->username,
                                        'amount' => 7500,
                                        'package' => 'Package Bonus',
                                        'status' => 'CONFRIM',
                                        'dayCounter' => 0,
                                        "created_at" => date('Y-m-d H:i:s'),
                                        "updated_at" => date('Y-m-d H:i:s'),
                                    ]);
                                    return back()->with('toast_success', 'Transaction Successful');
                                }
                            } else {
                                DB::table('bonuses')->insert([
                                    'bonusId' => $this->randomDigit(),
                                    'sponsor' => auth()->user()->uplineTwo,
                                    'sponsorId' => auth()->user()->uplineTwo,
                                    'username' => auth()->user()->username,
                                    'email' => auth()->user()->username,
                                    'amount' => 9000,
                                    'package' => 'Package Bonus',
                                    'status' => 'CONFRIM',
                                    'dayCounter' => 0,
                                    "created_at" => date('Y-m-d H:i:s'),
                                    "updated_at" => date('Y-m-d H:i:s'),
                                ]);
                                return back()->with('toast_success', 'Transaction Successful');
                            }
                        } else {
                            DB::table('bonuses')->insert([
                                'bonusId' => $this->randomDigit(),
                                'sponsor' => auth()->user()->uplineOne,
                                'sponsorId' => auth()->user()->uplineOne,
                                'username' => auth()->user()->username,
                                'email' => auth()->user()->username,
                                'amount' => 24000,
                                'package' => 'Package Bonus',
                                'status' => 'CONFRIM',
                                'dayCounter' => 0,
                                "created_at" => date('Y-m-d H:i:s'),
                                "updated_at" => date('Y-m-d H:i:s'),
                            ]);
                            DB::table('transactions')->insert([
                                'transactionId' => $this->randomDigit(),
                                'userId' => auth()->user()->userId,
                                'username' => auth()->user()->username,
                                'email' => auth()->user()->email,
                                'phoneNumber' => auth()->user()->phoneNumber,
                                'amount' => 6000,
                                'transactionType' => 'Package Bonus',
                                'transactionService' => 'Mentee Bonus',
                                'status' => 'CONFIRM',
                                'paymentMethod' => 'commission',
                                "created_at" => date('Y-m-d H:i:s'),
                                "updated_at" => date('Y-m-d H:i:s'),
                            ]);
                            return back()->with('toast_success', 'Transaction Successful');
                        }
                        // Email
                        return back()->with('toast_success', 'Transaction Successful');
                    } elseif ($request->package == 'Platinum') {
                        $goldenbonus = 50000;
                        buypackage::create([
                            'transactionId' => $this->randomDigit(),
                            'userId' => auth()->user()->userId,
                            'username' => auth()->user()->username,
                            'email' => auth()->user()->email,
                            'phoneNumber' => auth()->user()->userId,
                            'amount' => $datapackage->packageAmount,
                            'package' => $datapackage->packageName,
                            'goldenBonus' => $goldenbonus,
                            'goldenBonusStatus' => 'Pending',
                            'status' => 'Confirm',
                            'dayCounter' => 0,
                        ]);
                        $data = DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->where('sponsor', 'Admin')
                            ->first();
                        $bronzepoint = 0.3;
                        $oldpoint = $data->point;
                        $newpoint = $oldpoint + $bronzepoint;

                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['point' => $newpoint]);
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['package' => $datapackage->packageName]);

                        // Email
                        return back()->with('toast_success', 'Transaction Successful');
                    } else {
                        return back()->with('toast_error', 'Invalid Transaction');
                    }
                }
            }
        }
    }
}
