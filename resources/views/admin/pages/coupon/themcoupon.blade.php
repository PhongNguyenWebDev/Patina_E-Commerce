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
        <form class="row" method="POST" action="{{ route('admin.coupons.store') }}">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Code</label>
                    <input type="text" class="form-control" id="name" name="code" value="{{ old('code') }}"
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
                            <option value="{{ $type }}">{{ $type }}</option>
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
                    <input type="text" class="form-control" id="discount" name="discount" value="{{ old('discount') }}"
                        placeholder="Nhập Discount">
                    @error('discount')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="class">Giá tối thiểu</label>
                    <input type="text" class="form-control" id="class" name="min_price"
                        value="{{ old('min_price') }}" placeholder="Nhập giá tối thiểu để được sử dụng voucher">
                    @error('min_price')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="class">Giá giảm tối đa</label>
                    <input type="text" class="form-control" id="class" name="max_price"
                        value="{{ old('max_price') }}" placeholder="Nhập giá giảm tối đa để được sử dụng voucher">
                    @error('max_price')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="usage_limit">Tồn kho</label>
                    <input type="text" class="form-control" id="usage_limit" name="usage_limit"
                        value="{{ old('usage_limit') }}" placeholder="Nhập giới hạn coupon">
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
                        <option value="0">Tất cả</option>
                        <option value="1">Người dùng đã lưu</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_date">Ngày bắt đầu</label>
                    <input type="date" class="form-control" id="start_date" name="start_date"
                        value="{{ old('start_date') }}">
                    @error('start_date')
                        <span style="color: red"><i
                                class="fa-solid fa-circle-exclamation fa-beat"></i>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="end_date">Ngày kết thúc</label>
                    <input type="date" class="form-control" id="end_date" name="end_date"
                        value="{{ old('end_date') }}">
                    @error('end_date')
                        <span style="color: red"><i
                                class="fa-solid fa-circle-exclamation fa-beat"></i>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                    @error('description')
                        <span style="color: red"><i
                                class="fa-solid fa-circle-exclamation fa-beat"></i>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Thêm</button>
                <button type="reset" class="btn btn-danger">Nhập Lại</button>
            </div>
        </form>
    </div>
@endsection
