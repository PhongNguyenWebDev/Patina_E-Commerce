<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClBillController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $title = "Hóa đơn";
            return view('client.pages.accounts.bill', compact('title'));
        }
        else
        {
            return redirect()->route('logIn');
        }
    }


}
