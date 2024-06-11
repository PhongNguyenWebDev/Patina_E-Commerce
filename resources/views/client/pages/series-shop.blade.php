@extends('layouts.client')
@section('content')
    @include('client.blocks.banner')
    <section class="container my-3">
        <p class="fs-1 fw-semibold">Hệ thống cửa hàng</p>
        <div class="row g-3 px-3">
            <div class="col-12 col-xl-6 d-flex flex-row align-items-center justify-content-between ">
                <h4 class="me-3 fs-3" style="color:#00051677 ">Tỉnh/thành phố:*</h4>
                <select class="form-select form-select-lg" style="border-color: var(--primary-700-color);"
                    aria-label="Large select example">
                    <option selected>Chọn thành phố</option>
                    <option value="1">Thành phố Hồ Chí Minh</option>
                    <option value="2">Thành phố Biên Hòa</option>
                    <option value="3">Thành phố Buôn Mê Thuộc</option>
                </select>
            </div>
            <div class="col-12 col-xl-6 d-flex flex-row align-items-center justify-content-between ">
                <h4 class="me-3 fs-3" style="color:#00051677">Quận:*</h4>
                <select class="form-select form-select-lg" style="border-color: var(--primary-700-color);"
                    aria-label="Large select example">
                    <option selected>Chọn quận</option>
                    <option value="1">Quận Gò Vấp</option>
                    <option value="2">Quận Phú Nhuận</option>
                    <option value="3">Quận 1</option>
                </select>
            </div>
        </div>
        <div class="row g-5 my-2">
            <p class="fs-1 fw-semibold">Danh sách cửa hàng</p>
            <div class="col-6 col-xl-3 mt-2">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.947928514971!2d106.67329257451765!3d10.815296958476592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175291e2c105bdf%3A0xcffd72b37ea3be71!2zMTg5IMSQLiBC4bqhY2ggxJDhurFuZywgUGjGsOG7nW5nIDMsIEfDsiBW4bqlcCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1716564430141!5m2!1svi!2s"
                    height="300px" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="d-flex align-items-center px-3">
                    <i class="fa-solid fa-location-dot fs-3"></i>
                    <p class="m-0 px-2 text-wrap" style="color: var(--secondary-1000-color);">198 Bach Dang Street, Go
                        Vap District, Ho Chi Minh City</p>
                </div>
            </div>
            <div class="col-6 col-xl-3 mt-2">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.947928514971!2d106.67329257451765!3d10.815296958476592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175291e2c105bdf%3A0xcffd72b37ea3be71!2zMTg5IMSQLiBC4bqhY2ggxJDhurFuZywgUGjGsOG7nW5nIDMsIEfDsiBW4bqlcCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1716564430141!5m2!1svi!2s"
                    height="300px" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="d-flex align-items-center px-3">
                    <i class="fa-solid fa-location-dot fs-3"></i>
                    <p class="m-0 px-2 text-wrap" style="color: var(--secondary-1000-color);">198 Bach Dang Street, Go
                        Vap District, Ho Chi Minh City</p>
                </div>
            </div>
            <div class="col-6 col-xl-3 mt-2">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.947928514971!2d106.67329257451765!3d10.815296958476592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175291e2c105bdf%3A0xcffd72b37ea3be71!2zMTg5IMSQLiBC4bqhY2ggxJDhurFuZywgUGjGsOG7nW5nIDMsIEfDsiBW4bqlcCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1716564430141!5m2!1svi!2s"
                    height="300px" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="d-flex align-items-center px-3">
                    <i class="fa-solid fa-location-dot fs-3"></i>
                    <p class="m-0 px-2 text-wrap" style="color: var(--secondary-1000-color);">198 Bach Dang Street, Go
                        Vap District, Ho Chi Minh City</p>
                </div>
            </div>
            <div class="col-6 col-xl-3 mt-2">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.947928514971!2d106.67329257451765!3d10.815296958476592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175291e2c105bdf%3A0xcffd72b37ea3be71!2zMTg5IMSQLiBC4bqhY2ggxJDhurFuZywgUGjGsOG7nW5nIDMsIEfDsiBW4bqlcCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1716564430141!5m2!1svi!2s"
                    height="300px" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="d-flex align-items-center px-3">
                    <i class="fa-solid fa-location-dot fs-3"></i>
                    <p class="m-0 px-2 text-wrap" style="color: var(--secondary-1000-color);">198 Bach Dang Street, Go
                        Vap District, Ho Chi Minh City</p>
                </div>
            </div>
        </div>
    </section>
@endsection
