<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class profile extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('user.profile');
    }
    public function updateprofile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'lastName' => 'required',
            'firstName' => 'required',
            'phoneNumber' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $data = User::find(auth()->user()->id);
        $data->lastName = $request->lastName;
        $data->firstName = $request->firstName;
        $data->phoneNumber = $request->phoneNumber;

        $data->save();

        return back()->with('toast_success', 'Profile has been updated');
    }

    public function updatepassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'current_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();


            // return back()->with('toast_error', $validator->messages()->all()[0])->withInput();

        }
        // $currentPassword = auth()->user()->password; 

        // return dd($currentPassword);

        $data = User::find(auth()->user()->id);
        $data->password = Hash::make($request->password);
        $data->save();

        Auth::logoutOtherDevices($request->password);

        return redirect()->route('login')->with('toast_success', 'Password has been updated');
    }

    public function photoupdate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required | image',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $data = User::find(auth()->user()->id);
        $input = $request->all();

        if ($image = $request->file('file')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data->photo = "image/$profileImage";
        } else {
            unset($input['photo']);
        }

        $data->save();

        return back()->with('toast_success', 'profile image successfully updated');

        // $filename=$request->file('file')->getClientOriginalName() ;
        // $data->photo = $request->file('file')->storeAs('public/image', $filename) ;
        // $data->save();
        // return back();
    }
}
