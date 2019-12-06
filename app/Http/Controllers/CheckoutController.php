<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Session;
use Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\Purchase;

class CheckoutController extends Controller
{
    public function index(){
        return view('checkout');
    }

    public function payment(){
        //set the stripe secret api key
        Stripe::setApiKey("sk_test_r5soUQiov6Mz0Xijz2YgUy4v00D8RZmGr5");

        //get the token
        $token = request()->stripeToken;


        //create charge
        \Stripe\Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'inr',
            'source' => $token,
            'description' => 'laravel stripe payment',
          ]);

        //session success messege
        Session::flash('success','Purchased successfully');

        //destroy the cart
        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new Purchase);

        return redirect('/');
    }
}
