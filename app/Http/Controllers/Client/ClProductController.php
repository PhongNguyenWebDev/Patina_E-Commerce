<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ClProductController extends Controller
{
    public function show($productSlug)
    {
        $title = 'Sản Phẩm';
        $product = Product::with(['colors', 'sizes', 'tags', 'productDetails'])
            ->where('slug', $productSlug)
            ->firstOrFail();
        $uniqueColors = $product->colors->unique('id');
        $colorsWithPrices = $product->colors->map(function ($color) use ($product) {
            $detail = $product->productDetails->firstWhere('color_id', $color->id);
            $color->price = $detail->price;
            $color->sale_price = $detail->sale_price;
            return $color;
        });
        $categoryId = $product->category_id;

        // Get related products by category id
        $relatedProducts = $this->relatedProductsByCategory($categoryId, $product->id);

        // Get reviews for the product
        $reviews = $this->showReview($product->id);
        return view('client.pages.product-detail', compact('title', 'product', 'uniqueColors', 'colorsWithPrices', 'relatedProducts', 'reviews'));
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
        // Validate the incoming request data
        $request->validate([
            'reviews' => 'required|string',
            'rating_point' => 'required|integer|between:1,5',
            'product_detail_id' => 'required|exists:product_detail,id',
        ]);

        $review = new Review();
        $review->reviews = $request->input('reviews');
        $review->rating_point = $request->input('rating_point');
        $review->user_id = Auth::id();
        $review->product_detail_id = $request->input('product_detail_id');
        $review->status = 0;
        $review->save();
        return response()->json(['message' => 'Review submitted successfully.']);
    }

    public function showReview()
    {
        $reviews = Review::with('user')->get();
        // Trả về danh sách đánh giá dưới dạng JSON
        return $reviews;
    }
}
