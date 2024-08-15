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
    <div class="page-header">
        <form class="row" method="POST" action="{{ route('admin.coupons.update', $coupon) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $coupon->id }}">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Code</label>
                    <input type="text" class="form-control" id="name" value="{{ $coupon->code }}" name="code"
                        placeholder="Nhập Code">
                    @error('code')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="discount_type">Dạng Coupon</label>
                    <select class="form-control" id="discount_type" name="discount_type">
                        @foreach ($discount_type as $type)
                            <option value="{{ $type }}" {{ $type == $coupon->discount_type ? 'selected' : '' }}>
                                {{ $type }}</option>
                        @endforeach
                    </select>
                    @error('discount_type')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="text" class="form-control" id="discount" value="{{ $coupon->discount }}"
                        name="discount" placeholder="Nhập Discount">
                    @error('discount')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="class">Giá tối thiểu</label>
                    <input type="text" class="form-control" id="class" value="{{ $coupon->min_price }}"
                        name="min_price" placeholder="Nhập giá tối thiểu để được sử dụng voucher">
                    @error('min_price')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="class">Giá giảm tối đa</label>
                    <input type="text" class="form-control" id="class" value="{{ $coupon->max_price }}"
                        name="max_price" placeholder="Nhập giá giảm tối đa để được sử dụng voucher">
                    @error('max_price')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="usage_limit">Tồn kho</label>
                    <input type="text" class="form-control" id="usage_limit" value="{{ $coupon->usage_limit }}"
                        name="usage_limit" placeholder="Nhập giới hạn coupon">
                    @error('usage_limit')
                        <span style="color: red"><i
                                class="fa-solid fa-circle-exclamation fa-beat"></i>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="user_specific">Ai được sử dụng?</label>
                    <select class="form-control" id="user_specific" name="user_specific">
                        <option value="0" {{ $coupon->user_specific == 0 ? 'selected' : '' }}>Tất cả</option>
                        <option value="1" {{ $coupon->user_specific == 1 ? 'selected' : '' }}>Người dùng đã lưu
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_date">Ngày bắt đầu</label>
                    <input type="date" class="form-control" id="start_date" value="{{ $coupon->start_date }}"
                        name="start_date">
                    @error('start_date')
                        <span style="color: red"><i
                                class="fa-solid fa-circle-exclamation fa-beat"></i>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="end_date">Ngày kết thúc</label>
                    <input type="date" class="form-control" id="end_date" value="{{ $coupon->end_date }}"
                        name="end_date">
                    @error('end_date')
                        <span style="color: red"><i
                                class="fa-solid fa-circle-exclamation fa-beat"></i>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea class="form-control" name="description" id="description">{{ $coupon->description }}</textarea>
                    @error('description')
                        <span style="color: red"><i
                                class="fa-solid fa-circle-exclamation fa-beat"></i>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                <button type="reset" class="btn btn-danger">Nhập Lại</button>
            </div>
        </form>
    </div>
@endsection
