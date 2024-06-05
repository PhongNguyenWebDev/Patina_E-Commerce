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
                                Danh Sách Banner Top
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên Banner</th>
                                    <th>Link</th>
                                    <th>Ngày Tạo</th>
                                    <th>Ngày Cập Nhật</th>
                                    <th class="text-right">Chỉnh Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($banners))
                                    @foreach ($banners as $item)
                                        <tr>
                                            <td><img src="{{ $item->image }}" alt="" width="100px"></td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->link }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->updated_at ?? 'null' }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('admin.banner-top.edit', $item) }}"
                                                    class="btn btn-primary btn-sm mb-1">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>Không có banner nào</td>
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
