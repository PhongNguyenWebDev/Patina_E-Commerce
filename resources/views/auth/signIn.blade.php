@extends('layouts.client-account')
@section('content')
    <div class="main-content d-flex align-items-center justify-content-center min-vh-100" style="color: #1e1f24;">
        <div class="form-container p-4">
            <h2 class="text-center">Đăng ký</h2>
            <div class="w-100 mt-3">
                <div class="border rounded-3 p-4 mx-auto" style="width: 400px;">
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label form-label-register">Họ và tên</label>
                            <input type="text" class="form-control form-control-register" name="name" value="{{ old('name') }}"
                                placeholder="Nhập họ và tên" aria-describedby="emailHelp">
                            @error('name')
                                <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                    {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label form-label-register">Email <span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-register" name="email"
                                placeholder="Nhập địa chỉ Email" aria-describedby="emailHelp" value="{{ old('email') }}">
                            @error('email')
                                <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                    {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label form-label-register">Mật khẩu
                                <span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-register" name="password"
                                placeholder="Nhập mật khẩu" aria-describedby="emailHelp">
                            @error('password')
                                <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                    {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label form-label-register">Kiểm tra mật
                                khẩu <span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-register" name="password_confirmation"
                                placeholder="Nhập lại mật khẩu" aria-describedby="emailHelp">
                            @error('password')
                                <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                    {{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn"
                            style="background-color:#8D6440; width: 100%; color:aliceblue; font-size: 20px;">Đăng
                            ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
