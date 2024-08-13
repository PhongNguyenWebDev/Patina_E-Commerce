@extends('layouts.client')
@section('content')
    @include('client.blocks.banner')
    <section class="container my-5">
        <div class="d-flex flex-xl-row flex-column">
            <div class="col-xl-5 col-12">
                <h2>
                    Chào mừng bạn đến với Patina!
                </h2>
            </div>
            <div class="col-xl-7 col-12 pt-3 pt-xl-0">
                <p>
                    Patina Fashion Store là điểm đến lý tưởng cho những ai yêu thích phong cách thanh lịch và sự độc đáo.
                    Với không gian trưng bày tinh tế, từng món đồ tại Patina đều mang đậm dấu ấn của sự sang trọng và sự cầu
                    kỳ trong từng chi tiết. Từ những bộ cánh dành cho công sở đến những trang phục dạo phố, mỗi sản phẩm tại
                    cửa hàng đều được chọn lọc kỹ càng, đáp ứng được mọi sở thích và nhu cầu của các tín đồ thời trang.
                    Patina không chỉ là nơi mua sắm mà còn là điểm hẹn lý tưởng để khám phá và thể hiện phong cách cá nhân
                    một cách hoàn hảo.
                </p>
            </div>
        </div>
    </section>
    <!-- video -->
    <section class="container">
        <div class="position-relative">
            <video id="myVideo" class="w-100" style="border: 1px solid var(--primary-900-color)" controls>
                <source src="{{ asset('assets/clients/intro.mp4') }}" type="video/mp4">
            </video>
        </div>
    </section>
    <!-- Our Team -->
    <section class="container our-team mt-5">
        <div class="d-flex flex-column align-items-center text-center justify-content-center">
            <h2>Đội Ngũ Của Chúng Tôi</h2>
            <p style="color: #00051654;">Đội ngũ của chúng tôi luôn sẵn sàng phục vụ bạn với sự chuyên nghiệp và tận
                tâm.<br>
                Chúng tôi không ngừng nỗ lực để mang lại giá trị tốt nhất cho khách hàng.</p>

        </div>
        <div class="row g-2 my-5">
            <div class="col-12 col-xl-3 text-center">
                <img class="object-fit-cover img-fluid w-100 h-75"
                    src="{{ asset('assets/clients/img/img-intro/khoa.png') }}" alt="">
                <h6 class="mt-xl-3">Đinh Minh Khoa</h6>
                <p class="m-1" style="color: #00051654;">Giám Đốc Nhóm Nội Bộ</p>
                <div class="d-flex justify-content-center">
                    <div class="icon-footer">
                        <i class="fa-brands fa-facebook-f "></i>
                    </div>
                    <div class="icon-footer mx-2">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div class="icon-footer">
                        <i class="fa-brands fa-youtube"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-3 text-center">
                <img class="object-fit-cover img-fluid w-100 h-75"
                    src="{{ asset('assets/clients/img/img-intro/phong.png') }}" alt="">
                <h6 class="mt-xl-3">Nguyễn Tuấn Phong</h6>
                <p class="m-1" style="color: #00051654;">Nhân viên</p>
                <div class="d-flex justify-content-center">
                    <div class="icon-footer">
                        <i class="fa-brands fa-facebook-f "></i>
                    </div>
                    <div class="icon-footer mx-2">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div class="icon-footer">
                        <i class="fa-brands fa-youtube"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-3 text-center">
                <img class="object-fit-cover img-fluid w-100 h-75"
                    src="{{ asset('assets/clients/img/img-intro/tuananh.png') }}" alt="">
                <h6 class="mt-xl-3">Bùi Tuấn Anh</h6>
                <p class="m-1" style="color: #00051654;">Nhân viên</p>
                <div class="d-flex justify-content-center">
                    <div class="icon-footer">
                        <i class="fa-brands fa-facebook-f "></i>
                    </div>
                    <div class="icon-footer mx-2">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div class="icon-footer">
                        <i class="fa-brands fa-youtube"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-3 text-center">
                <img class="object-fit-cover img-fluid w-100 h-75"
                    src="{{ asset('assets/clients/img/img-intro/tuan.png') }}" alt="">
                <h6 class="mt-xl-3">Nguyễn Dương Tuấn</h6>
                <p class="m-1" style="color: #00051654;">Nhân viên</p>
                <div class="d-flex justify-content-center">
                    <div class="icon-footer">
                        <i class="fa-brands fa-facebook-f "></i>
                    </div>
                    <div class="icon-footer mx-2">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div class="icon-footer">
                        <i class="fa-brands fa-youtube"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Comment show -->
    <section class="container my-5">
        <div class="p-xl-5 p-4 row justify-content-center" style="background-color:#f0eff5; ">
            <div
                class="d-flex p-xl-5 p-2 bg-white  text-center align-items-center flex-column justify-content-center position-relative ">
                <div class="position-absolute top-0 start-50  translate-middle mt-xl-2">
                    <img class="object-fit-cover"
                        style="width: 5em; height: 5em; border-radius: 50%; border:0.5px solid rgb(210, 207, 207)"
                        src="{{ asset('assets/clients/img/img-intro/khoa.png') }}" alt="">
                </div>
                <div class="pt-xl-0 pt-5">
                    <p style="font-size: 20px;">Đinh Minh Khoa</p>
                    <p style="color: #00051654;">Giám Đốc Nhóm Nội Bộ, Công Ty PATINA</p>
                    <h3 style="font-weight: var(--Bold);" class="fs-2">Giá trị lớn lao của sự bền vững</h3>
                    <div class="d-flex justify-content-center">
                        <p class="w-75 fs-5">Luôn tiến về phía trước mặc dù con đường đôi khi khó khăn. Đối mặt với thử
                            thách bằng tinh thần dũng cảm. Từng bước chinh phục và vượt qua mọi rào cản. Dù là nhỏ hay lớn,
                            tất cả đều cần sự kiên nhẫn và quyết tâm. Mỗi một trải nghiệm đều là một bài học quý giá. Và với
                            lòng quyết tâm, chúng ta sẽ đạt được sự hoàn thiện, mang đến giá trị tốt đẹp cho bản thân và cho
                            cộng đồng.</p>
                    </div>
                </div>
                <!-- Rate -->
                <div class="d-flex">
                    <img src="img/Icon/Star 1.png" alt="">
                    <img src="img/Icon/Star 1.png" alt="">
                    <img src="img/Icon/Star 1.png" alt="">
                    <img src="img/Icon/Star 1.png" alt="">
                    <img src="img/Icon/Star 1.png" alt="">
                </div>
                <div class="position-absolute top-50 end-0 translate-middle-y" style="margin-right: 5rem;">
                    <img src="img/Icon/daunhay.png" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
