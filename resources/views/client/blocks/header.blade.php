<header class="p-3 header-menu" style="background-color: #F7F2EE;">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-xl-5 px-0">
            <div class="col-xl-2 col-6 d-flex align-items-center">
                <a href="{{ route('client.home-page') }}" class="d-flex align-items-center text-decoration-none">
                    <img src="/assets/clients/img/Logo_bran/logoweb.jpg" alt=""
                        style="border-radius: 50%; height: 55px; width: 55px;">
                    <p class="web-name ms-3 m-0" style="font-family: 'Dancing Script', cursive; font-size: 18px;">PATINA
                    </p>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"
                style="border-color:var(--primary-1000-color) ; background-color: var(--primary-200-color)">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-xl-10" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-evenly" style="width: 80%;">
                    <li class="nav-item">
                        <x-nav-link href="{{ route('client.home-page') }}" :active="request()->routeIs('client.home-page')">Trang chủ</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="{{ route('client.shop-page') }}" :active="request()->routeIs('client.shop-page')">Cửa hàng</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="{{ route('client.blog-page') }}" :active="request()->routeIs('client.blog-page')">Blog</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="{{ route('client.introduce-page') }}" :active="request()->routeIs('client.introduce-page')">Giới
                            thiệu</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="{{ route('client.contact-page') }}" :active="request()->routeIs('client.contact-page')">Liên hệ</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="{{ route('client.series-shop-page') }}" :active="request()->routeIs('client.series-shop-page')">Hệ thống cửa
                            hàng</x-nav-link>
                    </li>
                </ul>
                <div class="user d-flex align-items-center">
                    <a href="{{ route('client.favorite.index') }}" class="position-relative">
                        <i class="fa-regular fa-heart fa-xl" style="color: #8D6440;"></i>
                        <div class="count position-absolute bottom-50 start-50">
                            <span style="font-size: x-small; color: black">{{ $favorite->count() }}</span>
                        </div>
                    </a>
                    <a href="{{ route('client.cart-page.index') }}" class="position-relative mx-3">
                        <i class="fa-solid fa-cart-shopping fa-xl" style="color: #8D6440;"></i>
                        <div class="count position-absolute bottom-50 start-50">
                            <span style="font-size: x-small; color: black">{{ $cart->sum('quantity') }}</span>
                        </div>
                    </a>
                    @if (Auth::check())
                        {{-- <a href="{{ route('client.home-page') }}"><i class="fa-regular fa-user fa-xl"
                                style="color: #8D6440;"></i></a> --}}
                        <div class="dropdown">
                            <a class="btn dropdown-toggle border-0" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="user-img">
                                    <img class="rounded-circle" src="{{ asset('assets/admin/img/user-06.jpg') }}"
                                        width="35" alt="Admin">
                                    <span class="status online"></span>
                                </span>
                                {{Auth::user()->name}}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('client.profile-page') }}">Hồ sơ của
                                        tôi</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.home') }}">Vào trang quản trị</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('logIn-page') }}"><i class="fa-regular fa-user fa-xl"
                                style="color: #8D6440;"></i></a>
                    @endif

                </div>
            </div>
        </div>
    </nav>
</header>
