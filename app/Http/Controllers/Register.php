<?php

namespace App\Http\Controllers;

use App\Mail\emailVerify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class Register extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->ref)) {
            $id = $request->ref;
            return view("auth.register")->with('id', $id);
        } else {
            $id = '';

            return view("auth.register")->with('id', $id);
        }
    }
    public function randomDigit()
    {
        $pass = substr(str_shuffle("0123456789"), 0, 12);
        return $pass;
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => ['required', 'unique:users'],
            'email' => ['required', 'unique:users'],
            'phoneNumber' => 'required',
            'password' => ['required', 'max:39', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return back()
                ->with('toast_error', $validator->messages()->all()[0])
                ->withInput();
        }

        if (isset($request->sponsor)) {
            $user = User::create([
                'userId' => $this->randomDigit(),
                'firstName' => $request->firstname,
                'lastName' => $request->lastname,
                'username' => $request->username,
                'email' => $request->email,
                'phoneNumber' => $request->phoneNumber,
                'country' => $request->country,
                'sponsor' => $request->sponsor,
                'mySponsorId' => $this->randomDigit(),
                'status' => 'ACTIVE',
                'emailVerified' => 'NO',
                'password' => Hash::make($request->password),
                'photo' => 'assets/img/user/user-2.jpg',
                'rank' => 'Leader',
                'package' => 'Basic',
                'point' => 0,
                'uplineOne' => 'Admin',
                'uplineTwo' => 'Admin',
                'uplineThree' => 'Admin',
                'uplineFour' => 'Admin',
                'uplineFive' => 'Admin',
                'uplineSix' => 'Admin',
                'uplineSeven' => 'Admin',
                'downlineOne' => 'Admin',
                'downlineTwo' => 'Admin',
                'downlineThree' => 'Admin',
                'downlineFour' => 'Admin',
                'downlineFive' => 'Admin',
                'downlineSix' => 'Admin',
                'downlineSeven' => 'Admin',
            ]);

            // $user->attachRole('user');
            // email......
            // $dat = DB::table('users')->where('username', $request->username)->first();

            // $details = [
            //     'name' => $request->firstName . ' ' . $request->lastName,
            //     'id' => $dat->userId,

            // ];
            // Mail::to($request->email)->send(new emailVerify($details));
            // return 'email sent';

            return back()->withToastSuccess('Please check your email and activate your account');
        } else {
            $user = User::create([
                'userId' => $this->randomDigit(),
                'firstName' => $request->firstname,
                'lastName' => $request->lastname,
                'username' => $request->username,
                'email' => $request->email,
                'phoneNumber' => $request->phoneNumber,
                'country' => $request->country,
                'sponsor' => 'Admin',
                'mySponsorId' => $this->randomDigit(),
                'status' => 'ACTIVE',
                'emailVerified' => 'NO',
                'password' => Hash::make($request->password),
                'photo' => 'assets/img/user/user-2.jpg',
                'rank' => 'Leader',
                'package' => 'Basic',
                'point' => 0,
                'uplineOne' => 'Admin',
                'uplineTwo' => 'Admin',
                'uplineThree' => 'Admin',
                'uplineFour' => 'Admin',
                'uplineFive' => 'Admin',
                'uplineSix' => 'Admin',
                'uplineSeven' => 'Admin',
                'downlineOne' => 'Admin',
                'downlineTwo' => 'Admin',
                'downlineThree' => 'Admin',
                'downlineFour' => 'Admin',
                'downlineFive' => 'Admin',
                'downlineSix' => 'Admin',
                'downlineSeven' => 'Admin',
            ]);

            // $user->attachRole('user');
            // email......

            // $dat = DB::table('users')->where('username', $request->username)->first();
            // $details = [
            //     'name' => $request->firstName . ' ' . $request->lastName,
            //     'id' => $dat->userId,

            // ];
            // Mail::to($request->email)->send(new emailVerify($details));
            // return 'email sent';
            return back()->withToastSuccess('Please check your email and activate your account');
        }
    }
}
