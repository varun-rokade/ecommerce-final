<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function reviewstore(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'summary' => 'required',
            'comment' => 'required',
        ]);

        Review::insert([
            'product_id' => $id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'summary' => $request->summary,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Review submitted to admin',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function pendingreviews()
    {
        $reviews = Review::where('status', 0)->orderBy('id', 'DESC')->get();
        return view('backend.reviews.pending_reviews', compact('reviews'));
    }

    public function reviewapprove($review_id)
    {
        Review::where('id', $review_id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Product Review Approved',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function publishedreviews()
    {
        $reviews = Review::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('backend.reviews.published_reviews', compact('reviews'));
    }

    public function reviewdelete($review_id)
    {
        Review::findOrfail($review_id)->delete();

        $notification = array(
            'message' => 'Product Review Deleted',
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notification);
    }
}
