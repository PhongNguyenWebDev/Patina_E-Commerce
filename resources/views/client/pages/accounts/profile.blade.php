@extends('layouts.client')
@section('content')
    @include('client.blocks.banner')
    <section class="breadcrumb-option my-xl-5 my-2">
        <div class="container">
            <h4>Thông tin cá nhân</h4>
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
    <section class="container my-xl-5 pb-xl-5">
        <div class="d-flex row">
            <div class="col-lg-4 col-md-4 col-12 my-xl-0 my-3 ">
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
            <div class="col-lg-8 d-flex justify-content-center">
                <div class="container my-xl-0 my-5">
                    <div id="update-info" class="info-content">
                        <div class="row flex-lg-nowrap ">
                            <div class="col">
                                <div class="row">
                                    <div class="col mb-3">
                                        <div class="card rounded-0">
                                            <div class="card-body">
                                                <div class="e-profile">
                                                    <div class="row">
                                                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">
                                                                {{ $username }}
                                                            </h4>
                                                            <p class="mb-0">{{ $email }}</p>
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item"><a href="" class="active nav-link">Cài
                                                                đặt</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content pt-3">
                                                        <div class="tab-pane active">
                                                            <form class="form" novalidate="">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="row my-2">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>Họ và tên</label>
                                                                                    <input class="form-control p-2"
                                                                                        type="text" name="name"
                                                                                        placeholder="{{ $username }}"
                                                                                        value="{{ $username }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>Tên đăng nhập</label>
                                                                                    <input class="form-control p-2"
                                                                                        type="text" name="username"
                                                                                        placeholder="{{ $username }}"
                                                                                        value="{{ $username }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row my-2">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>Email</label>
                                                                                    <input class="form-control p-2"
                                                                                        type="text"
                                                                                        placeholder="{{ $email }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>Địa chỉ</label>
                                                                                    <input class="form-control p-2"
                                                                                        type="text"
                                                                                        placeholder="{{ $address }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
