<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class withdrawhistory extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data = DB::table('withdraws')->where('userId', auth()->user()->userId)->orderByDesc('id')->get();
        return view('user.withdrawhistory')->with('data', $data);
    }
}
