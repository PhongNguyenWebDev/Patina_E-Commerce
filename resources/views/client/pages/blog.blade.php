@extends('layouts.client2')
@section('content')
    <section class="container my-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="nav-link" href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </nav>
        <div class="container-fluid">
            <img class="img-fluid" src="img/blogimage.png" alt="">
            <div class="d-flex flex-row">
                <div class="col-xl-1 col-2 border p-0 align-items-center d-flex justify-content-center me-2"
                    style="background-color: var(--primary-900-color); width: 5rem; height: 5rem;">
                    <p class="text-break text-center fs-5 text-white m-0 fw-bold">25 <br> Tháng 4</p>
                </div>
                <div class="col-xl-11 col-10">
                    <h3 class="fs-3 fw-bold">IDEAS FOR LIVING ROOM</h3>
                    <div class="d-flex">
                        <div class="d-flex align-items-center me-2">
                            <i class="fa-regular fa-clock"></i>
                            <p class="m-0 mx-1 fs-6" style="color: var(--secondary-1100-color);">20/4/2024</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fa-regular fa-comment"></i>
                            <p class="m-0 mx-1 fs-6" style="color: var(--secondary-1100-color);">2 Bình luận</p>
                        </div>
                    </div>
                    <p style="color: var(--secondary-1100-color);" class="m-0 my-xl-3 my-2 fs-6 ">Fusce mattis nunc lacus,
                        vulputate facilisis dui efficitur ut. Vestibulum sit amet metus euismod,
                        condimentum lectus id, ultrices sem. Morbi in erat malesuada, sollicitudin massa at, tristique
                        nisl. Maecenas id eros scelerisque, vulputate tortor quis, efficitur arcu</p>
                    <!-- Read more -->
                    <p class="d-inline-flex gap-1">
                        <a class="btn btn-readmore" data-bs-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Xem thêm
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="fs-6" style="color: var(--secondary-1100-color);">
                            Some placeholder content for the collapse component. This panel is hidden by default but
                            revealed when the user activates the relevant trigger.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item 2 -->
        <div class="container-fluid">
            <img class="img-fluid" src="img/blogimage.png" alt="">
            <div class="d-flex flex-row">
                <div class="col-xl-1 col-2 border p-0 align-items-center d-flex justify-content-center me-2"
                    style="background-color: var(--primary-900-color); width: 5rem; height: 5rem;">
                    <p class="text-break text-center fs-5 text-white m-0 fw-bold">25 <br> Tháng 4</p>
                </div>
                <div class="col-xl-11 col-10">
                    <h3 class="fs-3 fw-bold">IDEAS FOR LIVING ROOM</h3>
                    <div class="d-flex">
                        <div class="d-flex align-items-center me-2">
                            <i class="fa-regular fa-clock"></i>
                            <p class="m-0 mx-1 fs-6" style="color: var(--secondary-1100-color);">20/4/2024</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fa-regular fa-comment"></i>
                            <p class="m-0 mx-1 fs-6" style="color: var(--secondary-1100-color);">2 Bình luận</p>
                        </div>
                    </div>
                    <p style="color: var(--secondary-1100-color);" class="m-0 my-xl-3 my-2 fs-6 ">Fusce mattis nunc lacus,
                        vulputate facilisis dui efficitur ut. Vestibulum sit amet metus euismod,
                        condimentum lectus id, ultrices sem. Morbi in erat malesuada, sollicitudin massa at, tristique
                        nisl. Maecenas id eros scelerisque, vulputate tortor quis, efficitur arcu</p>
                    <!-- Read more -->
                    <p class="d-inline-flex gap-1">
                        <a class="btn btn-readmore" data-bs-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Xem thêm
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="fs-6" style="color: var(--secondary-1100-color);">
                            Some placeholder content for the collapse component. This panel is hidden by default but
                            revealed when the user activates the relevant trigger.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a class="btn btn-pre fs-6" href=""><i class="fa-solid fa-chevron-left fw-regular fs-6"></i> Trước</a>
            <a class="btn btn-next fs-6" href="">Sau <i class="fa-solid fa-chevron-right fs-6"></i></a>
        </div>
    </section>
@endsection
