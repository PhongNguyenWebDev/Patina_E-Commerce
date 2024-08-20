<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\View;

class ClProductController extends Controller
{
    public function show($productSlug)
    {
        if (isset($productSlug)) {
            $name = Product::where('slug', $productSlug)->value('name');
            $title =  $name;
        } else {
            $title = 'Sản phẩm';
        }
        $product = Product::with(['colors', 'sizes', 'tags', 'productDetails'])
            ->where('slug', $productSlug)
            ->firstOrFail();
        $productDetailId = $product->productDetails->pluck('id')->first();
        $uniqueColors = $product->colors->unique('id');
        $colorsWithPrices = $product->colors->map(function ($color) use ($product) {
            $detail = $product->productDetails->firstWhere('color_id', $color->id);
            $color->price = $detail->sale_price ? $detail->price : null;
            $color->sale_price = $detail->sale_price ? $detail->sale_price : $detail->price;
            return $color;
        });
        $productDetail = $product->productDetails->first();

        if (!$productDetail) {
            return abort(404, 'Product details not found');
        }
        $categoryId = $product->category_id;

        $relatedProducts = $this->relatedProductsByCategory($categoryId, $product->id);

        $reviews = $this->showReview($productDetailId);
        $user = auth()->user();
        $userReview = null;

        if ($user) {
            $userReview = Review::where('product_detail_id', $product->productDetails->first()->id)
                ->where('user_id', $user->id)
                ->first();
        }
        $reviewCount = Review::where('product_detail_id', $product->productDetails->first()->id)->count();
        return view('client.pages.product-detail', compact('title', 'product', 'uniqueColors', 'colorsWithPrices', 'relatedProducts', 'reviews', 'userReview', 'reviewCount'));
    }
    public function relatedProductsByCategory($categoryId, $productId)
    {
        $relatedProducts = Product::where('category_id', $categoryId)
            ->where('status', 1)
            ->where('id', '!=', $productId)
            ->take(4)
            ->get();
        return $relatedProducts;
    }

    public function review(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'reviews' => 'required|string',
                'rating_point' => 'required|integer|between:1,5',
                'product_detail_id' => 'required|exists:product_detail,id',
            ]);

            // Check if the user has purchased the product
            $hasPurchased = Order::where('user_id', Auth::id())
                ->whereHas('orderDetails', function ($query) use ($request) {
                    $query->where('product_id', $request->input('product_id'));
                })
                ->exists();

            if (!$hasPurchased) {
                return response()->json(['message' => 'You need to purchase the product before reviewing.'], 403);
            }

            // Check if the user has already reviewed the product
            $hasReviewed = Review::where('user_id', Auth::id())
                ->where('product_detail_id', $request->input('product_detail_id'))
                ->exists();

            if ($hasReviewed) {
                return response()->json(['message' => 'You have already reviewed this product.'], 403);
            }

            $review = new Review();
            $review->reviews = $request->input('reviews');
            $review->rating_point = $request->input('rating_point');
            $review->user_id = Auth::id();
            $review->product_detail_id = $request->input('product_detail_id');
            $review->status = 0;
            $review->save();

            return response()->json(['message' => 'Review submitted successfully.']);
        } catch (\Exception $e) {
            Log::error('Review submission error: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred while submitting your review. Please try again later.'], 500);
        }
    }



    public function showReview($productDetailId)
    {
        $reviews = Review::with('user')
            ->where('product_detail_id', $productDetailId)
            ->get();

        return $reviews;
    }
    public function fetchReviews($productSlug)
    {
        $product = Product::where('slug', $productSlug)->firstOrFail();
        $productDetailId = $product->productDetails->pluck('id')->first();

        $reviews = $this->showReview($productDetailId);

        return View::make('client.pages.partials.reviews', compact('reviews'))->render();
    }
}
