<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClFavoriteController extends Controller
{
    public function favorite()
    {
        $title = 'Yêu thích';
        return view('client.pages.favorite', compact('title'));
    }
}
