<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    public function order(Request $request)
    {
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        if(Session::has('coupon'))
        {
            $total_amount = Session::get('coupon')['total_amount'];
        }
        else
        {
            $getTotal = Cart::total();
            $removeDot = str_replace('.', '', $getTotal);
            $removeComma = str_replace(',','', $removeDot);
            $total_amount = $removeComma / 100;
        }

        $stripe = new \Stripe\StripeClient(
            'sk_test_51KnJTNSFy5Z1PC7ZqN6bE43ucm59kMmkhQUyDJKmTVQtjp69B7kULUz3p5eHLvRaW5pmhU5ErYRaSF1V7YpOc3ja00jJg5IUyn'
          );

        $charge = $stripe->paymentIntents->create([
        'amount' => $total_amount*100,
        'currency' => 'inr',
        'payment_method_types' => ['card'],
        'metadata' => [
            'order_id' => uniqid(),
        ],
        ]);
        // echo $charge->id;
        $id = $charge->id;
        // echo $id;
        
        
        // $stripe = new \Stripe\StripeClient(
        //     'sk_test_51KnJTNSFy5Z1PC7ZqN6bE43ucm59kMmkhQUyDJKmTVQtjp69B7kULUz3p5eHLvRaW5pmhU5ErYRaSF1V7YpOc3ja00jJg5IUyn'
        //   );
          $stripe->paymentIntents->confirm(
            str($id),
            ['payment_method' => 'pm_card_amex_threeDSecureNotSupported']
          );
        //   dd($charge);

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'payment_type' => 'Stripe',
            'transaction_id' => $charge->client_secret,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,
            'invoice_number' => 'EOS'.mt_rand(10000000, 99999999),
            'order_date' => Carbon::now('d F Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now(),
        ]);

        $invoice = Order::findOrfail($order_id);
        $data = [
            'invoice_number' => $invoice->invoice_number,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->email,
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        $carts = Cart::content();
        foreach($carts as $cart)
        {
            $product = Product::where('id', $cart->id)->first();
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'product_name' => $product->product_name_en,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }

        if(Session::has('coupon'))
        {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Order placed successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }
}
