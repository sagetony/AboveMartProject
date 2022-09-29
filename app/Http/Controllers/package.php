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
    public function index(){
        $data = DB::table('packages')->get();
        return view('user.package')->with('data', $data);
    }
    public function randomDigit()
    {
        $pass = substr(str_shuffle("01234561089abcDEFGHIJnostXYZ"), 0, 15);
        return $pass;
    }
    public function store(Request $request){

        $datapackage = DB::table('packages')->where('packageName', $request->package)->first();
        $walletamount = DB::table('funds')->where('userId', auth()->user()->userId)->sum('amount');
        $withdrawamount = DB::table('withdraws')->where('userId', auth()->user()->userId)->sum('amount');
            $totalamount = $walletamount - $withdrawamount;
            if ($request->package == "NONE"){
                return back()->with('toast_error', 'Failed transaction');
            }else{
                if($totalamount < $datapackage->packageAmount){
                    return back()->with('toast_error', 'Insufficient amount for the transaction');
                }else{
                    
                    if (User::where('sponsor', auth()->user()->sponsor)->exists() && auth()->user()->sponsor != 'Admin') {
                        
                        if($request->package == 'Bronze'){
                            $goldenbonus = 5000;
                            // update
                            DB::table('users')->where('userId', auth()->user()->userId)->update(['package' => $datapackage->packageName]);
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
                            $data = DB::table('users')->where('userId', auth()->user()->userId)->where('sponsor', '!=', 'Admin')->first();
                            $sponsordata = $data->sponsor;
                            $bronzepoint = 0.15;
                            $oldpoint = $data->point;
                            $newpoint = $oldpoint + $bronzepoint;

                            DB::table('users')->where('userId', auth()->user()->userId)->update(['point' => $newpoint]);
                            DB::table('users')->where('userId', auth()->user()->userId)->where('mySponsorId', $sponsordata)->update(['point' => $newpoint]);
                            bonus::create([
                                'bonusId' => $this->randomDigit(),
                                'sponsor' => auth()->user()->username,
                                'sponsorId' => auth()->user()->mySponsorId,
                                'username' => auth()->user()->username,
                                'email' => auth()->user()->email,
                                'amount' => $bonus1000,
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
                                'status' => 'Confirm',
                                'dayCounter' => 0,
                            ]);
                            // email
                            return back()->with('toast_success', 'Transaction Successful');
                        }elseif($request->package == 'Silver'){
                            $goldenbonus = 15000;
                            // update
                            DB::table('users')->where('userId', auth()->user()->userId)->update(['package' => $datapackage->packageName]);
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
                            $data = DB::table('users')->where('userId', auth()->user()->userId)->where('sponsor', '!=', 'Admin')->first();
                            $sponsordata = $data->sponsor;
                            $bronzepoint = 0.2;
                            $oldpoint = $data->point;
                            $newpoint = $oldpoint + $bronzepoint;

                            DB::table('users')->where('userId', auth()->user()->userId)->update(['point' => $newpoint]);
                            DB::table('users')->where('userId', auth()->user()->userId)->where('mySponsorId', $sponsordata)->update(['point' => $newpoint]);
                            bonus::create([
                                'bonusId' => $this->randomDigit(),
                                'sponsor' => auth()->user()->username,
                                'sponsorId' => auth()->user()->mySponsorId,
                                'username' => auth()->user()->username,
                                'email' => auth()->user()->email,
                                'amount' => $bonus1000,
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
                                'status' => 'Confirm',
                                'dayCounter' => 0,
                            ]);
                            // email
                            return back()->with('toast_success', 'Transaction Successful');
                        }elseif($request->package == 'Gold'){
                            $goldenbonus = 30000;
                            // update
                            DB::table('users')->where('userId', auth()->user()->userId)->update(['package' => $datapackage->packageName]);
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
                            $data = DB::table('users')->where('userId', auth()->user()->userId)->where('sponsor', '!=', 'Admin')->first();
                            $sponsordata = $data->sponsor;
                            $bronzepoint = 0.25;
                            $oldpoint = $data->point;
                            $newpoint = $oldpoint + $bronzepoint;

                            DB::table('users')->where('userId', auth()->user()->userId)->update(['point' => $newpoint]);
                            DB::table('users')->where('userId', auth()->user()->userId)->where('mySponsorId', $sponsordata)->update(['point' => $newpoint]);
                            bonus::create([
                                'bonusId' => $this->randomDigit(),
                                'sponsor' => auth()->user()->username,
                                'sponsorId' => auth()->user()->mySponsorId,
                                'username' => auth()->user()->username,
                                'email' => auth()->user()->email,
                                'amount' => $bonus1000,
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
                                'status' => 'Confirm',
                                'dayCounter' => 0,
                            ]);
                            // email
                            return back()->with('toast_success', 'Transaction Successful');
                        }elseif($request->package == 'Platinum'){
                            $goldenbonus = 30000;
                            // update
                            DB::table('users')->where('userId', auth()->user()->userId)->update(['package' => $datapackage->packageName]);
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
                            $data = DB::table('users')->where('userId', auth()->user()->userId)->where('sponsor', '!=', 'Admin')->first();
                            $sponsordata = $data->sponsor;
                            $bronzepoint = 0.3;
                            $oldpoint = $data->point;
                            $newpoint = $oldpoint + $bronzepoint;

                            DB::table('users')->where('userId', auth()->user()->userId)->update(['point' => $newpoint]);
                            DB::table('users')->where('userId', auth()->user()->userId)->where('mySponsorId', $sponsordata)->update(['point' => $newpoint]);
                            bonus::create([
                                'bonusId' => $this->randomDigit(),
                                'sponsor' => auth()->user()->username,
                                'sponsorId' => auth()->user()->mySponsorId,
                                'username' => auth()->user()->username,
                                'email' => auth()->user()->email,
                                'amount' => $bonus1000,
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
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
                                'package' => $request->package ,
                                'status' => 'Confirm',
                                'dayCounter' => 0,
                            ]);
                            // email
                            return back()->with('toast_success', 'Transaction Successful');
                        }else{
                            return back()->with('toast_error', 'Invalid Transaction');
                        }
                        
                        
                    } else{
                            if($request->package == 'Bronze'){
                                $goldenbonus = 5000;
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
                                $data = DB::table('users')->where('userId', auth()->user()->userId)->where('sponsor', 'Admin')->first();
                                $bronzepoint = 0.15;
                                $oldpoint = $data->point;
                                $newpoint = $oldpoint + $bronzepoint;
    
                                DB::table('users')->where('userId', auth()->user()->userId)->update(['point' => $newpoint]);
                                DB::table('users')->where('userId', auth()->user()->userId)->update(['package' => $datapackage->packageName]);
    
                                // Email
                                return back()->with('toast_success', 'Transaction Successful');
                            }elseif($request->package == 'Silver'){
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
                                $data = DB::table('users')->where('userId', auth()->user()->userId)->where('sponsor', 'Admin')->first();
                                $bronzepoint = 0.2;
                                $oldpoint = $data->point;
                                $newpoint = $oldpoint + $bronzepoint;
    
                                DB::table('users')->where('userId', auth()->user()->userId)->update(['point' => $newpoint]);
                                DB::table('users')->where('userId', auth()->user()->userId)->update(['package' => $datapackage->packageName]);
    
                                // Email
                                return back()->with('toast_success', 'Transaction Successful');
                            }elseif($request->package == 'Gold'){
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
                                $data = DB::table('users')->where('userId', auth()->user()->userId)->where('sponsor', 'Admin')->first();
                                $bronzepoint = 0.25;
                                $oldpoint = $data->point;
                                $newpoint = $oldpoint + $bronzepoint;
    
                                DB::table('users')->where('userId', auth()->user()->userId)->update(['point' => $newpoint]);
                                DB::table('users')->where('userId', auth()->user()->userId)->update(['package' => $datapackage->packageName]);
    
                                // Email
                                return back()->with('toast_success', 'Transaction Successful');
                            }elseif($request->package == 'Platinum'){
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
                                $data = DB::table('users')->where('userId', auth()->user()->userId)->where('sponsor', 'Admin')->first();
                                $bronzepoint = 0.3;
                                $oldpoint = $data->point;
                                $newpoint = $oldpoint + $bronzepoint;
    
                                DB::table('users')->where('userId', auth()->user()->userId)->update(['point' => $newpoint]);
                                DB::table('users')->where('userId', auth()->user()->userId)->update(['package' => $datapackage->packageName]);
    
                                // Email
                                return back()->with('toast_success', 'Transaction Successful');
                            }else{
                                return back()->with('toast_error', 'Invalid Transaction');
                            }

                    }
                }
            }
    }

}
