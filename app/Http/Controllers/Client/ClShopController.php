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
        $categories = Category::with(['products', 'parent' => function ($query) {
            $query->withCount('products');
        }])->withCount('products')->where('parent_id', 0)->get();
        $query = $request->input('query');
        $products = $product->where('name', 'like', '%' . $query . '%');
        if ($categorySlug) {
            $cate = Category::where('slug', $categorySlug)->firstOrFail();

            // Lấy tất cả các ID danh mục con
            $categoryIds = $cate->parent()->pluck('id')->toArray();
            $categoryIds[] = $cate->id; // Thêm ID của danh mục cha vào danh sách

            // Lọc sản phẩm theo các danh mục cha và con
            $product->whereIn('category_id', $categoryIds);
        }
        $priceRanges = [
            '0-50000' => Product::whereBetween('price', [0, 50000])->count(),
            '50000-150000' => Product::whereBetween('price', [50000, 150000])->count(),
            '150000-300000' => Product::whereBetween('price', [150000, 300000])->count(),
            '300000-500000' => Product::whereBetween('price', [300000, 500000])->count(),
            '500000-2000000' => Product::whereBetween('price', [500000, 2000000])->count(),
            '2000000+' => Product::where('price', '>=', 2000000)->count(),
        ];
        if ($request->has('price_range')) {
            $priceRange = explode('-', $request->input('price_range'));
            if (count($priceRange) == 2) {
                $product->whereBetween('price', [$priceRange[0], $priceRange[1]]);
            } elseif ($priceRange[0] == '2000000+') {
                $product->where('price', '>=', '2000000');
            }
        }
        if ($request->has('brand')) {
            $brand = Brand::where('slug', $request->input('brand'))->first();
            $product->where('brand_id', $brand->id);
        }
        $products = $product->where('status', 1)->paginate(12);
        $totalProducts = Product::count();
        $popularProducts = Product::orderBy('total_buy', 'desc')->take(4)->get();
        return view('client.pages.shop', compact('title', 'brands', 'categories', 'categorySlug', 'priceRanges', 'products', 'query', 'popularProducts', 'totalProducts'));
    }
}
