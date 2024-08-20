@extends('layouts.client')
@section('content')
    @include('client.blocks.banner')
    <section class="breadcrumb-option my-xl-5">
        <div class="container">
            <h4>Thông tin cá nhân</h4>
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-dark" href="#">Tài khoản</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cập nhật tài khoản</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="container my-5 pb-5">
        <div class="d-flex row" style="margin-bottom: 3rem">
            <div class="col-lg-4 p-0 ">
                <ul class="list-group rounded-0">
                    <li class="list-group-item text-center" style="background: var(--primary-1000-color);">
                        <h4 class="m-0 my-2">Thông tin cá nhân</h4>
                    </li>
                    <li class="list-group-item">
                        <a class="list-group-item list-group-item-action border-0 text-uppercase" style="font-size: 18px;"
                            data-target="#update-info" href="{{ route('client.account.update') }}">Cập
                            nhật</a>
                    </li>
                    <li class="list-group-item">
                        <a class="list-group-item list-group-item-action border-0 text-uppercase" style="font-size: 18px;"
                            data-target="#invoice-info" href="{{ route('client.account.hoadon') }}">Hóa
                            đơn</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-8 d-flex justify-content-center">
                <div class="container ">
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
                                                                {{--                                                                <div class="mb-2"><b>Thay đổi mật khẩu</b></div> --}}
                                                                {{--                                                                <div class="row"> --}}
                                                                {{--                                                                    <div class="col"> --}}
                                                                {{--                                                                        <div class="form-group"> --}}
                                                                {{--                                                                            <label>Confirm <span --}}
                                                                {{--                                                                                    class="d-none d-xl-inline">Password</span></label> --}}
                                                                {{--                                                                            <input class="form-control p-2" type="password" --}}
                                                                {{--                                                                                placeholder="Vui lòng nhập mật khẩu hiện tại của bạn vào đây để có thể thay đổi mật khẩu"> --}}
                                                                {{--                                                                        </div> --}}
                                                                {{--                                                                    </div> --}}
                                                                {{--                                                                </div> --}}
                                                            </form>
                                                        </div>
                                                    </div>
                                                    {{--                                                    <div class="row mt-3"> --}}
                                                    {{--                                                        <div class="col d-flex justify-content-end"> --}}
                                                    {{--                                                            <button class="btn btn-primary" type="submit">Thay đổi</button> --}}
                                                    {{--                                                        </div> --}}
                                                    {{--                                                    </div> --}}
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
