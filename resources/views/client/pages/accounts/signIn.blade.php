@extends('layouts.client-account')
@section('content')
    <div class="main-content d-flex align-items-center justify-content-center min-vh-100" style="color: #1e1f24;">
        <div class="form-container p-4">
            <h2 class="text-center">Đăng ký</h2>
            <div class="w-100 mt-3">
                <div class="border rounded-3 p-4 mx-auto" style="width: 400px;">
                    <form>
                        <div class="mb-3">
                            <label for="" class="form-label form-label-register">Họ và tên</label>
                            <input type="text" class="form-control form-control-register" id="exampleInputEmail1"
                                placeholder="Nhập họ và tên" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label form-label-register">Email <span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-register" id=""
                                placeholder="Nhập địa chỉ Email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label form-label-register">Số điện thoại
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-register" id=""
                                placeholder="Nhập số điện thoại" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label form-label-register">Mật khẩu
                                <span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-register" id="exampleInputEmail1"
                                placeholder="Nhập mật khẩu" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label form-label-register">Kiểm tra mật
                                khẩu <span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-register" id="exampleInputEmail1"
                                placeholder="Nhập lại mật khẩu" aria-describedby="emailHelp">
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
