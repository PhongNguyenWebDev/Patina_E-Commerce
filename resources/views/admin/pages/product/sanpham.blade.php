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
                                Danh Sách Sản Phẩm
                            </div>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            <a class="btn btn-danger" href="{{ route('admin.products.create') }}">+ Thêm sản phẩm</a>
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
                                            <th>Ảnh Sản Phẩm </th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Giá Sản Phẩm</th>
                                            <th>Giá Khuyến Mãi</th>
                                            <th>Sản Phẩm Hot</th>
                                            <th>Ngày Tạo</th>
                                            <th>Ẩn/Hiện</th>
                                            <th class="text-right">Chỉnh sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($products))
                                            @foreach ($products as $item)
                                                <tr>
                                                    <td>
                                                        <img style="width: 76px"
                                                            src="{{ $item->images }}"
                                                            alt="">
                                                    </td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ number_format($item->price) }} VNĐ</td>
                                                    <td>{{ number_format($item->sale_price) == 0 ? 'Không khuyến mãi' : number_format($item->sale_price) . ' VNĐ' }}
                                                    </td>
                                                    <td>{{ $item->hot == 0 ? 'Không' : 'Hot' }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->status == 0 ? 'Ẩn' : 'Hiện' }}</td>
                                                    <td class="text-right">
                                                        <a href="{{ route('admin.products.edit', $item->slug) }}"
                                                            class="btn btn-primary btn-sm mb-1">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.products.destroy', $item->slug) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                onclick="return confirm('Bạn có chắc muốn xóa sản phẩm {{ $item->name }}?')"
                                                                type="submit" class="btn btn-danger btn-sm mb-1">
                                                                <i class="far fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>Không có sản phẩm nào</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class=" mt-3 pagination justify-content-center">
                                {{ $products->appends(request()->all())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
