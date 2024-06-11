<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClProfileController extends Controller
{
    public function logIn()
    {
        $title = 'Đăng Nhập';
        return view('client.pages.accounts.logIn', compact('title'));
    }
    public function signIn()
    {
        $title = 'Đăng Ký';
        return view('client.pages.accounts.signIn', compact('title'));
    }
}
