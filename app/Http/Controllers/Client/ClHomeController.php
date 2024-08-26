<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Blog;
use Illuminate\Http\Request;

class ClHomeController extends Controller
{
    public function homePage()
    {
        $title = 'Trang Chủ';
        $sliders = Slider::where('status', 1)->orderBy('id', 'desc')->get();
        $products = Product::take(8)->get();
        $proMuaNhieu = Product::orderBy('total_buy', 'desc')->take(4)->get();
        $proNew= Product::orderBy('id', 'desc')->take(4)->get();
        $proMoiNhat = Product::orderBy('id', 'desc')->first();
        $brands = Brand::all();
        $categories = Category::with(['products', 'parent' => function ($query) {
            $query->withCount('products');
        }])->withCount('products')->where('parent_id', 0)->get();
        $blogs = Blog::all();
        return view('client.pages.home', compact('title', 'categories', 'products', 'sliders', 'brands','proMoiNhat', 'proMuaNhieu','proNew', 'blogs'));
    }
}
