@extends('layouts.client')
@section('content')
    @include('client.blocks.banner')
    <section class="container my-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="nav-link" href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bài viết</li>
            </ol>
        </nav>
        <div class="container-fluid">
            <img class="img-fluid" src="img/blogimage.png" alt="">
            <div class="d-flex flex-row">
                {{-- <div class="col-xl-1 col-2 border p-0 align-items-center d-flex justify-content-center me-2"
                    style="width: 5rem; height: 5rem;">
                    <p class="text-break text-center fs-5 m-0">25 <br> Tháng 4</p>
                </div> --}}
                <div class="col-xl-12 col-10">
                    @foreach ($blogs as $blog)
                        <h3 class="fs-3 fw-bold"><a class="nav-link" href="{{ route('client.blog-detail', $blog->slug) }}">
                                {{ $blog->name }}</a>
                        </h3>
                        <div class="d-flex">
                            <div class="d-flex align-items-center me-2">
                                <i class="fa-regular fa-clock"></i>
                                <p class="m-0 mx-1 fs-6" style="color: var(--secondary-1100-color);">
                                    {{ $blog->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-comment"></i>
                                <p class="m-0 mx-1 fs-6" style="color: var(--secondary-1100-color);">
                                    {{ $blog->comments_count }}
                                    Bình luận</p>
                            </div>
                        </div>
                        <p style="color: var(--secondary-1100-color);" class="m-0 my-xl-3 my-2 fs-6 ">Fusce mattis nunc
                            lacus,
                            vulputate facilisis dui efficitur ut. Vestibulum sit amet metus euismod,
                            condimentum lectus id, ultrices sem. Morbi in erat malesuada, sollicitudin massa at, tristique
                            nisl. Maecenas id eros scelerisque, vulputate tortor quis, efficitur arcu</p>
                        <div>
                            <img class="img-fluid object-fit-cover" style="height: 50vh; width:100%"
                                src="{{ $blog->image }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
