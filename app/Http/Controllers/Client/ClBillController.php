<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClBillController extends Controller
{
    public function bill()
    {
        $title = 'Hóa Đơn';
        return view('client.pages.accounts.bill', compact('title'));
    }
}
