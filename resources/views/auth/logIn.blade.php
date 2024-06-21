@extends('layouts.client-account')
@section('content')
    <div class="main-content d-flex align-items-center justify-content-center min-vh-100" style="color: #1e1f24;">
        <div class="form-container p-4">
            <h2 class="text-center">Đăng nhập</h2>
            <div class="mt-3">
                <div class="border rounded-3 p-4 mx-auto" style="width: 400px;">
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label form-label-login">Email</label>
                            <input type="email" class="form-control form-control-login" name="email"
                                placeholder="Nhập địa chỉ Email" aria-describedby="emailHelp" value="{{ old('email') }}">
                            @error('email')
                                <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                    {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label form-label-login">Mật khẩu</label>
                            <input type="password" class="form-control form-control-login" name="password"
                                placeholder="Nhập mật khẩu" aria-describedby="emailHelp">
                            @error('password')
                                <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                    {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <div class="check-box d-flex justify-content-between">
                                <div>
                                    <input class="form-check-input border-1 border-black" type="checkbox" id="myCheck"
                                        name="remember">
                                    <label style="color: var(--secondary-1000-color); font-size: 18px; padding-right: 2px;"
                                        for="myCheck">Nhớ mật khẩu</label>
                                </div>
                                <a style="color: var(--secondary-1000-color); font-size: 18px;">Quên mật
                                    khẩu?</a>
                            </div>
                        </div>
                        <button type="submit" class="btn mt-4"
                            style="background-color: var(--primary-900-color); width: 100%; color:aliceblue;font-size: 20px;">Đăng
                            nhập
                        </button>
                        <a href="{{ route('signIn-page') }}" class="text-decoration-none">
                            <input type="button" class="form-control mt-4 login-under-1" value="Tạo tài khoản đăng nhập">
                        </a>
                        <div class="position-relative">
                            <i class="fa-brands fa-google fa-lg position-absolute top-50 ms-5"></i>
                            <input type="button" class="form-control mt-4 login-under-2" value="Đăng nhập với Google">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
