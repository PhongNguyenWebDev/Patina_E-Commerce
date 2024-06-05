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
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title">
                                Danh Sách Tài Khoản
                            </div>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            <a class="btn btn-danger" href="{{ route('admin.users.create') }}">+ Thêm tài khoản</a>
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
                                            <th>Mã Tài Khoản </th>
                                            <th>Tên Tài Khoản</th>
                                            <th>Email</th>
                                            <th>Số Điện Thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Chức Năng</th>
                                            <th>Trạng Thái</th>
                                            <th>Ngày Tạo</th>
                                            <th>Ngày Cập Nhật</th>
                                            <th class="text-right">Chỉnh sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{!! $item->role == 0
                                                    ? '<a class="font-weight-bold text-danger">ADMIN</a>'
                                                    : '<a class="font-weight-bold text-dark">MEMBER</a>' !!}
                                                </td>
                                                <td>{!! $item->active == 1
                                                    ? '<a class="btn btn-primary">Đã kích hoạt</a>'
                                                    : '<a class="btn btn-danger">Chưa kích hoạt</a>' !!}
                                                </td>

                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>

                                                <td class="text-right">
                                                    <a href="{{ route('admin.users.edit', $item) }}"
                                                        class="btn btn-primary btn-sm mb-1">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.users.destroy', $item) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            onclick="return confirm('Bạn có chắc muốn xóa user {{ $item->name }}?')"
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
                                {{ $users->appends(request()->all())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
