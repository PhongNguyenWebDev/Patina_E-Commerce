<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClShopController extends Controller
{
    public function shop()
    {
        $title = 'Cửa Hàng';
        return view('client.pages.shop', compact('title'));
    }
    public function productDetail()
    {
        $title = 'Chi tiết sản phẩm';
        return view('client.pages.product-detail', compact('title'));
    }
}
