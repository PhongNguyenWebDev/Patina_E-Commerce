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
        $categoryId = $product->category_id;

        $relatedProducts = $this->relatedProductsByCategory($categoryId, $product->id);

        $reviews = $this->showReview($product->id);
        $user = auth()->user();
        $userReview = null;

        if ($user) {
            $userReview = Review::where('product_id', $product->id)
                ->where('user_id', $user->id)
                ->first();
        }

        // Đánh giá sao sản phẩm
        $ratings = Review::where('product_id', $product->id)
            ->where('status', 'approved') // Hoặc điều kiện khác bạn cần
            ->pluck('rating_point');
        $reviewCount = $ratings->count(); // Số lượng đánh giá
        // Tính trung bình cộng rating
        $averageRating = $ratings->average();
        $roundedAverageRating = ceil($averageRating);
        return view('client.pages.product-detail', compact('title', 'product', 'uniqueColors', 'colorsWithPrices', 'relatedProducts', 'reviews', 'userReview', 'ratings', 'reviewCount', 'averageRating', 'roundedAverageRating'));
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
            $request->validate([
                'reviews' => 'required|string',
                'rating_point' => 'required|integer|between:1,5',
                'product_id' => 'required|exists:products,id',
            ]);

            $hasPurchased = Order::where('user_id', Auth::id())
                ->whereHas('orderDetails', function ($query) use ($request) {
                    $query->where('product_id', $request->input('product_id'));
                })
                ->exists();

            if (!$hasPurchased) {
                return response()->json(['message' => 'You need to purchase the product before reviewing.'], 403);
            }

            $hasReviewed = Review::where('user_id', Auth::id())
                ->where('product_id', $request->input('product_id'))
                ->exists();

            if ($hasReviewed) {
                return response()->json(['message' => 'You have already reviewed this product.'], 403);
            }

            $review = new Review();
            $review->reviews = $request->input('reviews');
            $review->rating_point = $request->input('rating_point');
            $review->user_id = Auth::id();
            $review->product_id = $request->input('product_id');
            $review->status = 0;
            $review->save();

            // Lấy danh sách reviews
            $reviews = $this->showReview($request->input('product_id'));

            // Render html reviews
            $reviewsHtml = view('client.pages.partials.reviews', compact('reviews'))->render();

            return response()->json([
                'success' => true,
                'reviewsHtml' => $reviewsHtml,
                'userReview' => true,
            ]);
        } catch (\Exception $e) {
            Log::error('Review submission error: ' . $e->getMessage());
            Log::error('Error file: ' . $e->getFile());
            Log::error('Error line: ' . $e->getLine());
            return response()->json(['message' => 'An error occurred while submitting your review. Please try again later.'], 500);
        }
    }
    public function showReview($productId)
    {
        $reviews = Review::with('user')
            ->where('product_id', $productId)
            ->get();
        return $reviews;
    }
}
