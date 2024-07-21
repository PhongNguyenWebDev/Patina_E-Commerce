<footer class="footer container-fluid pt-xl-5 pt-2 footer" style="background-color: #f0eff5;">
    <div class="row px-xl-5">
        <div class="col-lg-4 col-12">
            <div class="logoweb d-flex align-items-center m-xl-4 ps-xl-3 m-3 ">
                <h3 class="web-name">
                    PATINA
                </h3>
            </div>
            <p class="ms-xl-4 px-3 text-ms-center text-break" style="color: #797b86; width: 90%;">
                V Egestas dapibus massa cursus nibh adipiscing. Praesent nisl faucibus neque imperdiet mollis.
                Blandit sit consectetur placerat sapien amet. A pharetra sem massa bibendum at aliquam. Rhoncus et
                vitae nulla nec
            </p>
            <div class="d-flex ms-xl-4 px-xl-3 ms-3 justify-content-between" style="width: 50%;">
                @foreach ($socialn as $social)
                    <div class="icon-footer">
                        <a class="nav-link" href="{{ $social->link }}">{!! $social->icon !!}</a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-8 mt-4 d-flex justify-content-end">
            <div class="container-fluid">
                <div class="row d-flex justify-content-xl-end">
                    <div class="col-xl-3 col-6">
                        <h5 class="fs-3">Cửa hàng</h5>
                        <div class="p-0 my-3">
                            <a href="" class="list-group-item">Áo</a>
                            <a href="" class="list-group-item">Quần</a>
                            <a href="" class="list-group-item">Quần áo bộ</a>
                            <a href="" class="list-group-item">Giày</a>
                            <a href="" class="list-group-item">Phụ kiện thời trang</a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-6">
                        <h5 class="fs-3">Patina</h5>
                        <div class="p-0 my-3">
                            <a href="" class="list-group-item">Trang chủ</a>
                            <a href="" class="list-group-item">Cửa hàng</a>
                            <a href="" class="list-group-item">Giới thiệu</a>
                            <a href="" class="list-group-item">Dịch vụ</a>
                            <a href="" class="list-group-item">Liên hệ</a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-6 pt-xl-0 pt-3">
                        <div class="flex-xl-row">
                            <div class="my-ms-3">
                                <h5 class="fs-3">Địa chỉ</h5>
                                <div class="my-3">
                                    @foreach ($locations as $location)
                                        <span class="text-break"><i class="fa-solid fa-location-dot"></i>
                                            {{ $location->detail }}</span><br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-3">
                                <h5 class="fs-3">Giờ mở cửa</h5>
                                <div class="my-3">
                                    @foreach ($business_hours as $business_hour)
                                        <span class="text-break">{{ $business_hour->detail }}</span><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-xl-5 d-flex align-items-center justify-content-between py-2">
        <div class="col-xl-9 col-6 ps-xl-4">
            <p class="mb-0 ms-xl-3 ">© Copyright Patina 2024.</p>
        </div>
        <div class="col-xl-3 col-6 d-flex flex-row justify-content-end align-items-center">
            <a href=""><img class="w-50" src="{{ asset('assets/clients/img/Icon/american-express.png') }}"
                    alt=""></a>
            <a href=""><img class="w-50" src="{{ asset('assets/clients/img/Icon/symbols.png') }}"
                    alt=""></a>
            <a href=""><img class="w-50" src="{{ asset('assets/clients/img/Icon/money.png') }}"
                    alt=""></a>
            <a href=""><img class="w-50" src="{{ asset('assets/clients/img/Icon/card.png') }}"
                    alt=""></a>
        </div>
    </div>
</footer>
