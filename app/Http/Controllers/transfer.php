<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\withdraw as ModelsWithdraw;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class transfer extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('user.transfer');
    }
    public function randomDigit(){
        $pass = substr(str_shuffle("0123456789abcDEFGHIJnostXYZ"), 0, 15);
        return $pass;
    }

    public function store(Request $request){
            // check if money is on the bonus wallet
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
           // transfer to fund wallet
           DB::table('funds')
           ->insert([
               'transactionId' => $this->randomDigit(),
               'userId' => auth()->user()->userId,
               'name' => auth()->user()->username,
               'email' => auth()->user()->email,
               'amount' => $request->amount,
               'paymentType' => 'Transfer',
               'status' => 'success',
               "created_at" =>  date('Y-m-d H:i:s'),
               "updated_at" => date('Y-m-d H:i:s'),
           ]);
            ModelsWithdraw::create([
                'transactionId' => $this->randomDigit(),
                'userId'=> auth()->user()->userId,
                'username' => auth()->user()->username,
                'phoneNumber' => auth()->user()->phoneNumber,
                'email' => auth()->user()->email,
                'amount' => $request->amount,
                'paymentType' => 'Bonus',
                'status' => 'CONFIRM',
                'accountName' => 'Transfer',
                'bankAddress' => 'Transfer',
                'accountNumber' => 'Transfer',
                'bankName' => 'Transfer',
            
            ]);
                  
            return back()->with('toast_success', 'Transaction Successful !!');
                
            }else{
                    return back()->with('toast_error', 'Insufficient fund');
                }
        }else{
            return back()->with('toast_error', 'Insufficient fund');

        }
    }
}
