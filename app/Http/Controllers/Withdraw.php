<?php

namespace App\Http\Controllers;
use App\Models\withdraw as ModelsWithdraw;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Withdraw extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('user.withdraw');
    }
    public function randomDigit(){
        $pass = substr(str_shuffle("0123456789abcDEFGHIJnostXYZ"), 0, 15);
        return $pass;
    }
    
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'withdraw_type' => 'required',
            'bankName' => 'required',
            'accountNumber' => 'required',
            'bankAddress' => 'required', 
            'accountName' => 'required',

        ]);

        if($validator->fails()){
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();

    
        }
        $datadeposit = DB::table('funds')
                ->where('userId', auth()->user()->userId)
                ->where('status', 'CONFIRM')
                ->get();
    
            if($request->withdraw_type == 'Bonus'){
                $databonus = DB::table('bonuses')
                ->where('sponsorId', auth()->user()->mySponsorId)
                ->where('amount', '>', 0)
                ->sum('amount');
    
                $withbon = DB::table('withdraws')
                    ->where('userId', auth()->user()->userId)
                    ->where('status', 'CONFIRM')
                    ->where('paymentType', 'Bonus')
                    ->sum('amount'); 

                $newbon =  $databonus - $withbon;
                if($newbon >= $request->amount){
    
                 if($request->amount >= 0){
                    ModelsWithdraw::create([
                        'transactionId' => $this->randomDigit(),
                        'userId'=> auth()->user()->userId,
                        'username' => auth()->user()->username,
                        'phoneNumber' => auth()->user()->phoneNumber,
                        'email' => auth()->user()->email,
                        'amount' => $request->amount,
                        'paymentType' => $request->withdraw_type,
                        'status' => 'PENDING',
                        'accountName' => $request->accountName,
                        'bankAddress' => $request->bankAddress,
                        'accountNumber' => $request->accountNumber,
                        'bankName' => $request->bankName,
                    
                    ]);
                              
                    return back()->with('toast_success', 'Withdrawal has been created');
                 }else{
                    return back()->with('toast_error', 'Insufficient fund for withdrawal');
    
                }
    
                }else{
                    return back()->with('toast_error', 'Insufficient fund for withdrawal');
    
                }
            }elseif($request->withdraw_type == 'Wallet'){
                $datawallet = DB::table('funds')
                ->where('userId', auth()->user()->userId)
                ->where('amount', '>', 0)
                ->sum('amount');
    
                $withwallet = DB::table('withdraws')
                    ->where('userId', auth()->user()->userId)
                    ->where('status', 'CONFIRM')
                    ->where('paymentType', 'wallet')
                    ->sum('amount'); 
                $newwallet =  $datawallet - $withwallet;
                if($newwallet >= $request->amount){
    
                 if($request->amount >= 0){

                    ModelsWithdraw::create([
                        'transactionId' => $this->randomDigit(),
                        'userId'=> auth()->user()->userId,
                        'username' => auth()->user()->username,
                        'phoneNumber' => auth()->user()->phoneNumber,
                        'email' => auth()->user()->email,
                        'amount' => $request->amount,
                        'paymentType' => $request->withdraw_type,
                        'status' => 'PENDING',
                        'accountName' => $request->accountName,
                        'bankAddress' => $request->bankAddress,
                        'accountNumber' => $request->accountNumber,
                        'bankName' => $request->bankName,
                    
                    ]);
                    
                    return back()->with('toast_success', 'Withdrawal has been created');
                 }else{
                    return back()->with('toast_error', 'Insufficient fund for withdrawal');
    
                }
    
                }else{
                    return back()->with('toast_error', 'Insufficient fund for withdrawal');
    
                }
            }
            else{
                return back()->with('toast_error', 'Oops!! Error Contact Admin');

            }

    }
}
