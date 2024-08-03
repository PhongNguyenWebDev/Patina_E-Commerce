<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClProfileController extends Controller
{
    public function profile()
    {
        if (Auth::check())
        {
            $title = 'Thông Tin Cá Nhân';
            $user = Auth::user();
            $username = $user->name;
            $email = $user->email;
            $address = $user->address;
            return view('client.pages.accounts.profile', compact('title', 'username', 'email', 'address' ));
        }
        else
        {
            return redirect()->route('logIn');
        }
    }
}


