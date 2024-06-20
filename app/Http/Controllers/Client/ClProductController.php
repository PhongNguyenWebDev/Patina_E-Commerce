<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

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
        $relatedProducts = $this->relatedProductsByCategory($categoryId, $product->id);
        return view('client.pages.product-detail', compact('title', 'product', 'uniqueColors', 'colorsWithPrices', 'relatedProducts'));
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
}
