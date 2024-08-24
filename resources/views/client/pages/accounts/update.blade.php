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
            <h4>Cập nhât tài khoản</h4>
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-dark" href="{{ route('client.home-page') }}">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item"><a class="text-dark" href="#">Tài khoản</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cập nhật tài khoản</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="container-md my-5">
        <div class="row gx-4">
            <div class="col-12">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-4 col-12 my-xl-0 my-3">
                        <div class="nav nav-pills flex-column" role="tablist">
                            <x-nav-account href="{{ route('client.account.profile-page') }}" :active="request()->routeIs('client.account.profile-page')">
                                THÔNG TIN TÀI KHOẢN
                            </x-nav-account>

                            <x-nav-account href="{{ route('client.account.hoadon') }}" :active="request()->routeIs('client.account.hoadon')">
                                HÓA ĐƠN
                            </x-nav-account>

                            <x-nav-account href="{{ route('client.account.update') }}" :active="request()->routeIs('client.account.update')">
                                THAY ĐỔI THÔNG TIN
                            </x-nav-account>

                            <x-nav-account href="{{ route('client.account.updatePass') }}" :active="request()->routeIs('client.account.updatePass')">
                                ĐỔI MẬT KHẨU
                            </x-nav-account>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="tab-content border-0">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"
                                tabindex="0">
                                <div class="row justify-content-center">
                                    <div class="col-xl-12 card rounded-0 p-4">
                                        <h3 class="mb-3">Cập nhật tài khoản</h3>
                                        <form action="#" method="POST">
                                            @csrf
                                            <div class="row g-3 mb-4">
                                                <div class="col-lg-6 col-12 ">
                                                    <label class="p-2">Mã tài khoản</label>
                                                    <input name="id" disabled value="" type="text"
                                                        class="form-control p-2">
                                                </div>
                                                <div class="col-lg-6 col-12 ">
                                                    <label class="p-2">Họ và tên</label>
                                                    <input name="name" value="{{ $users->name }}" type="text"
                                                        class="form-control p-2">
                                                    @error('name')
                                                        <span style="color: red"><i
                                                                class="fa-solid fa-circle-exclamation fa-beat"></i>
                                                            {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 col-12 ">
                                                    <label class="p-2">Số điện thoại</label>
                                                    <input name="phone" value="{{ $users->phone }}" type="text"
                                                        class="form-control p-2">
                                                    @error('phone')
                                                        <span style="color: red"><i
                                                                class="fa-solid fa-circle-exclamation fa-beat"></i>
                                                            {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 col-12 ">
                                                    <label class="p-2">Email</label>
                                                    <input name="email" value="{{ $users->email }}" type="email"
                                                        class="form-control p-2">
                                                    @error('email')
                                                        <span style="color: red"><i
                                                                class="fa-solid fa-circle-exclamation fa-beat"></i>
                                                            {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 col-12 mb-3">
                                                    <label class="p-2">Địa chỉ</label>
                                                    <input name="address" value="{{ $users->address }}" type="text"
                                                        class="form-control p-2" placeholder="Nhập địa chỉ...">
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="p-2">Mật khẩu</label>
                                                    <input name="password" placeholder="Mật khẩu" type="password"
                                                        class="form-control p-2">
                                                    @error('password')
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
