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
                                Danh Sách Hóa Đơn
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
                                            <th>Mã Hóa Đơn </th>
                                            <th>Tên Người Đặt</th>
                                            <th>Email</th>
                                            <th>Số Điện Thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Trạng Thái</th>
                                            <th>Ngày Tạo</th>
                                            <th>Ngày Cập Nhật</th>
                                            <th class="text-right">Cập Nhật Đơn Hàng</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($orders as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>
                                                    @if ($item->status == 0)
                                                        Chưa xác nhận
                                                    @elseif ($item->status == 1)
                                                        Đã xác nhận
                                                    @elseif ($item->status == 2)
                                                        Đang giao hàng
                                                    @elseif ($item->status == 3)
                                                        Đã giao hàng
                                                    @else
                                                        Đã hủy | Lý do: {{ $item->reason}}
                                                    @endif
                                                </td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>

                                                <td class="text-right">
                                                    <a href="{{ route('admin.orders.edit', $item) }}"
                                                        class="btn btn-primary btn-sm mb-1">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.orders.destroy', $item) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            onclick="return confirm('Bạn có chắc muốn xóa đơn hàng {{ $item->id }}?')"
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
                                {{ $orders->appends(request()->all())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
