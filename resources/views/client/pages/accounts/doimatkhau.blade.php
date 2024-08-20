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
    @include('client.blocks.banner')
    <section class="breadcrumb-option my-xl-5">
        <div class="container">
            <h4>Đổi mật khẩu</h4>
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-dark" href="#">Tài khoản</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="container-md my-xl-5">
        <div class="row gx-4">
            <div class="col-12">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="nav nav-pills flex-column" role="tablist">
                            <div class="card rounded-0">
                                <a href="{{ route('client.account.profile-page') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt" style="color:black;">THÔNG
                                    TIN TÀI KHOẢN
                                </a>
                                <a href="{{ route('client.account.hoadon') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt" style="color:black;">HÓA ĐƠN
                                </a>
                                <a href="{{ route('client.account.update') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt" style="color:black;">THAY
                                    ĐỔI THÔNG TIN
                                </a>
                                <button class="nav-link border-0 border-bottom p-3 pdcatt active rounded-0 bg-secondary"
                                    id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                                    aria-controls="profile" aria-selected="false">ĐỔI MẬT KHẨU
                                </button>
                                <a style="color:black;" class="btn p-3 pdcatt" href="{{ route('logout') }}">ĐĂNG
                                    XUẤT</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="tab-content border-0">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"
                                tabindex="0">
                                <div class="row justify-content-center">
                                    <div class="col-md-12 card rounded-0 p-4">
                                        <h4 class="mb-3">Đổi mật khẩu</h4>
                                        <form action="#" method="POST">
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-12 mb-3">
                                                    <input name="old_password" placeholder="Mật khẩu cũ" type="password"
                                                        class="form-control p-2">
                                                    @error('old_password')
                                                        <span style="color: red"><i
                                                                class="fa-solid fa-circle-exclamation fa-beat"></i>
                                                            {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 col-12 mb-3">
                                                    <input name="password" placeholder="Mật khẩu mới" type="password"
                                                        class="form-control p-2">
                                                    @error('password')
                                                        <span style="color: red"><i
                                                                class="fa-solid fa-circle-exclamation fa-beat"></i>
                                                            {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 col-12 mb-3">
                                                    <input name="password_confirmation" placeholder="Nhập lại mật khẩu mới"
                                                        type="password" class="form-control p-2">
                                                    @error('password_confirmation')
                                                        <span style="color: red"><i
                                                                class="fa-solid fa-circle-exclamation fa-beat"></i>
                                                            {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-dark float-end">Lưu thông
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
