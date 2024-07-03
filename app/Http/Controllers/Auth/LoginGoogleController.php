<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class LoginGoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $findUser = User::where('social_id', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->route('home');
            } else {
                $newUser = User::updateOrCreate(['email' => $user->email], [
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make(Str::random(12)), // Tạo mật khẩu ngẫu nhiên và mã hóa
                    'social_id' => $user->id,
                ]);

                Auth::login($newUser);
                return redirect()->route('home');
            }
        } catch (\Exception $e) {
            // Ghi nhật ký lỗi vào log file
            Log::error('Login with Google failed: ' . $e->getMessage());
            // Redirect về trang đăng nhập với thông báo lỗi
            return redirect('/')->with('error', 'Đăng nhập bằng Google thất bại. Vui lòng thử lại.');
        }
    }
}
