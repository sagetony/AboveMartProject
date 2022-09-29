<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use Unicodeveloper\Paystack\Facades\Paystack as FacadesPaystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try {
            return FacadesPaystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = FacadesPaystack::getPaymentData();
        if ($paymentDetails['status'] == true) {

            DB::table('funds')
                ->insert([
                    'transactionId' => $paymentDetails['data']['reference'],
                    'userId' => auth()->user()->userId,
                    'name' => auth()->user()->username,
                    'email' => $paymentDetails['data']['customer']['email'],
                    'amount' => $paymentDetails['data']['amount'] / 100,
                    'paymentType' => 'Wallet',
                    'status' => 'success',
                    "created_at" =>  date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ]);
            return back()->with('toast_success', 'Transaction Successful !!');
        } else {
            return back()->with('toast_error', 'Failed transaction');
        }

        // amount rounded 

        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
