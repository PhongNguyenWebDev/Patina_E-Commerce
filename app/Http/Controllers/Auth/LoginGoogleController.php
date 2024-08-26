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
            // Nhận thông tin người dùng từ Google
            $user = Socialite::driver('google')->user();

            // Tìm người dùng trong hệ thống theo social_id
            $findUser = User::where('social_id', $user->id)
                ->orWhere('email', $user->email) // Tìm theo email nếu social_id không tồn tại
                ->first();

            if ($findUser) {
                // Nếu người dùng đã tồn tại, đăng nhập vào hệ thống
                Auth::login($findUser);
            } else {
                // Nếu không tìm thấy người dùng, tạo mới
                $findUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make(Str::random(12)), // Tạo mật khẩu ngẫu nhiên và mã hóa
                    'social_id' => $user->id,
                ]);

                Auth::login($findUser);
            }

            return redirect()->route('home');
        } catch (\Exception $e) {
            // Ghi nhật ký lỗi vào log file
            Log::error('Login with Google failed: ' . $e->getMessage());
            // Redirect về trang đăng nhập với thông báo lỗi
            return redirect('/')->with('error', 'Đăng nhập bằng Google thất bại. Vui lòng thử lại.');
        }
    }
}
