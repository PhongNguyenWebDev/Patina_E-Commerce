<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClHomeController extends Controller
{
    public function homePage()
    {
        $title = 'Trang Chủ';
        return view('client.pages.home', compact('title'));
    }
    public function shop()
    {
        $title = 'Cửa Hàng';
        return view('client.pages.shop', compact('title'));
    }
    public function introduce()
    {
        $title = 'Giới Thiệu';
        return view('client.pages.introduce', compact('title'));
    }
    public function contact()
    {
        $title = 'Liên Hệ';
        return view('client.pages.contact', compact('title'));
    }
    public function seriesShop()
    {
        $title = 'Hệ Thống Cửa Hàng';
        return view('client.pages.series-shop', compact('title'));
    }
    public function cart()
    {
        $title = 'Giỏ Hàng';
        return view('client.pages.cart', compact('title'));
    }
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
    public function blog()
    {
        $title = 'Blog';
        return view('client.pages.blog', compact('title'));
    }
}
