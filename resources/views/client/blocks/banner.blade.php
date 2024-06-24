<main class="container-fluid">
    <div class="container d-flex flex-column flex-xl-row align-items-center justify-content-between ">
        <div class="col-12 col-xl-6">
            <h1>{{ $title }}</h1>
            <p class="text-banner pt-3 pt-xl-5 pb-3">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet
                velit.
                Aliquam vulputate velit imperdiet
                dolor tempor tristique.</p>
            <div class="d-flex align-items-center">
                <a class="btn-home nav-link" href="{{ route('client.home-page') }}">Trang chủ</a>
                <a class="btn-explore nav-link" href="{{ route('client.shop-page') }}">Khám phá</a>
            </div>
        </div>
        <div class="col-12 col-xl-6 d-flex justify-content-xl-end justify-content-center">
            <img class="w-75" src="/assets/clients/img/Image-banner.png" alt="">
        </div>
    </div>
</main>
