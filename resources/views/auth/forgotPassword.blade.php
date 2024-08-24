@extends('layouts.client')
@section('content')
    <div class="main-content d-flex align-items-center justify-content-center min-vh-100" style="color: #1e1f24;">
        <div class="form-container shadow p-3 mb-5 bg-body rounded">
            <h3 class="text-center">Quên mật khẩu</h3>
            <div class="mt-3">
                <div class="frame-login">
                    <form class="pb-3" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label form-label-login fw-medium" for="email">Email</label>
                            <input id="email" type="email" class="form-control form-control-login" name="email"
                                placeholder="Nhập Email">
                            @error('email')
                                <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                    {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('login') }}" class="btn btn-info"> Trở lại <i
                                    class="fa-solid fa-arrow-right"></i></a>
                            <button type="submit" class="btn btn-secondary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
