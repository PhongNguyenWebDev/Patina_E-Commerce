<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClCheckOutController extends Controller
{
    public function checkOut()
    {
        $title = 'Thanh toán';
        return view('client.pages.checkout', compact('title'));
    }
}
