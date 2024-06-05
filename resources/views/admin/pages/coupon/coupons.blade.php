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
                                Danh Sách Coupon
                            </div>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            <a class="btn btn-danger" href="{{ route('admin.coupons.create') }}">+ Thêm Coupon</a>
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
                                            <th>Code</th>
                                            <th>Giá Giảm</th>
                                            <th>Giá tối thiểu</th>
                                            <th>Ngày Tạo</th>
                                            <th>Ngày Kết Thúc</th>
                                            <th class="text-right">Chỉnh sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($coupons as $item)
                                            <tr>
                                                <td>{{ $item->code }}</td>
                                                <td>{{ number_format($item->discount) }}</td>
                                                <td>{{ number_format($item->min_price) }}</td>

                                                <td>{{ $item->start_date }}</td>
                                                <td>{{ $item->end_date }}</td>

                                                <td class="text-right">
                                                    <a href="{{ route('admin.coupons.edit', $item) }}"
                                                        class="btn btn-primary btn-sm mb-1">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.coupons.destroy', $item) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            onclick="return confirm('Bạn có chắc muốn xóa coupon {{ $item->code }}?')"
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
                                {{ $coupons->appends(request()->all())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
