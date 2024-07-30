@extends('layouts.client')
@section('content')
    <main class="container-fluid p-0" style="height: 30rem;">
        <img class="img-fluid" src="{{ asset('assets/clients/img/blogimage.png') }}" alt="">
    </main>
    <section class="container my-5">
        <div class="container my-3">
            <h1 class="fs-1 fw-bold text-center">IDEAS FOR LIVING ROOM</h1>
        </div>
        <nav aria-label="breadcrumb mb-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="text-decoration: none; color: black;" href="#">Trang chủ</a>
                </li>
                <li class="breadcrumb-item"><a style="text-decoration: none; color: black;" href="#">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ideas for living room</li>
            </ol>
            <div class="d-flex mb-5 mt-2">
                <div class="d-flex align-items-center me-2">
                    <i class="fa-regular fa-clock"></i>
                    <p class="m-0 mx-1 fs-6" style="color: var(--secondary-1100-color);">20/4/2024</p>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fa-regular fa-comment"></i>
                    <p class="m-0 mx-1 fs-6" style="color: var(--secondary-1100-color);">2 Bình luận</p>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-xl-7 col-12">
                <p class="fs-5 text-start text-break">Fusce mattis nunc lacus, vulputate facilisis dui efficitur ut.
                    Vestibulum sit amet metus euismod,
                    condimentum lectus id, ultrices sem. Morbi in erat malesuada, sollicitudin massa at, tristique nisl.
                    Maecenas id eros scelerisque, vulputate tortor quis, efficitur arcu. Aenean lacus mi, porttitor quis
                    dapibus a, tincidunt vitae arcu. Etiam dolor sem, luctus id risus vel, ultricies dignissim lacus.
                    Fusce mattis nunc lacus, vulputate facilisis dui efficitur ut. Vestibulum sit amet metus euismod,
                    condimentum lectus id, ultrices sem. Morbi in erat malesuada, sollicitudin massa at, tristique nisl.
                    Maecenas id eros scelerisque, vulputate tortor quis, efficitur arcu. Aenean lacus mi, porttitor quis
                    dapibus a, tincidunt vitae arcu. Etiam dolor sem, luctus id risus vel, ultricies dignissim lacus.
                </p>
                <p class="fs-5 text-start text-break">Fusce mattis nunc lacus, vulputate facilisis dui efficitur ut.
                    Vestibulum sit amet metus euismod,
                    condimentum lectus id, ultrices sem. Morbi in erat malesuada, sollicitudin massa at, tristique nisl.
                    Maecenas id eros scelerisque, vulputate tortor quis, efficitur arcu. Aenean lacus mi, porttitor quis
                    dapibus a, tincidunt vitae arcu. Etiam dolor sem, luctus id risus vel, ultricies dignissim lacus.
                    Fusce mattis nunc lacus, vulputate facilisis dui efficitur ut. Vestibulum sit amet metus euismod,
                    condimentum lectus id, ultrices sem. Morbi in erat malesuada, sollicitudin massa at, tristique nisl.
                    Maecenas id eros scelerisque, vulputate tortor quis, efficitur arcu. Aenean lacus mi, porttitor quis
                    dapibus a, tincidunt vitae arcu. Etiam dolor sem, luctus id risus vel, ultricies dignissim lacus.
                </p>
                <p class="fs-5 text-start text-break">Fusce mattis nunc lacus, vulputate facilisis dui efficitur ut.
                    Vestibulum sit amet metus euismod,
                    condimentum lectus id, ultrices sem. Morbi in erat malesuada, sollicitudin massa at, tristique nisl.
                    Maecenas id eros scelerisque, vulputate tortor quis, efficitur arcu. Aenean lacus mi, porttitor quis
                    dapibus a, tincidunt vitae arcu. Etiam dolor sem, luctus id risus vel, ultricies dignissim lacus.
                    Fusce mattis nunc lacus, vulputate facilisis dui efficitur ut. Vestibulum sit amet metus euismod,
                    condimentum lectus id, ultrices sem. Morbi in erat malesuada, sollicitudin massa at, tristique nisl.
                    Maecenas id eros scelerisque, vulputate tortor quis, efficitur arcu. Aenean lacus mi, porttitor quis
                    dapibus a, tincidunt vitae arcu. Etiam dolor sem, luctus id risus vel, ultricies dignissim lacus.
                </p>
            </div>
            <div class="col-xl-5 col-12">
                <h3 class="fs-3 fw-bold my-3">Bài viết phổ biến</h3>
                <div class="row g-2">
                    <img class="img-thumbnail col-3" src="{{ asset('assets/clients/img/blogimage.png') }}" alt="">
                    <div class="col-9">
                        <h4 class="fs-5 fw-semibold">IDEAS FOR LIVING ROOM</h4>
                        <p class="m-0 fs-6" style="color: var(--secondary-1100-color);">Vestibulum sit amet metus
                            euismod,
                            condimentum lectus id, ultrices in erat ...</p>
                        <p class="m-0 fs-6" style="color: var(--secondary-1100-color);">20/04/2024</p>
                    </div>
                </div>
                <!-- item 2 -->
                <div class="row g-2 my-2">
                    <img class="img-thumbnail col-3" src="{{ asset('assets/clients/img/blogimage.png') }}" alt="">
                    <div class="col-9">
                        <h4 class="fs-5 fw-semibold">IDEAS FOR LIVING ROOM</h4>
                        <p class="m-0 fs-6" style="color: var(--secondary-1100-color);">Vestibulum sit amet metus
                            euismod,
                            condimentum lectus id, ultrices in erat ...</p>
                        <p class="m-0 fs-6" style="color: var(--secondary-1100-color);">20/04/2024</p>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="row g-2">
                    <img class="img-thumbnail col-3" src="{{ asset('assets/clients/img/blogimage.png') }}" alt="">
                    <div class="col-9">
                        <h4 class="fs-5 fw-semibold">IDEAS FOR LIVING ROOM</h4>
                        <p class="m-0 fs-6" style="color: var(--secondary-1100-color);">Vestibulum sit amet metus
                            euismod,
                            condimentum lectus id, ultrices in erat ...</p>
                        <p class="m-0 fs-6" style="color: var(--secondary-1100-color);">20/04/2024</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Binh luan -->
    <section class="container mb-5">
        @include('client.pages.partials.comments')
        <form action="{{ route('client.comments.store', $blog->id) }}" method="POST" class="p-commentform">
            @csrf
            <div class="d-flex justify-content-between">
                <div
                    class="avatar rounded-circle border d-xl-flex d-none justify-content-center align-items-center mx-2 col-3">
                    <i class="fa-regular fa-user"></i>
                </div>
                <textarea name="content" class="w-100 rounded-2 p-1" style="height: 10rem; border-color: gray;"
                    placeholder="Viết bình luận của bạn..."></textarea>
            </div>
            <div class="w-25 text-xl-center pe-xl-5">
                <button type="submit" class="btn border fs-5 my-2 me-xl-5 shadow-sm mb-5 rounded btn-comment">Gửi</button>
            </div>
        </form>
    </section>
@endsection
