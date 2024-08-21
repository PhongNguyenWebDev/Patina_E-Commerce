@extends('layouts.client')
@section('content')
    <div class="main-content d-flex align-items-center justify-content-center min-vh-100" style="color: #1e1f24;">
        <div class="form-container shadow p-3 mb-5 bg-body rounded">
            <h3 class="text-center">Đăng ký</h3>
            <div class="mt-3">
                <div class="frame-login">
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label form-label-register fw-bold">Họ
                                và
                                tên</label>
                            <input type="text" class="form-control form-control-register mb-2" name="name"
                                style="font-size: 14px;" value="{{ old('name') }}" placeholder="Nhập họ và tên"
                                aria-describedby="emailHelp">
                            @error('name')
                                <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                    {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label form-label-register fw-bold">Email <span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-register mb-2" name="email"
                                style="font-size: 14px;" placeholder="Nhập địa chỉ Email" aria-describedby="emailHelp"
                                value="{{ old('email') }}">
                            @error('email')
                                <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                    {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label form-label-register fw-bold">Mật khẩu
                                <span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-register mb-2" style="font-size: 14px;"
                                name="password" placeholder="Nhập mật khẩu" aria-describedby="emailHelp">
                            @error('password')
                                <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                    {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label form-label-register fw-bold">Kiểm tra mật
                                khẩu <span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-register mb-2" style="font-size: 14px;"
                                name="password_confirmation" placeholder="Nhập lại mật khẩu" aria-describedby="emailHelp">
                            @error('password')
                                <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                    {{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-secondary w-100" style="font-size: 18px">Đăng
                            ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
