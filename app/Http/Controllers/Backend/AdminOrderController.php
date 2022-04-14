<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function pendingorders()
    {
        $admin = Admin::find(1);
        $orders = Order::where('status', 'Pending')->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_orders', compact('orders', 'admin'));
    }

    public function pendingorderdetails($order_id)
    {   
        $admin = Admin::find(1);
        $order = Order::with('state', 'city', 'user')->where('id', $order_id)->first();
        $orderitem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_order_details', compact('order', 'orderitem', 'admin'));
    }

    public function confirmedorders()
    {
        $admin = Admin::find(1);
        $orders = Order::where('status', 'Confirmed')->orderBy('id', 'DESC')->get();
        return view('backend.orders.confirmed_orders', compact('orders', 'admin'));
    }

    public function processingorders()
    {
        $admin = Admin::find(1);
        $orders = Order::where('status', 'Processing')->orderBy('id', 'DESC')->get();
        return view('backend.orders.processing_orders', compact('orders', 'admin'));
    }

    public function shippedorders()
    {
        $admin = Admin::find(1);
        $orders = Order::where('status', 'Shipped')->orderBy('id', 'DESC')->get();
        return view('backend.orders.shipped_orders', compact('orders', 'admin'));
    }

    public function deliveredorders()
    {
        $admin = Admin::find(1);
        $orders = Order::where('status', 'Delivered')->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered_orders', compact('orders', 'admin'));
    }

    public function cancelledorders()
    {
        $admin = Admin::find(1);
        $orders = Order::where('status', 'Cancelled')->orderBy('id', 'DESC')->get();
        return view('backend.orders.cancelled_orders', compact('orders', 'admin'));
    }

    public function pendingtoconfirm($order_id)
    {
        $orders = Order::findOrfail($order_id)->update([
            'status' => 'Confirmed',
        ]);

        $notification = array(
            'message' => 'Order confirmed',
            'alert-type' => 'info'
        );

        return redirect()->route('pending.orders')->with($notification);
    }

    public function confirmtoprocessing($order_id)
    {
        $orders = Order::findOrfail($order_id)->update([
            'status' => 'Processing',
        ]);

        $notification = array(
            'message' => 'Order processed',
            'alert-type' => 'info'
        );

        return redirect()->route('confirmed.orders')->with($notification);
    }

    public function processingtoshipped($order_id)
    {
        $orders = Order::findOrfail($order_id)->update([
            'status' => 'Shipped',
        ]);

        $notification = array(
            'message' => 'Order shipped',
            'alert-type' => 'info'
        );

        return redirect()->route('processing.orders')->with($notification);
    }

    public function shippedtodelivered($order_id)
    {
        $product = OrderItem::where('order_id', $order_id)->get();
        foreach($product as $item)
        {
            Product::where('id', $item->product_id)->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
        }

        $orders = Order::findOrfail($order_id)->update([
            'status' => 'Delivered',
        ]);

        $notification = array(
            'message' => 'Order delivered',
            'alert-type' => 'info'
        );

        return redirect()->route('shipped.orders')->with($notification);
    }

    public function cancelorder($order_id)
    {
        $orders = Order::findOrfail($order_id)->update([
            'status' => 'Cancelled',
        ]);

        $notification = array(
            'message' => 'Order cancelled',
            'alert-type' => 'info'
        );

        return redirect()->route('cancelled.orders')->with($notification);
    }

    public function invoice($order_id)
    {
        $order = Order::with('state', 'city', 'user')->where('id', $order_id)->first();
        $orderitem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        // return view('frontend.orders.order_invoice', compact('order', 'orderitem', 'user'));
        $pdf = PDF::loadView('frontend.orders.order_invoice', compact('order', 'orderitem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        
        return $pdf->download('invoice.pdf');
    }

    public function returnrequests()
    {
        $admin = Admin::find(1);
        $orders = Order::where('return_order', 1)->orderBy('id', 'DESC')->get();

        return view('backend.orders.return_requests', compact('orders', 'admin'));
    }

    public function returnapprove($order_id)
    {
        Order::where('id', $order_id)->update(['return_order' => 2, 'order_status' => 'Returned']);
        $notification = array(
            'message' => 'Return approved',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
