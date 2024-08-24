@extends('layouts.client')
@section('content')
    <div class="main-content d-flex align-items-center justify-content-center min-vh-100" style="color: #1e1f24;">
        <div class="form-container shadow p-3 mb-5 bg-body rounded">
            <h3 class="text-center">Đổi mật khẩu</h3>
            <div class="mt-3">
                <div class="frame-login">
                    <form class="pb-3" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="password" class="form-label form-label-login fw-medium">Mật
                                khẩu</label>
                            <input id="password" type="password" class="form-control form-control-login" name="password"
                                placeholder="Mật khẩu">
                            @error('password')
                                <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                    {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label form-label-login fw-medium">Xác nhận lại
                                mật khẩu</label>
                            <input id="password_confirmation" type="password" class="form-control form-control-login"
                                name="password_confirmation" placeholder="Nhập lại mật khẩu">
                            @error('password')
                                <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                    {{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
