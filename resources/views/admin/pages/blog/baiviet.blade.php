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
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><span>{{ $title }}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title">
                                Danh Sách Bài Viết
                            </div>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            <a class="btn btn-danger" href="{{ route('admin.blog.create') }}">+ Thêm bài viết</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Mã Bài Viết </th>
                                    <th>Ảnh</th>
                                    <th>Tên Bài Viết</th>
                                    <th>Tác giả</th>
                                    <th>Ngày Tạo</th>
                                    <th>Ngày Cập Nhật</th>
                                    <th>Ẩn/Hiện</th>
                                    <th class="text-right">Chỉnh Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($blogs))
                                    @foreach ($blogs as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td><img src="{{ $item->image }}" alt="" width="100px"></td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->author }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->updated_at ?? 'null' }}</td>
                                            <td>{{ $item->status == 0 ? 'Ẩn' : 'Hiện' }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('admin.blog.edit', $item->slug) }}"
                                                    class="btn btn-primary btn-sm mb-1">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.blog.destroy', $item->slug) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        onclick="return confirm('Bạn có chắc muốn xóa bài viết {{ $item->name }}?')"
                                                        type="submit" class="btn btn-danger btn-sm mb-1">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>Không có bài viết nào</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
