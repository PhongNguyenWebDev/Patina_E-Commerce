<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\VerifyAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LogController extends Controller
{
    public function logIn()
    {
        $title = 'Đăng Nhập';
        return view('auth.logIn', compact('title'));
    }
    public function aclogin(LoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($data)) {
            if (Auth::user()->active == 0) {
                Auth::logout();
                return redirect()->route('login')->with('ermsg', 'Tài khoản chưa kích hoạt. Xác nhận mail để đăng nhập.');
            }
            return redirect()->route('client.home-page')->with('ssmsg', 'Đăng nhập thành công.');
        } else {
            return redirect()->back()->with('ermsg', 'Tên đăng nhập hoặc mật khẩu không đúng.');
        }
    }
    public function signIn()
    {
        $title = 'Đăng Ký';
        return view('auth.signIn', compact('title'));
    }
    public function register(RegisterRequest $request)
    {
        if ($acc = User::create($request->all())) {
            Mail::to($acc->email)->send(new VerifyAccount($acc));
            return redirect()->route('login')->with('ssmsg', 'Vui lòng mở mail để kích hoạt tài khoản.');
        };
        return redirect()->back()->with('ermsg', 'Thất bại. Vui lòng kiểm tra lại.');
    }
    public function verify($email)
    {
        $acc = User::where('email', $email)->whereNull('email_verified_at')->firstOrFail();
        $acc->update(['email_verified_at' => now(), 'active' => 1]);
        return redirect()->route('login')->with('ssmsg', 'Hãy tiếp tục đăng nhập.');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('client.home-page')->with('ssmsg', 'Hẹn gặp lại quý khách.');
    }
}
