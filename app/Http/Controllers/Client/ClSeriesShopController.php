<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClSeriesShopController extends Controller
{
    public function seriesShop()
    {
        $title = 'Hệ Thống Cửa Hàng';
        return view('client.pages.series-shop', compact('title'));
    }
}
