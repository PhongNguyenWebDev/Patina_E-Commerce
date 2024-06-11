<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClInTroController extends Controller
{
    public function introduce()
    {
        $title = 'Giới Thiệu';
        return view('client.pages.introduce', compact('title'));
    }
}
