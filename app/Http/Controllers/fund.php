<?php

namespace App\Http\Controllers;

use Paystack;
use Unicodeveloper\Paystack\Facades\Paystack as FacadesPaystack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class fund extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('user.fund');
    }
}
