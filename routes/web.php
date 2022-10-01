<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\fund;
use App\Http\Controllers\Login;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\profile;
use App\Http\Controllers\package;
use App\Http\Controllers\member;
use App\Http\Controllers\Register;
use App\Http\Controllers\Withdraw;
use App\Http\Controllers\transfer;
use App\Http\Controllers\sponsorpackage;
use App\Http\Controllers\deposithistory;
use App\Http\Controllers\withdrawhistory;
use App\Http\Controllers\bonushistory;
use App\Http\Controllers\rechargepurchase;
use App\Http\Controllers\datapurchase;
use App\Http\Controllers\logout;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.home');
})->name('home');

Route::get('/aboutus', function () {
    return view('home.aboutus');
})->name('aboutus');

Route::get('/services', function () {
    return view('home.services');
})->name('services');

Route::get('/packages', function () {
    return view('home.packages');
})->name('packages');

Route::get('/contact', function () {
    return view('home.contact');
})->name('contact');

Route::get('/register', [Register::class, "index"])->name('register');
Route::post('/register', [Register::class, "store"])->name('register');

Route::get('/login', [Login::class, "index"])->name('login');
Route::post('/login', [Login::class, "store"])->name('login');

Route::get('/dashboard', [dashboard::class, "index"])->name('dashboard');

Route::get('/profile', [profile::class, "index"])->name('profile');
Route::post('/profile', [profile::class, "updateprofile"])->name('profile');
Route::post('/profilephoto', [profile::class, "photoupdate"])->name('profileimage');
Route::post('/profilepass', [profile::class, "updatepassword"])->name('profilepass');

Route::get('/fund', [fund::class, "index"])->name('fund');

Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');

Route::get('/userpackages', [package::class, "index"])->name('userpackage');
Route::post('/userpackages', [package::class, "store"])->name('userpackage');

Route::get('/withdraw', [Withdraw::class, "index"])->name('withdraw');
Route::post('/withdraw', [Withdraw::class, "store"])->name('withdraw');

Route::get('/sponsorpackage', [sponsorpackage::class, "index"])->name('sponsorpackage');

Route::get('/teammembers', [member::class, "index"])->name('member');

Route::get('/deposithistory', [deposithistory::class, "index"])->name('deposithistory');
Route::get('/withdrawhistory', [withdrawhistory::class, "index"])->name('withdrawhistory');
Route::get('/bonushistory', [bonushistory::class, "index"])->name('bonushistory');

Route::get('/transfer', [transfer::class, 'index'])->name('transfer');
Route::post('/transfer', [transfer::class, 'store'])->name('transfer');

Route::get('/rechargepurchase', [rechargepurchase::class, 'index'])->name('rechargepurchase');
Route::post('/rechargepurchase', [rechargepurchase::class, 'store'])->name('rechargepurchase');

Route::get('/datapurchase', [datapurchase::class, 'index'])->name('datapurchase');
Route::post('/datapurchase', [datapurchase::class, 'store'])->name('datapurchase');

Route::get('/logout', [logout::class, 'logout'])->name('logout');
