<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkoutstore(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['postal_code'] = $request->postal_code;
        $data['state'] = $request->state;
        $data['city'] = $request->city;
        $data['address'] = $request->address;
        $data['payment_method'] = $request->payment_method;
        $carttotal = Cart::total();
        if($request->payment_method == 'stripe')
        {
            return view('frontend.payment.stripe', compact('data', 'carttotal'));
        }
        elseif($request->payment_method == 'card')
        {
            return 'card';
        }
        else
        {
            return view('frontend.payment.cash', compact('data', 'carttotal'));
        }
    }
}
