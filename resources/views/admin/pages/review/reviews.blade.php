@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="page-title mb-0">{{ $title }}</h3>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb mb-0 p-0 float-right">
                    <li class="breadcrumb-comment"><a href="{{ route('admin.home') }}"><i class="fas fa-home p-1"></i> Home</a>
                    </li>
                    <li class="breadcrumb-comment"><span>{{ $title }}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-comments-center">
                        <div class="col-sm-6">
                            <div class="page-title">
                                Danh Sách Đánh Giá
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="table-responsive">
                                <table class="table custom-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID Tài Khoản</th>
                                            <th>Tên Tài Khoản</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Nội Dung Đánh GIá</th>
                                            <th>Số Sao Đánh Giá</th>
                                            <th>Trạng Thái</th>
                                            <th>Ngày Tạo</th>
                                            <th>Ngày Cập Nhật</th>
                                            <th class="text-right">Chỉnh sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($reviews as $review)
                                            <tr>
                                                <td>{{ $review->user_id }}</td>
                                                <td>{{ $review->user->name }}</td>
                                                <td>{{ $review->product->name }}</td>
                                                <td>{{ $review->reviews }}</td>
                                                <td>{{ $review->rating_point }}</td>
                                                <td>{!! $review->status == 0 ? '<a class="btn btn-primary">Hiện</a>' : '<a class="btn btn-danger">Ẩn</a>' !!}
                                                </td>

                                                <td>{{ $review->created_at }}</td>
                                                <td>{{ $review->updated_at }}</td>

                                                <td class="text-right">
                                                    <form action="{{ route('admin.reviews.update', $review) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status"
                                                            value="{{ $review->status == 1 ? 0 : 1 }}">
                                                        <button type="submit" class="btn btn-primary btn-sm mb-1">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.reviews.destroy', $review) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            onclick="return confirm('Bạn có chắc muốn xóa đánh giá này?')"
                                                            type="submit" class="btn btn-danger btn-sm mb-1">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class=" mt-3 pagination justify-content-center">
                                {{ $reviews->appends(request()->all())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
