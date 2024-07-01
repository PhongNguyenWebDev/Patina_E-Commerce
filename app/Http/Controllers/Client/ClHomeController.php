<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
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
        $brands = Brand::all();
        return view('client.pages.home', compact('title', 'products', 'sliders', 'brands'));
    }
}
