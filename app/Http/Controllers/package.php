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

        if ($request->package == "NONE") {
            return back()->with('toast_error', 'Failed transaction');
        } else {
            if ($totalamount < $datapackage->packageAmount) {
                return back()->with('toast_error', 'Insufficient amount for the transaction');
            } else {
                DB::table('transactions')->insert([
                    'transactionId' => $this->randomDigit(),
                    'userId' => auth()->user()->userId,
                    'username' => auth()->user()->username,
                    'email' => auth()->user()->email,
                    'phoneNumber' => auth()->user()->phoneNumber,
                    'amount' => $totalamount,
                    'transactionType' => 'Package Transaction',
                    'transactionService' => 'Package Purchase',
                    'paymentMethod' => 'wallet',
                    'status' => 'CONFIRM',
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ]);
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

                        // points for user
                        $data = DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->where('sponsor', '!=', 'Admin')
                            ->first();
                        $sponsordata = $data->sponsor;
                        $point = 0.05;
                        $oldpoint = $data->point;
                        $newpoint = $oldpoint + $point;

                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['point' => $newpoint]);

                        // add bonuses
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->mySponsorId,
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
                        // points for uplines
                        // upline One

                        $uplineOneData = DB::table('users')
                            ->where('uplineOne', '!=', 'Admin')
                            ->where('mySponsorId', auth()->user()->uplineOne)
                            ->first();
                        if ($uplineOneData != null) {
                            $uplineOnePoint = $uplineOneData->point + $point;
                            DB::table('users')
                                ->where('mySponsorId', auth()->user()->uplineOne)
                                ->update(['point' => $uplineOnePoint]);
                            // upline two
                            $uplineTwoData = DB::table('users')
                                ->where('mySponsorId', auth()->user()->uplineTwo)
                                ->first();
                            if ($uplineTwoData != null) {
                                $uplineTwoPoint = $uplineTwoData->point + $point;
                                DB::table('users')
                                    ->where('mySponsorId', auth()->user()->uplineTwo)
                                    ->update(['point' => $uplineTwoPoint]);
                                // upline three
                                $uplineThreeData = DB::table('users')
                                    ->where('mySponsorId', auth()->user()->uplineThree)
                                    ->first();
                                if ($uplineThreeData != null) {
                                    $uplineThreePoint = $uplineThreeData->point + $point;
                                    DB::table('users')
                                        ->where('mySponsorId', auth()->user()->uplineThree)
                                        ->update(['point' => $uplineThreePoint]);
                                    // upline four
                                    $uplineFourData = DB::table('users')
                                        ->where('mySponsorId', auth()->user()->uplineFour)
                                        ->first();
                                    if ($uplineFourData != null) {
                                        $uplineFourPoint = $uplineFourData->point + $point;
                                        DB::table('users')
                                            ->where('mySponsorId', auth()->user()->uplineFour)
                                            ->update(['point' => $uplineFourPoint]);
                                        // upline Five
                                        $uplineFiveData = DB::table('users')
                                            ->where('mySponsorId', auth()->user()->uplineFive)
                                            ->first();
                                        if ($uplineFiveData != null) {
                                            $uplineFivePoint = $uplineFiveData->point + $point;
                                            DB::table('users')
                                                ->where('mySponsorId', auth()->user()->uplineFive)
                                                ->update(['point' => $uplineFivePoint]);
                                        } else {
                                            return back()->with(
                                                'toast_success',
                                                'Transaction Successful'
                                            );
                                        }
                                    } else {
                                        return back()->with(
                                            'toast_success',
                                            'Transaction Successful'
                                        );
                                    }
                                } else {
                                    return back()->with('toast_success', 'Transaction Successful');
                                }
                            } else {
                                return back()->with('toast_success', 'Transaction Successful');
                            }
                        } else {
                            return back()->with('toast_success', 'Transaction Successful');
                        }
                        // email
                        // return back()->with('toast_success', 'Transaction Successful');
                    } elseif ($request->package == 'Silver') {
                        // return dd('sds');
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
                        $point = 0.125;
                        $oldpoint = $data->point;
                        $newpoint = $oldpoint + $point;

                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['point' => $newpoint]);
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->where('mySponsorId', $sponsordata)
                            ->update(['point' => $newpoint]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->mySponsorId,
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
                        $uplineOneData = DB::table('users')
                            ->where('uplineOne', '!=', 'Admin')
                            ->where('mySponsorId', auth()->user()->uplineOne)
                            ->first();
                        if ($uplineOneData != null) {
                            $uplineOnePoint = $uplineOneData->point + $point;
                            DB::table('users')
                                ->where('mySponsorId', auth()->user()->uplineOne)
                                ->update(['point' => $uplineOnePoint]);
                            // upline two
                            $uplineTwoData = DB::table('users')
                                ->where('mySponsorId', auth()->user()->uplineTwo)
                                ->first();
                            if ($uplineTwoData != null) {
                                $uplineTwoPoint = $uplineTwoData->point + $point;
                                DB::table('users')
                                    ->where('mySponsorId', auth()->user()->uplineTwo)
                                    ->update(['point' => $uplineTwoPoint]);
                                // upline three
                                $uplineThreeData = DB::table('users')
                                    ->where('mySponsorId', auth()->user()->uplineThree)
                                    ->first();
                                if ($uplineThreeData != null) {
                                    $uplineThreePoint = $uplineThreeData->point + $point;
                                    DB::table('users')
                                        ->where('mySponsorId', auth()->user()->uplineThree)
                                        ->update(['point' => $uplineThreePoint]);
                                    // upline four
                                    $uplineFourData = DB::table('users')
                                        ->where('mySponsorId', auth()->user()->uplineFour)
                                        ->first();
                                    if ($uplineFourData != null) {
                                        $uplineFourPoint = $uplineFourData->point + $point;
                                        DB::table('users')
                                            ->where('mySponsorId', auth()->user()->uplineFour)
                                            ->update(['point' => $uplineFourPoint]);
                                        // upline Five
                                        $uplineFiveData = DB::table('users')
                                            ->where('mySponsorId', auth()->user()->uplineFive)
                                            ->first();
                                        if ($uplineFiveData != null) {
                                            $uplineFivePoint = $uplineFiveData->point + $point;
                                            DB::table('users')
                                                ->where('mySponsorId', auth()->user()->uplineFive)
                                                ->update(['point' => $uplineFivePoint]);
                                        } else {
                                            return back()->with(
                                                'toast_success',
                                                'Transaction Successful'
                                            );
                                        }
                                    } else {
                                        return back()->with(
                                            'toast_success',
                                            'Transaction Successful'
                                        );
                                    }
                                } else {
                                    return back()->with('toast_success', 'Transaction Successful');
                                }
                            } else {
                                return back()->with('toast_success', 'Transaction Successful');
                            }
                        } else {
                            return back()->with('toast_success', 'Transaction Successful');
                        }
                        // email
                        // return back()->with('toast_success', 'Transaction Successful');
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
                        $point = 0.25;
                        $oldpoint = $data->point;
                        $newpoint = $oldpoint + $point;

                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['point' => $newpoint]);
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->where('mySponsorId', $sponsordata)
                            ->update(['point' => $newpoint]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->mySponsorId,
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
                        $uplineOneData = DB::table('users')
                            ->where('uplineOne', '!=', 'Admin')
                            ->where('mySponsorId', auth()->user()->uplineOne)
                            ->first();
                        if ($uplineOneData != null) {
                            $uplineOnePoint = $uplineOneData->point + $point;
                            DB::table('users')
                                ->where('mySponsorId', auth()->user()->uplineOne)
                                ->update(['point' => $uplineOnePoint]);
                            // upline two
                            $uplineTwoData = DB::table('users')
                                ->where('mySponsorId', auth()->user()->uplineTwo)
                                ->first();
                            if ($uplineTwoData != null) {
                                $uplineTwoPoint = $uplineTwoData->point + $point;
                                DB::table('users')
                                    ->where('mySponsorId', auth()->user()->uplineTwo)
                                    ->update(['point' => $uplineTwoPoint]);
                                // upline three
                                $uplineThreeData = DB::table('users')
                                    ->where('mySponsorId', auth()->user()->uplineThree)
                                    ->first();
                                if ($uplineThreeData != null) {
                                    $uplineThreePoint = $uplineThreeData->point + $point;
                                    DB::table('users')
                                        ->where('mySponsorId', auth()->user()->uplineThree)
                                        ->update(['point' => $uplineThreePoint]);
                                    // upline four
                                    $uplineFourData = DB::table('users')
                                        ->where('mySponsorId', auth()->user()->uplineFour)
                                        ->first();
                                    if ($uplineFourData != null) {
                                        $uplineFourPoint = $uplineFourData->point + $point;
                                        DB::table('users')
                                            ->where('mySponsorId', auth()->user()->uplineFour)
                                            ->update(['point' => $uplineFourPoint]);
                                        // upline Five
                                        $uplineFiveData = DB::table('users')
                                            ->where('mySponsorId', auth()->user()->uplineFive)
                                            ->first();
                                        if ($uplineFiveData != null) {
                                            $uplineFivePoint = $uplineFiveData->point + $point;
                                            DB::table('users')
                                                ->where('mySponsorId', auth()->user()->uplineFive)
                                                ->update(['point' => $uplineFivePoint]);
                                        } else {
                                            return back()->with(
                                                'toast_success',
                                                'Transaction Successful'
                                            );
                                        }
                                    } else {
                                        return back()->with(
                                            'toast_success',
                                            'Transaction Successful'
                                        );
                                    }
                                } else {
                                    return back()->with('toast_success', 'Transaction Successful');
                                }
                            } else {
                                return back()->with('toast_success', 'Transaction Successful');
                            }
                        } else {
                            return back()->with('toast_success', 'Transaction Successful');
                        }
                        // email
                        // return back()->with('toast_success', 'Transaction Successful');
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
                        $point = 0.5;
                        $oldpoint = $data->point;
                        $newpoint = $oldpoint + $point;

                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update(['point' => $newpoint]);
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->where('mySponsorId', $sponsordata)
                            ->update(['point' => $newpoint]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->mySponsorId,
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
                        $uplineOneData = DB::table('users')
                            ->where('uplineOne', '!=', 'Admin')
                            ->where('mySponsorId', auth()->user()->uplineOne)
                            ->first();
                        if ($uplineOneData != null) {
                            $uplineOnePoint = $uplineOneData->point + $point;
                            DB::table('users')
                                ->where('mySponsorId', auth()->user()->uplineOne)
                                ->update(['point' => $uplineOnePoint]);
                            // upline two
                            $uplineTwoData = DB::table('users')
                                ->where('mySponsorId', auth()->user()->uplineTwo)
                                ->first();
                            if ($uplineTwoData != null) {
                                $uplineTwoPoint = $uplineTwoData->point + $point;
                                DB::table('users')
                                    ->where('mySponsorId', auth()->user()->uplineTwo)
                                    ->update(['point' => $uplineTwoPoint]);
                                // upline three
                                $uplineThreeData = DB::table('users')
                                    ->where('mySponsorId', auth()->user()->uplineThree)
                                    ->first();
                                if ($uplineThreeData != null) {
                                    $uplineThreePoint = $uplineThreeData->point + $point;
                                    DB::table('users')
                                        ->where('mySponsorId', auth()->user()->uplineThree)
                                        ->update(['point' => $uplineThreePoint]);
                                    // upline four
                                    $uplineFourData = DB::table('users')
                                        ->where('mySponsorId', auth()->user()->uplineFour)
                                        ->first();
                                    if ($uplineFourData != null) {
                                        $uplineFourPoint = $uplineFourData->point + $point;
                                        DB::table('users')
                                            ->where('mySponsorId', auth()->user()->uplineFour)
                                            ->update(['point' => $uplineFourPoint]);
                                        // upline Five
                                        $uplineFiveData = DB::table('users')
                                            ->where('mySponsorId', auth()->user()->uplineFive)
                                            ->first();
                                        if ($uplineFiveData != null) {
                                            $uplineFivePoint = $uplineFiveData->point + $point;
                                            DB::table('users')
                                                ->where('mySponsorId', auth()->user()->uplineFive)
                                                ->update(['point' => $uplineFivePoint]);
                                        } else {
                                            return back()->with(
                                                'toast_success',
                                                'Transaction Successful'
                                            );
                                        }
                                    } else {
                                        return back()->with(
                                            'toast_success',
                                            'Transaction Successful'
                                        );
                                    }
                                } else {
                                    return back()->with('toast_success', 'Transaction Successful');
                                }
                            } else {
                                return back()->with('toast_success', 'Transaction Successful');
                            }
                        } else {
                            return back()->with('toast_success', 'Transaction Successful');
                        }
                        // email
                        // return back()->with('toast_success', 'Transaction Successful');
                    } else {
                        return back()->with('toast_error', 'Invalid Transaction');
                    }
                } else {
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

                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->mySponsorId,
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
                        // return dd('sds');
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

                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->mySponsorId,
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

                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->mySponsorId,
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
                        // $data = DB::table('users')
                        //     ->where('userId', auth()->user()->userId)
                        //     ->where('sponsor', '!=', 'Admin')
                        //     ->first();
                        // $sponsordata = $data->sponsor;
                        // $bronzepoint = 0.3;
                        // $oldpoint = $data->point;
                        // $newpoint = $oldpoint + $bronzepoint;

                        // DB::table('users')
                        //     ->where('userId', auth()->user()->userId)
                        //     ->update(['point' => $newpoint]);
                        // DB::table('users')
                        //     ->where('userId', auth()->user()->userId)
                        //     ->where('mySponsorId', $sponsordata)
                        //     ->update(['point' => $newpoint]);
                        bonus::create([
                            'bonusId' => $this->randomDigit(),
                            'sponsor' => auth()->user()->mySponsorId,
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
                }
            }
        }
    }
}
