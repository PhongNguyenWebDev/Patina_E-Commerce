<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClBlogController extends Controller
{
    public function blog()
    {
        $title = 'Blog';
        return view('client.pages.blog', compact('title'));
    }
}
