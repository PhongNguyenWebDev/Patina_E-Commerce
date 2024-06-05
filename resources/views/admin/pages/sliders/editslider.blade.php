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
    <div class="page-header">
        <form class="row" method="POST" action="{{ route('admin.sliders.update', $slider) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <div class="form-group">
                    <label for="event">Event</label>
                    <input type="text" class="form-control" id="event" value="{{ $slider->event }}" name="event"
                        placeholder="Nhập Event">
                    @error('event')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Tiêu Đề Slider</label>
                    <input type="text" class="form-control" value="{{ $slider->title }}" id="title" name="title"
                        placeholder="Nhập tiêu đề slider">
                    @error('title')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="summary">Mô tả nhanh</label>
                    <textarea name="summary" id="summary" class="form-control">{{ $slider->summary }}</textarea>
                    @error('summary')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image">Hình Ảnh</label>
                    <input type="file" class="form-control-file" name="image">
                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ $slider->image }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    @error('image')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="active">Ẩn/Hiện</label>
                    <select class="form-control" id="active" name="status">
                        <option value="0" {{ $slider->status == 0 ? 'selected' : '' }}>Ẩn</option>
                        <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>Hiện</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                <button type="reset" class="btn btn-danger">Nhập Lại</button>
            </div>
        </form>
    </div>
@endsection
