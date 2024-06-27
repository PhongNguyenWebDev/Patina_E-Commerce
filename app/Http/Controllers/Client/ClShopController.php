<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClShopController extends Controller
{
    public function shop(Request $request, $categorySlug = null)
    {
        $title = 'Cửa Hàng';
        $brands = Brand::all();
        $product = Product::query();
        $categories = Category::where('parent_id',0)->get();
        $query = $request->input('query');
        $products = $product->where('name', 'like', '%' . $query . '%');
        if ($categorySlug) {
            $cate = Category::where('slug', $categorySlug)->firstOrFail();
            $product->where('category_id', $cate->id);
        }
        if ($request->has('price_range')) {
            $priceRange = explode('-', $request->input('price_range'));
            if (count($priceRange) == 2) {
                $product->whereBetween('price', [$priceRange[0], $priceRange[1]]);
            } elseif ($priceRange[0] == '5000+') {
                $product->where('price', '>=', '400000');
            }
        }
        if ($request->has('brand')) {
            $brand = Brand::where('slug', $request->input('brand'))->first();
            $product->where('brand_id', $brand->id);
        }
        $products = $product->where('status', 1)->paginate(9);
        return view('client.pages.shop', compact('title','brands','categories', 'categorySlug', 'products', 'query'));
    }
}
