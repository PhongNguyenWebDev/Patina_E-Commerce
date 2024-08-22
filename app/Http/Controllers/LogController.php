<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoimkRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\QuenmkRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\ForgetAccount;
use App\Mail\VerifyAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
        $data = $request->except('social_provider');
        $data['social_provider'] = '';
        if ($acc = User::create($data)) {
            Mail::to($acc->email)->send(new VerifyAccount($acc));
            return redirect()->route('login')->with('ssmsg', 'Vui lòng mở mail để kích hoạt tài khoản và kiểm tra mail ở phần thư rác.');
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
    public function viewquenmk()
    {
        $title = 'Quên mật khẩu';
        return view('auth.forgotPassword', compact('title'));
    }
    public function quenmk(QuenmkRequest $request)
    {
        $token = Str::random(40);
        $user = User::where('email', $request->email)->firstOrFail();
        $user->update(['remember_token' => $token]);
        Mail::to($user->email)->send(new ForgetAccount($user, $token));
        return redirect()->route('login')->with('ssmsg', 'Vui lòng kiểm tra mail để đặt lại mật khẩu.');
    }
    public function viewdoimk()
    {
        $title = "Đổi mật khẩu";
        return view('auth.changePassword', compact('title'));
    }
    public function doimk(DoimkRequest $request)
    {
        $user = User::where('remember_token', $request->token)->first();
        if ($user) {
            $user->update(['password' => $request->password, 'remember_token' => null]);
            return redirect()->route('login')->with('ssmsg', 'Đổi mật khẩu thành công. Vui lòng đăng nhập');
        }
        return redirect()->route('login')->with('ermsg', 'Token không hợp lệ.');
    }
}
