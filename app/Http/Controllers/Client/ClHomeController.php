<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class ClHomeController extends Controller
{
    public function homePage()
    {
        $title = 'Trang Chủ';
        $sliders = Slider::where('status', 1)->orderBy('id', 'desc')->get();
        $products= Product::all();
        $proMuaNhieu = Product::orderBy('total_buy', 'desc')->take(4)->get();
        $brands = Brand::all();
        $categories = Category::with(['products', 'parent' => function ($query) {
            $query->withCount('products');
        }])->withCount('products')->where('parent_id', 0)->get();
        return view('client.pages.home', compact('title','categories', 'products', 'sliders', 'brands','proMuaNhieu'));
    }
}
