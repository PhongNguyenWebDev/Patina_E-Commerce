<header class="mx-xl-5 my-xl-2">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid p-xl-0 p-2">
            <div class="w-25">
                <a class="navbar-brand" href="{{ route('client.home-page') }}"
                    class="nav-link d-flex align-items-center text-decoration-none">
                    <h4 class="web-name m-0" style="letter-spacing: -2px">PATINA
                    </h4>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll w-100 d-flex justify-content-center"
                    style="--bs-scroll-height: 450px;">
                    <li class="nav-item">
                        <x-nav-link href="{{ route('client.home-page') }}" :active="request()->routeIs('client.home-page')">Trang
                            chủ</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="{{ route('client.shop-page') }}" :active="request()->routeIs('client.shop-page')">Cửa
                            hàng</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="{{ route('client.blog-page') }}" :active="request()->routeIs('client.blog-page')">Bài viết</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="{{ route('client.introduce-page') }}" :active="request()->routeIs('client.introduce-page')">Giới
                            thiệu</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="{{ route('client.contact-page') }}" :active="request()->routeIs('client.contact-page')">Liên
                            hệ</x-nav-link>
                    </li>
                </ul>
                <div class="container d-xl-flex justify-content-xl-end w-50 mx-0">
                    <ul class="d-flex p-0 m-xl-0 list-unstyled">
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{ route('client.favorite.index') }}" class="position-relative text-white">
                                <i class="fa-regular fa-heart fa-xl" style="color: rgb(56, 56, 56)"></i>
                                <div class="count position-absolute bottom-50 start-50">
                                    <span style="font-size: x-small; color: black">{{ $favorite->count() }}</span>
                                </div>
                            </a>
                            <a href="{{ route('client.cart-page.index') }}" class="position-relative mx-3 text-white">
                                <i class="fa-solid fa-cart-shopping fa-xl" style="color: rgb(56, 56, 56)"></i>
                                <div class="count position-absolute bottom-50 start-50">
                                    <span style="font-size: x-small; color: black">{{ $cart->sum('quantity') }}</span>
                                </div>
                            </a>
                        </li>
                        @if (Auth::check())
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a class="btn nav-link dropdown-toggle border-0 p-0" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="user-img">
                                            <img class="rounded-circle"
                                                src="{{ asset('assets/admin/img/user-06.jpg') }}" width="35"
                                                alt="Admin">
                                            <span class="status online"></span>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('client.account.profile-page') }}">Hồ
                                                sơ
                                                của
                                                tôi</a>
                                        </li>
                                        <li>
                                            @if (auth()->user()->role == 0)
                                                <a class="dropdown-item" href="{{ route('admin.home') }}">Vào trang
                                                    quản
                                                    trị</a>
                                            @endif
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="" href="{{ route('login') }}"><i class="fa-regular fa-user fa-xl"
                                        style="color: rgb(56, 56, 56)"></i></a>
                            </li>
                        @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
