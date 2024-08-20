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
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home p-1"></i> Home</a>
                    </li>
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
                                Danh Sách các Coupon được lưu
                            </div>
                        </div>
                        <div class="col-sm-6 text-sm-right">

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
                                            <th>Người dùng</th>
                                            <th>Ngày đã lưu</th>
                                            <th>Ngày đã sử dụng</th>
                                            <th>Ngày coupon hết hạn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userCoupons as $userCoupon)
                                            <tr>
                                                <td class="text-uppercase">{{ $userCoupon->coupon->code }}</td>
                                                <td>{{ $userCoupon->user->name }}</td>
                                                <td>{{ $userCoupon->saved_at }}</td>
                                                <td>{{ $userCoupon->used_at ? $userCoupon->used_at : 'Chưa sử dụng' }}</td>
                                                <td>{{ $userCoupon->coupon->end_date }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3 pagination justify-content-center">
                                {{ $userCoupons->appends(request()->all())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
