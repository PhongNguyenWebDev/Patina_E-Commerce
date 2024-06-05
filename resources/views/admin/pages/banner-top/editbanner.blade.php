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
        <form class="row" method="POST" action="{{ route('admin.banner-top.update', $banner) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Tên Banner</label>
                    <input type="text" class="form-control" id="name" value="{{ $banner->name }}" name="name"
                        placeholder="Nhập Tên Banner">
                    @error('name')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" value="{{ $banner->link }}" id="link" name="link"
                        placeholder="Nhập Link">
                    @error('link')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="image">Hình Ảnh</label>
                    <input type="file" class="form-control-file" name="image">
                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ $banner->image }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    @error('image')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
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
