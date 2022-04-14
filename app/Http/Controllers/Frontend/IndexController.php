<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImgs;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Null_;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'ASC')->get();
        $products = Product::where('status', 1)->orderBy('id', 'ASC')->limit(10)->get();
        $featured = Product::where('status', 1)->where('featured', 1)->orderBy('id', 'ASC')->limit(10)->limit(10)->get();
        $hot_deals = Product::where('status', 1)->where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'ASC')->limit(10)->get();
        $special_offer = Product::where('status', 1)->where('special_offer', 1)->orderBy('id', 'ASC')->limit(10)->limit(10)->get();
        $special_deals = Product::where('status', 1)->where('special_deals', 1)->orderBy('id', 'ASC')->limit(10)->limit(10)->get();

        $category = Category::skip(1)->first();
        $pro = Product::where('status', 1)->where('category_id', $category->id)->orderBy('id', 'ASC')->limit(10)->limit(10)->get();
        $category1 = Category::skip(1)->first();
        $pro1 = Product::where('status', 1)->where('category_id', $category->id)->orderBy('id', 'ASC')->limit(10)->limit(10)->get();

        return view('frontend.index', compact('categories', 'sliders', 'products', 'featured', 'hot_deals', 'special_offer', 'special_deals', 'category', 'pro', 'category1', 'pro1'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'phone' => 'max:10|min:10'
        ]);
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        
        if($request->file('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path');
            if($data->profile_photo_path)
            {
                unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            }
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data->profile_photo_path = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'User profile updated successfully',
            'alert-type' => 'success',
        );
    
        return redirect()->route('dashboard')->with($notification);
    }

    public function changepass()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }

    public function updatepass(Request $request)
    {
        $validate = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashpass = User::find(1)->password;
        if(Hash::check($request->current_password, $hashpass))
        {
            $user = User::find(1);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'User password changed successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('user.logout')->with($notification);
        }
        else
        {
            $notification = array(
                'message' => 'Current password is not valid',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function productdetails($id)
    {
        $product = Product::findOrfail($id);
        $multiimg = MultiImgs::where('product_id', $id)->get();
        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);
        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $color_hin = $product->product_color_hin;
        $product_color_hin = explode(',', $color_hin);
        $size_hin = $product->product_size_hin;
        $product_size_hin = explode(',', $size_hin);
        $cat_id = $product->subsubcategory_id;
        $related = Product::where('subsubcategory_id', $cat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();
        // echo dd($product_color_en);
        // die();
        return view('frontend.product.product_details', compact('product', 'multiimg', 'product_color_en', 'product_color_hin', 'product_size_en', 'product_size_hin', 'related'));
    }

    public function tagproduct($tag)
    {
        $products = Product::where('status', 1)->where('product_tags_en', $tag)->orderBy('id', 'DESC')->paginate(2);
        $categories = Category::orderBy('id', 'DESC')->get();        
        // dd($products);
        // die();
        return view('frontend.tags.tags_view', compact('products', 'categories'));
    }

    public function subproduct($id, $slug)
    {
        $products = Product::where('status', 1)->where('subcategory_id', $id)->orderBy('id', 'DESC')->paginate(2);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();        
        // dd($products);
        // die();
        return view('frontend.product.subcategory_view', compact('products', 'categories'));
    }

    public function subsubproduct($id, $slug)
    {
        $products = Product::where('status', 1)->where('subsubcategory_id', $id)->orderBy('id', 'DESC')->paginate(2);
        
        $categories = Category::orderBy('category_name_en', 'ASC')->get();        
        // dd($products);
        // die();
        return view('frontend.product.subsubcategory_view', compact('products', 'categories'));
    }

    public function productview($id)
    {
        $product = Product::with('category', 'brand')->findOrfail($id);        
        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);
        $color_hin = $product->product_color_hin;
        $product_color_hin = explode(',', $color_hin);
        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);
        $size_hin = $product->product_size_hin;
        $product_size_hin = explode(',', $size_hin);

        return response()->json(array(
            'product' => $product,
            'color_en' => $product_color_en,
            'size_en' => $product_size_en,
            'color_hin' => $product_color_hin,
            'size_hin' => $product_size_hin,
        ));
    }
}
