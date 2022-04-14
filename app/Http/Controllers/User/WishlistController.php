<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addtowishlist(Request $request, $product_id)
    {
        if(Auth::check())
        {
            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if(!$exists)
            {

                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Product added to Wishlist']);
            }
            else
            {
                return response()->json(['error' => 'Product already in your Wishlist']);
            }
        }
        else
        {
            return response()->json(['error' => 'You need to login before adding to wishlist']);
        }
    }

    public function viewwishlist()
    {
        return view('frontend.wishlist.view_wishlist');
    }

    public function getwishlist()
    {
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();

        return response()->json($wishlist);
    }

    public function removewishlist($id)
    {
        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json(['success' => 'Product removed from Wishlist']);
    }
}
