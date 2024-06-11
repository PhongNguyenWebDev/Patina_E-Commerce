<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClContactController extends Controller
{
    public function contact()
    {
        $title = 'Liên Hệ';
        return view('client.pages.contact', compact('title'));
    }
}
