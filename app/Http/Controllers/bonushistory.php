<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class bonushistory extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data = DB::table('bonuses')->where('sponsorId', auth()->user()->mySponsorId)->orderByDesc('id')->get();
        return view('user.bonushistory')->with('data', $data);
    }
}
