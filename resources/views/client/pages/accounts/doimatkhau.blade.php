@extends('layouts.client')
@section('css')
<style>
    .header__menu ul li a {
        text-decoration: none
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Đổi Mật Khẩu</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="{{ route('account.profile') }}">Tài Khoản</a>
                            <span>Đổi Mật Khẩu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-md mt-5">
        <div class="row g-3">
            <div class="col-12">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="nav nav-pills flex-column" role="tablist">
                            <div class="card">
                                <a href="{{ route('account.profile') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt" style="font-size: 17px; color:black;">THÔNG
                                    TIN TÀI KHOẢN
                                </a>
                                <a href="{{ route('account.hoadon') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt" style="font-size: 17px; color:black;">HÓA ĐƠN
                                </a>
                                <a href="{{ route('account.update') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt" style="font-size: 17px; color:black;">THAY
                                    ĐỔI THÔNG TIN
                                </a>
                                <button class="nav-link border-0 border-bottom p-3 pdcatt active" id="home-tab"
                                    data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                                    aria-controls="profile" aria-selected="false" style="font-size: 17px;background-color:black">ĐỔI MẬT KHẨU
                                </button>
                                <a style="font-size: 17px; color:black;" class="btn p-3 pdcatt" href="{{ route('logout') }}">ĐĂNG
                                    XUẤT</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="tab-content border-0">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"
                                tabindex="0">
                                <div class="row row-40 justify-content-center">
                                    <div class="col-md-9 card p-4">
                                        <h3 class="mb-3">Đổi mật khẩu</h3>
                                        <form action="#" method="POST">
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-12 mb-3">
                                                    <input name="old_password" placeholder="Mật khẩu cũ" type="password"
                                                        class="form-control">
                                                    @error('old_password')
                                                        <span style="color: red"><i
                                                                class="fa-solid fa-circle-exclamation fa-beat"></i>
                                                            {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 col-12 mb-3">
                                                    <input name="password" placeholder="Mật khẩu mới" type="password"
                                                        class="form-control">
                                                    @error('password')
                                                        <span style="color: red"><i
                                                                class="fa-solid fa-circle-exclamation fa-beat"></i>
                                                            {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 col-12 mb-3">
                                                    <input name="password_confirmation" placeholder="Nhập lại mật khẩu mới"
                                                        type="password" class="form-control">
                                                    @error('password_confirmation')
                                                        <span style="color: red"><i
                                                                class="fa-solid fa-circle-exclamation fa-beat"></i>
                                                            {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-dark float-end btn-lg">Lưu thông
                                                        tin</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://kit.fontawesome.com/3377b5a3db.js" crossorigin="anonymous"></script>
@endsection
