<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sponsorpackage extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        
        return view('user.sponsorpackage');
    }
}
