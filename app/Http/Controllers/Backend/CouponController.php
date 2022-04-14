<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function couponview()
    {
        $admin = Admin::find(1);
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('backend.coupon.view_coupon', compact('coupons', 'admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'discount' => 'required',
            'validity' => 'required',
        ],[
            'name.required' => 'Field coupon name empty',
            'discount.required' => 'Field discount empty',
        ]);

        Coupon::insert([
            'name' => $request->name,
            'discount' => $request->discount,
            'validity' => $request->validity,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Coupon added successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $admin = Admin::find(1);
        $coupons = Coupon::findOrfail($id);
        return view('backend.coupon.edit_coupon', compact('coupons', 'admin'));
    }

    public function update(Request $request)
    {
        Coupon::findOrfail($request->id)->update([
            'name' => $request->name,
            'discount' => $request->discount,
            'validity' => $request->validity,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Coupon updated successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('manage.coupon')->with($notification);
    }

    public function delete($id)
    {
        Coupon::findOrfail($id)->delete();
        $notification = array(
            'message' => 'Coupon deleted successfully',
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        Coupon::findOrfail($id)->update([
            'status' => 0,
        ]);

        $notification = array(
            'message' => 'Coupon Inactive now',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    public function active($id)
    {
        Coupon::findOrfail($id)->update([
            'status' => 1,
        ]);

        $notification = array(
            'message' => 'Coupon Active now',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }
}
