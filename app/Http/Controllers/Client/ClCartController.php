<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClCartController extends Controller
{
    public function cart()
    {
        $title = 'Giỏ Hàng';
        return view('client.pages.cart', compact('title'));
    }
}
