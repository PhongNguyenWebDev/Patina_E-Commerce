<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClProfileController extends Controller
{
    public function profile()
    {
        $title = 'Thông Tin Cá Nhân';
        return view('client.pages.accounts.profile', compact('title'));
    }
}
