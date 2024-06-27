<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Illuminate\Support\Facades\Session;

class ClReviewController extends Controller
{
    public function review(Request $request)
    {
        $rating = Review::findOrFail(1);

        return route('client.review', compact('rating'));
        // try {
        //     $review = new Review();
        //     $review->reviews = $request->input('reviews');
        //     $review->rating_point = $request->input('rating_point');
        //     $review->user_id = Auth::user()->id;
        //     $review->product_detail_id = $request->input('product_detail_id');
        //     $review->status = 0;
        //     $review->save();
        //     return response()->json(['message' => 'Review submitted successfully.']);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => 'Failed to submit review.'], 500);
        // }
    }
    // public function showReview($productSlug)
    // {
    //     $reviews = Review::where('product_detail_id', $id)->with('user')->get();

    //     return response()->json($reviews);
    // }
}
