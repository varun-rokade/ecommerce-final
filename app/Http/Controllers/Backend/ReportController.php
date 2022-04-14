<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reports()
    {
        $admin = Admin::find(1);
        return view('backend.reports.report_view', compact('admin'));
    }

    public function searchdate(Request $request)
    {
        $admin = Admin::find(1);
        $date = strtotime($request->date);
        $odate =  date('Y-m-d', $date);
        $orders = Order::where('order_date', $odate)->get();
        return view('backend.reports.reports', compact('admin', 'orders'));
    }

    public function searchmonth(Request $request)
    {
        $admin = Admin::find(1);
        $orders = Order::whereMonth('order_date', $request->month)->whereYear('order_date', $request->year)->get();
        return view('backend.reports.reports', compact('admin', 'orders'));
    }

    public function searchyear(Request $request)
    {
        $admin = Admin::find(1);
        $orders = Order::whereYear('order_date', $request->year1)->get();
        return view('backend.reports.reports', compact('admin', 'orders'));
    }
}
