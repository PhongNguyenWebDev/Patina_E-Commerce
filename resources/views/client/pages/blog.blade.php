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
                <p style="color: var(--secondary-1100-color);" class="m-0 my-xl-3 my-2 fs-6 ">{{ $blog->quote }}</p>
                <div class="card mb-3">
                    <img class="img-blog" srcset="{{ $blog->image }} 1x" alt="">
                </div>
            @endforeach


        </div>
    </section>
@endsection
