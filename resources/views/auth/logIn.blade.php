@extends('layouts.client')
@section('content')
    <div class="d-flex align-items-center justify-content-center" style="color: #1e1f24;">
        <div class="form-container shadow p-xl-3 mb-5 bg-body rounded mt-4">
            <h3 class="text-center">Đăng nhập</h3>
            <div class="mt-3">
                <div class="frame-login p-3">
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label form-label-login fw-medium">Email</label>
                            <input type="email" class="form-control form-control-login" name="email"
                                style="font-size:14px;" placeholder="Nhập địa chỉ Email" aria-describedby="emailHelp"
                                value="{{ old('email') }}">
                            @error('email')
                                <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                    {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label form-label-login fw-medium">Mật khẩu</label>
                            <input type="password" class="form-control form-control-login" style="font-size:14px;"
                                name="password" placeholder="Nhập mật khẩu" aria-describedby="emailHelp">
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
                                    <label style="color: var(--secondary-1000-color); padding-right: 2px;"
                                        for="myCheck">Nhớ mật khẩu</label>
                                </div>
                                <a href="{{ route('quenmk') }}" style="color: var(--secondary-1000-color);">Quên mật
                                    khẩu?</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-secondary w-100 mt-xl-3" style="font-size: 18px;">Đăng
                            nhập
                        </button>
                        <a href="{{ route('signIn-page') }}" class="text-decoration-none">
                            <input type="button" class="btn btn-light form-control mt-4 login-under-1"
                                value="Tạo tài khoản đăng nhập">
                        </a>
                        <div class="position-relative">
                            {{-- <i class="fa-brands fa-google fa-lg position-absolute ms-5" style="top:70%; left:6%;"></i> --}}
                            <a class="nav-link nav-link d-flex align-items-center mt-3" href="{{ route('social.google') }}">
                                <img class="position-absolute" style="left: 60px;"
                                    src="{{ asset('assets/clients/img/logogg.png') }}" width="26px" height="26px"
                                    alt="" sizes="" srcset="">
                                <input type="button" class="btn btn-light form-controllogin-under-2 w-100"
                                    value="Đăng nhập với Google">
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
