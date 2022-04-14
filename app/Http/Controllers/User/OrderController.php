<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function myorders()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('frontend.orders.order_view', compact('orders', 'user'));
    }    

    public function orderdetails($order_id)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $order = Order::with('state', 'city', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderitem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('frontend.orders.order_details', compact('order', 'orderitem', 'user'));
    }

    public function invoice($order_id)
    {
        $order = Order::with('state', 'city', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderitem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        // return view('frontend.orders.order_invoice', compact('order', 'orderitem', 'user'));
        $pdf = PDF::loadView('frontend.orders.order_invoice', compact('order', 'orderitem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        
        return $pdf->download('invoice.pdf');
    }

    public function returnorder(Request $request, $order_id)
    {
        Order::findOrfail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1
        ]);

        $notification = array(
            'message' => 'Return Request Sent',
            'alert-type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);
    }

    public function cancelorder(Request $request, $order_id)
    {
        Order::findOrfail($order_id)->update([
            'status' => 'Cancelled',
        ]);

        $notification = array(
            'message' => 'Order Cancelled',
            'alert-type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);
    }

    public function trackorder(Request $request)
    {
        $invoice = $request->invoice_number;
        $track = Order::where('invoice_number', $invoice)->where('status', '!=', 'Returned')->first();
        if ($track) 
        {
            // echo "<pre>";
            // print_r($track);
            return view('frontend.tracking.track_order', compact('track'));
        }
        else
        {
            $notification = array(
                'message' => 'Invoice Number not found',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
