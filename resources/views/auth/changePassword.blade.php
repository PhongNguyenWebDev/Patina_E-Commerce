@extends('layouts.client')
@section('content')
    <style>
        .header__menu ul li a {
            text-decoration: none
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Đổi Mật Khẩu</h4>
                        <div class="breadcrumb__links">
                            <a href="">Home</a>
                            <a href="">Đổi mật khẩu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-md mt-5">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills border-0 justify-content-center mb-3">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link pdcatt border-0 active" role="tab" aria-controls="profile"
                           aria-selected="false" style="font-size: 20px;background-color:black">ĐỔI MẬT KHẨU</a>
                    </li>
                </ul>

            </div>
            <!-- Tab panes -->
            <div class="tab-content border-0 mt-1">
                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="row justify-content-center">
                        <div class="col-md-6 mt-3">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <form class="pb-3" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <input type="password" class="form-control p-3" name="password"
                                                   placeholder="Mật khẩu">
                                            @error('password')
                                            <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                                    {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" class="form-control p-3" name="password_confirmation"
                                                   placeholder="Nhập lại mật khẩu">
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
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/3377b5a3db.js" crossorigin="anonymous"></script>
@endsection
