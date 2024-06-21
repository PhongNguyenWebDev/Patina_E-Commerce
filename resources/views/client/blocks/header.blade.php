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
                        <a class="nav-link fs-5" href="{{ route('client.home-page') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('client.shop-page') }}">Cửa hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('client.blog-page') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('client.introduce-page') }}">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('client.contact-page') }}">Liên hệ </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('client.series-shop-page') }}">Hệ thống cửa hàng</a>
                    </li>
                </ul>
                <div class="user d-flex align-items-center">
                    <a href="{{ route('client.favorite-page') }}" class="position-relative">
                        <i class="fa-regular fa-heart fa-xl" style="color: #8D6440;"></i>
                        <div class="count position-absolute bottom-50 start-50">
                            <span style="font-size: x-small; color: black">99</span>
                        </div>
                    </a>
                    <a href="{{ route('client.cart-page.index') }}" class="position-relative mx-3">
                        <i class="fa-solid fa-cart-shopping fa-xl" style="color: #8D6440;"></i>
                        <div class="count position-absolute bottom-50 start-50">
                            <span style="font-size: x-small; color: black">99</span>
                        </div>
                    </a>
                    @if (Auth::check())
                    <a href="{{ route('client.home-page') }}"><i class="fa-regular fa-user fa-xl"
                        style="color: #8D6440;"></i></a>   
                    @else
                        <a href="{{ route('logIn-page') }}"><i class="fa-regular fa-user fa-xl"
                            style="color: #8D6440;"></i></a>
                    @endif
                    
                </div>
            </div>
        </div>
    </nav>
</header>
