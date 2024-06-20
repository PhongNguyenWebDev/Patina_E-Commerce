<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BannerBottom;
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
        $bannerbots = BannerBottom::where('status', 1)->orderBy('id', 'desc')->get();
        return view('client.pages.home', compact('title', 'products', 'sliders', 'bannerbots'));
    }
}
