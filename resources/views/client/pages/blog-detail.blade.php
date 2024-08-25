@extends('layouts.client')
@section('content')
    <main class="container-fluid p-0 blog-detail-main">
        <img class="img-fluid" src="{{ asset($blog->image) }}" alt="Bài viết {{ $blog->slug }}">
    </main>
    <section class="container my-5">
        <div class="container my-3">
            <h1 class="text-center">{{ $blog->name }}</h1>
        </div>
        <nav aria-label="breadcrumb mb-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="text-decoration: none; color: black;" href="#">Trang chủ</a>
                </li>
                <li class="breadcrumb-item"><a style="text-decoration: none; color: black;" href="#">Bài viết</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $blog->name }}</li>
            </ol>
            <div class="d-flex mb-5 mt-2">
                <div class="d-flex align-items-center me-2">
                    <i class="fa-regular fa-clock"></i>
                    <p class="m-0 mx-1 fs-6" style="color: var(--secondary-1100-color);">
                        {{ $blog->created_at->format('d/m/Y') }}
                    </p>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fa-regular fa-comment"></i>
                    <p class="m-0 mx-1 fs-6" style="color: var(--secondary-1100-color);">{{ $blog->commentsCount }} Bình
                        luận</p>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-xl-8 col-12">
                {!! $blog->content !!}
            </div>
            <div class="col-xl-4 col-12">
                <h4 class="fw-bold mb-3">Bài viết phổ biến</h4>
                @foreach ($newBlogs as $item)
                    <div class="row g-2 mb-2">
                        <a class="nav-link d-flex" href="{{ $item->slug }}">
                            <img class="img-fluid object-fit-cover col-3" src="{{ $item->image }}" alt="">
                            <div class="col-9 ms-2">
                                <h6 class="fw-semibold">{{ $item->name }}</h6>
                                <p class="m-0 fs-6 text-secondary">
                                    {!! substr($item->content, 40, 80) !!} <span>...</span>
                                </p>
                                <p class="m-0">{{ $item->created_at->format('d/m/Y') }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Binh luan -->
    <section class="container mb-5">
        <h3>Bình luận</h3>
        <div id="commentsContainer">
            @include('client.pages.partials.comments')
        </div>
        <form action="{{ route('client.comments.store', $blog->id) }}" id="commentForm" method="POST"
            class="p-commentform">
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
                <button type="submit" class="btn border fs-5 my-2 me-xl-5 shadow-sm mb-5 rounded btn-dark">Gửi</button>
            </div>
        </form>
    </section>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#commentForm').on('submit', function(e) {
            e.preventDefault(); // Ngăn chặn gửi form mặc định

            var form = $(this);
            var url = form.attr('action');
            var data = form.serialize(); // Lấy dữ liệu từ form

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Xóa nội dung textarea sau khi gửi thành công
                        form.find('textarea[name="content"]').val('');
                        // Cập nhật danh sách bình luận
                        $('#commentsContainer').html(response.commentsHtml);
                    } else {
                        alert(response.error); // Hiển thị thông báo lỗi nếu có
                    }
                },
                error: function(xhr) {
                    alert(
                        'Có lỗi xảy ra, vui lòng thử lại.'
                    ); // Thông báo lỗi nếu yêu cầu AJAX thất bại
                }
            });
        });
    });
</script>
