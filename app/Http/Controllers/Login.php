<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Login extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        if (isset($id)) {

            DB::table('users')
                ->where('userID', $id)
                ->update(['emailVerified' => 'YES']);
            return view('auth.login');
        } else {
            return view("auth.login");
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => ' required',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $loginauth = $request->only('username', 'password');

        if (Auth::attempt($loginauth)) {
            if (auth()->user()->emailVerified == 'YES') {
                if (auth()->user()->status == 'ACTIVE') {

                    $datasponsor =
                        DB::table('users')->where('mySponsorId', auth()->user()->sponsor)->first();
                    $data = DB::table('users')->where('sponsor', auth()->user()->sponsor)->first();
                    if ($datasponsor == null) {
                        if (User::where('sponsor', auth()->user()->sponsor)->exists() && auth()->user()->sponsor != 'Admin') {
                            DB::table('users')->where('userId', auth()->user()->userId)->update([
                                'uplineOne' => $data->sponsor,
                            ]);
                            $dataUplineTwo = DB::table('users')->where('mySponsorId', $data->sponsor)->first();
                            if (User::where('sponsor', $dataUplineTwo->sponsor)->exists() && $dataUplineTwo->sponsor != 'Admin') {
                                DB::table('users')->where('userId', auth()->user()->userId)->update([
                                    'uplineTwo' => $dataUplineTwo->sponsor,
                                ]);
                                $dataUplineThree =
                                    DB::table('users')->where('mySponsorId', $dataUplineTwo->sponsor)->first();
                                if (User::where('sponsor', $dataUplineThree->sponsor)->exists() && $dataUplineThree->sponsor != 'Admin') {
                                    DB::table('users')->where('userId', auth()->user()->userId)->update([
                                        'uplineThree' => $dataUplineThree->sponsor,
                                    ]);
                                    $dataUplineFour = DB::table('users')->where('mySponsorId', $dataUplineThree->sponsor)->first();
                                    if (User::where('sponsor', $dataUplineFour->sponsor)->exists() && $dataUplineFour->sponsor != 'Admin') {
                                        DB::table('users')->where('userId', auth()->user()->userId)->update([
                                            'uplineFour' => $dataUplineFour->sponsor,
                                        ]);
                                        $dataUplineFive = DB::table('users')->where('mySponsorId', $dataUplineFour->sponsor)->first();
                                        if (User::where('sponsor', $dataUplineFive->sponsor)->exists() && $dataUplineFive->sponsor != 'Admin') {
                                            DB::table('users')->where('userId', auth()->user()->userId)->update([
                                                'uplineFive' => $dataUplineFive->sponsor,
                                            ]);
                                            $dataUplineSix = DB::table('users')->where('mySponsorId', $dataUplineFive->sponsor)->first();
                                            if (User::where('sponsor', $dataUplineSix->sponsor)->exists() && $dataUplineSix->sponsor != 'Admin') {
                                                DB::table('users')->where('userId', auth()->user()->userId)->update([
                                                    'uplineFive' => $dataUplineSix->sponsor,
                                                ]);
                                                $dataUplineSeven = DB::table('users')->where('mySponsorId', $dataUplineSix->sponsor)->first();
                                                if (User::where('sponsor', $dataUplineSeven->sponsor)->exists() && $dataUplineSeven->sponsor != 'Admin') {
                                                    DB::table('users')->where('userId', auth()->user()->userId)->update([
                                                        'uplineFive' => $dataUplineSeven->sponsor,
                                                    ]);
                                                    return redirect()->route('dashboard');
                                                } else {
                                                    return redirect()->route('dashboard');
                                                }   
                                            } else {
                                                return redirect()->route('dashboard');
                                            }

                                        } else {
                                            return redirect()->route('dashboard');
                                        }
                                    } else {
                                        return redirect()->route('dashboard');
                                    }
                                } else {
                                    return redirect()->route('dashboard');
                                }
                            } else {
                                return redirect()->route('dashboard');
                            }
                        } else {
                            // We are next
                            return redirect()->route('dashboard');
                        }
                    } else {
                        if (User::where('sponsor', auth()->user()->sponsor)->exists() &&  $datasponsor->downlineOne = 'Admin') {
                            DB::table('users')->where('mySponsorId', auth()->user()->sponsor)->update(['downlineOne', auth()->user()->mySponsorId]);
                        } else if (User::where('sponsor', auth()->user()->sponsor)->exists() &&  $datasponsor->downlineTwo = 'Admin') {
                            DB::table('users')->where('mySponsorId', auth()->user()->sponsor)->update(['downlineTwo', auth()->user()->mySponsorId]);
                        } else if (User::where('sponsor', auth()->user()->sponsor)->exists() && $datasponsor->downlineThree = 'Admin') {
                            DB::table('users')->where('mySponsorId', auth()->user()->sponsor)->update(['downlineThree', auth()->user()->mySponsorId]);
                        } else if (User::where('sponsor', auth()->user()->sponsor)->exists() && $datasponsor->downlineFour = 'Admin') {
                            DB::table('users')->where('mySponsorId', auth()->user()->sponsor)->update(['downlineFour', auth()->user()->mySponsorId]);
                        } else if (User::where('sponsor', auth()->user()->sponsor)->exists() && $datasponsor->downlineFive = 'Admin') {
                            DB::table('users')->where('mySponsorId', auth()->user()->sponsor)->update(['downlineFive', auth()->user()->mySponsorId]);
                        } else if (User::where('sponsor', auth()->user()->sponsor)->exists() && $datasponsor->downlineSeven = 'Admin') {
                            DB::table('users')->where('mySponsorId', auth()->user()->sponsor)->update(['downlineSix', auth()->user()->mySponsorId]);
                        } else if (User::where('sponsor', auth()->user()->sponsor)->exists() && $datasponsor->downlineSeven = 'Admin') {
                        }
                        else {
                            DB::table('users')->where('mySponsorId', auth()->user()->sponsor)->update(['downlineSeven', auth()->user()->mySponsorId]);

                        }
                        $data = DB::table('users')->where('sponsor', auth()->user()->sponsor)->first();
                        if (User::where('sponsor', auth()->user()->sponsor)->exists() && auth()->user()->sponsor != 'Admin') {
                            DB::table('users')->where('userId', auth()->user()->userId)->update([
                                'uplineOne' => $data->sponsor,
                            ]);
                            $dataUplineTwo = DB::table('users')->where('mySponsorId', $data->sponsor)->first();
                            if (User::where('sponsor', $dataUplineTwo->sponsor)->exists() && $dataUplineTwo->sponsor != 'Admin') {
                                DB::table('users')->where('userId', auth()->user()->userId)->update([
                                    'uplineTwo' => $dataUplineTwo->sponsor,
                                ]);
                                $dataUplineThree =
                                    DB::table('users')->where('mySponsorId', $dataUplineTwo->sponsor)->first();
                                if (User::where('sponsor', $dataUplineThree->sponsor)->exists() && $dataUplineThree->sponsor != 'Admin') {
                                    DB::table('users')->where('userId', auth()->user()->userId)->update([
                                        'uplineThree' => $dataUplineThree->sponsor,
                                    ]);
                                    $dataUplineFour = DB::table('users')->where('mySponsorId', $dataUplineThree->sponsor)->first();
                                    if (User::where('sponsor', $dataUplineFour->sponsor)->exists() && $dataUplineFour->sponsor != 'Admin') {
                                        DB::table('users')->where('userId', auth()->user()->userId)->update([
                                            'uplineFour' => $dataUplineFour->sponsor,
                                        ]);
                                        $dataUplineFive = DB::table('users')->where('mySponsorId', $dataUplineFour->sponsor)->first();
                                        if (User::where('sponsor', $dataUplineFive->sponsor)->exists() && $dataUplineFive->sponsor != 'Admin') {
                                            DB::table('users')->where('userId', auth()->user()->userId)->update([
                                                'uplineFive' => $dataUplineFive->sponsor,
                                            ]);
                                            $dataUplineSix = DB::table('users')->where('mySponsorId', $dataUplineFive->sponsor)->first();
                                            if (User::where('sponsor', $dataUplineSix->sponsor)->exists() && $dataUplineSix->sponsor != 'Admin') {
                                                DB::table('users')->where('userId', auth()->user()->userId)->update([
                                                    'uplineFive' => $dataUplineSix->sponsor,
                                                ]);
                                                $dataUplineSeven = DB::table('users')->where('mySponsorId', $dataUplineSix->sponsor)->first();
                                                if (User::where('sponsor', $dataUplineSeven->sponsor)->exists() && $dataUplineSeven->sponsor != 'Admin') {
                                                    DB::table('users')->where('userId', auth()->user()->userId)->update([
                                                        'uplineFive' => $dataUplineSeven->sponsor,
                                                    ]);
                                                    return redirect()->route('dashboard');
                                                } else {
                                                    return redirect()->route('dashboard');
                                                }   
                                            } else {
                                                return redirect()->route('dashboard');
                                            }
                                        } else {
                                            return redirect()->route('dashboard');
                                        }
                                    } else {
                                        return redirect()->route('dashboard');
                                    }
                                } else {
                                    return redirect()->route('dashboard');
                                }
                            } else {
                                return redirect()->route('dashboard');
                            }
                        } else {
                            // We are next
                            return redirect()->route('dashboard');
                        }
                    }
                } else {
                    return back()->with('toast_error', 'Account Blocked!!! Contact the Admin.');
                }
            } else {
                return back()->with('toast_error', 'Email Has Not Been Activated!!! Check Your Email');
            }
        } else {
            return back()->with('toast_error', 'Invalid login details');
        }
    }
}
