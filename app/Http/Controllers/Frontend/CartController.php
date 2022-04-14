<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\State;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addtocart(Request $request, $id)
    {
        $product = Product::findOrfail($id);
        echo $request->color;
        
        if ($product->discount_price == NULL) 
        {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name_en,
                'qty' => $request->qty, 
                'price' => $product->selling_price, 
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color_en,
                    'size' => $request->size_en,
                ],
            ]);    
            return response()->json(['success' => 'Product Added to Cart']);
        }
        else
        {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name_en,
                'qty' => $request->qty, 
                'price' => $product->discount_price, 
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color_en,
                    'size' => $request->size_en,
                ],
            ]);
            return response()->json(['success' => 'Product Added to Cart']);
        }
    }

    public function minicart()
    {
        $cart = Cart::content();
        $cartqty = Cart::count();
        $carttotal = Cart::total();
        $carttotal = $carttotal;
        return response()->json(array(
            'cart' => $cart,
            'cartqty' => $cartqty,
            'carttotal' => $carttotal,
        ));
    }

    public function removeminicart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product removed from Cart']);
    }

    public function mycart()
    {
        return view('frontend.wishlist.view_mycart');
    }

    public function getcart()
    {
        $cart = Cart::content();
        $cartqty = Cart::count();
        $carttotal = Cart::total();
        $carttotal = $carttotal;
        return response()->json(array(
            'cart' => $cart,
            'cartqty' => $cartqty,
            'carttotal' => $carttotal,
        ));
    }

    public function removecart($rowid)
    {
        Cart::remove($rowid);
        if (Session::has('coupon')) 
        {
            Session::forget('coupon');
        }
        return response()->json(['success' => 'Product removed from Cart']);
    }

    public function cartincrement($rowid)
    {
        $row = Cart::get($rowid);
        Cart::update($rowid, $row->qty + 1);
        if (Session::has('coupon')) 
        {

            $name = Session::get('coupon')['name'];
            $coupon = Coupon::where('name',$name)->first();
            $getTotal = Cart::total();
            $removeDot = str_replace('.', '', $getTotal);
            $removeComma = str_replace(',','', $removeDot);
            $cartTotal = $removeComma / 100;
            Session::put('coupon',[
                'name' => $coupon->name,
                'discount' => $coupon->discount,
                'discount_amount' => $cartTotal * $coupon->discount/100,
                'total_amount' => $cartTotal - $cartTotal * $coupon->discount/100
            ]);
        }
        return response()->json(['success' => 'Quantity increased']);
    }

    public function cartdecrement($rowid)
    {
        $row = Cart::get($rowid);
        Cart::update($rowid, $row->qty - 1);
        if (Session::has('coupon')) {

            $name = Session::get('coupon')['name'];
            $coupon = Coupon::where('name',$name)->first();
            $getTotal = Cart::total();
            $removeDot = str_replace('.', '', $getTotal);
            $removeComma = str_replace(',','', $removeDot);
            $cartTotal = $removeComma / 100;
            Session::put('coupon',[
                'name' => $coupon->name,
                'discount' => $coupon->discount,
                'discount_amount' => $cartTotal * $coupon->discount/100,
                'total_amount' => $cartTotal - $cartTotal * $coupon->discount/100
            ]);
        }
        return response()->json(['success' => 'Quantity decreased']);
    }

    public function applycoupon(Request $request)
    {
        $coupon = Coupon::where('name', $request->coupon)->where('validity', '>=', Carbon::now()->format('Y-m-d'))->where('status', 1)->first();
        if ($coupon) 
        {
            $getTotal = Cart::total();
            $removeDot = str_replace('.', '', $getTotal);
            $removeComma = str_replace(',','', $removeDot);
            $cartTotal = $removeComma / 100;

            Session::put('coupon', [
                'name' => $coupon->name,
                'discount' => $coupon->discount,
                'discount_amount' => $cartTotal * $coupon->discount/100,
                'total_amount' => $cartTotal - $cartTotal * $coupon->discount/100
            ]);
            return response()->json(array(
                'validity' => true,
                'success' => 'Coupon applied',
            ));
        }
        else
        {
            return response()->json(['error' => 'Coupon Invalid']);
        }
    }

    public function couponcal()
    {
        if (Session::has('coupon')) 
        {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'name' => session()->get('coupon')['name'],
                'discount' => session()->get('coupon')['discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        }
        else
        {
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
    }

    public function removecoupon()
    {
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon removed']);
    }

    public function checkout()
    {
        if (Auth::check()) 
        {
            if (Cart::total() > 0) 
            {
                $cart = Cart::content();
                $cartqty = Cart::count();
                $carttotal = Cart::total();
                $data = State::get();
                return view('frontend.checkout.checkout_view', compact('cart', 'cartqty', 'carttotal', 'data'));
            }
            else
            {
                $notification = array(
                    'message' => 'Cart empty',
                    'alert-type' => 'error',
                );
                return redirect()->to('/')->with($notification);
            }
        }
        else
        {
            $notification = array(
                'message' => 'You need to login first',
                'alert-type' => 'error',
            );
            return redirect()->route('login')->with($notification);
        }
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
}
