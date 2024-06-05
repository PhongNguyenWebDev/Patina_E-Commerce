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
                                Danh Sách Danh Mục
                            </div>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            <a class="btn btn-danger" href="{{ route('admin.category.create') }}">+ Thêm danh
                                mục</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Mã Danh Mục </th>
                                    <th>Tên Danh Mục</th>
                                    <th>Ngày Tạo</th>
                                    <th>Ngày Cập Nhật</th>
                                    <th class="text-right">Chỉnh sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($category))
                                    @foreach ($category as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->updated_at ?? 'null' }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('admin.category.edit', $item->slug) }}"
                                                    class="btn btn-primary btn-sm mb-1">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </td>
                                            <td class="text-left">
                                                <form action="{{ route('admin.category.destroy', $item->slug) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        onclick="return confirm('Bạn có chắc muốn xóa danh mục {{ $item->name }}?')"
                                                        type="submit" class="btn btn-danger btn-sm mb-1">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>Không có danh mục nào</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <div class=" mt-3 pagination justify-content-center">
                        {{ $category->appends(request()->all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
