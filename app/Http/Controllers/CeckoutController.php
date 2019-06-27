<?php

namespace App\Http\Controllers;

use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CeckoutController extends Controller
{
    public  function step1()
    {


        if (Auth::check())
        {
            return view('front.shopping-info');

        }

        else {
            return redirect(url('/login'));
        }

}


    public  function shipping()
    {

return view('front.shopping-info');



    }
    public  function payment()
    {

        return view('front.payment');



    }
    public  function storepayment(Request $request)
    {

            // Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
            \Stripe\Stripe::setApiKey('sk_test_eOlsdnalRg4g6noS7ZVqoo0700QspIe5wz');

        $token=$request->stripeToken;
// Create a Customer:
            $customer = \Stripe\Customer::create([
                'source' => 'tok_mastercard',
                'email' => 'paying.user@example.com',
            ]);

// Charge the Customer instead of the card:
            $charge = \Stripe\Charge::create([
                'amount' => 1000,
                'currency' => 'usd',
                'customer' => $customer->id,
            ]);

// YOUR CODE: Save the customer ID and other info in a database for later.

// When it's time to charge the customer again, retrieve the customer ID.

Order::CreateOrder();

  return "Orderd Completed";
//dd($customer->id);
        Route::get('/charge',function () {

            $customer_id = "cus_F49V1RQ0ZCsf1c";

            \Stripe\Stripe::setApiKey('sk_test_eOlsdnalRg4g6noS7ZVqoo0700QspIe5wz');
            $charge = \Stripe\Charge::create([
                'amount' => 15000, // $15.00 this time
                'currency' => 'usd',
                'customer' => $customer_id, // Previously stored, then retrieved
            ]);
            dd("success charge again");

        });





    }


}
