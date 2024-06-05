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
        <form class="row" method="POST" action="{{ route('admin.blog.update', $blog->slug) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $blog->id }}">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="name">Tiêu Đề Bài Viết</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Nhập tiêu đề bài viết" value="{{ $blog->name }}">
                    @error('name')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Tác giả</label>
                    <input type="text" class="form-control" id="name" name="author" placeholder="Nhập tên tác giả"
                        value="{{ $blog->author }}">
                    @error('author')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="image">Hình Ảnh</label>
                    <input type="file" class="form-control-file" name="image">
                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ $blog->image }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    @error('image')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="active">Ẩn/Hiện</label>
                    <select class="form-control" id="active" name="status">
                        <option value="0" {{ $blog->status == 0 ? 'selected' : '' }}>Ẩn</option>
                        <option value="1" {{ $blog->status == 1 ? 'selected' : '' }}>Hiện</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Quote</label>
                    <textarea class="form-control" name="quote">{{ $blog->quote }}</textarea>
                    @error('quote')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="content">Nội Dung Bài Viết</label>
                    <textarea class="form-control" name="content" id="ckeditor" cols="30" rows="20">{{ $blog->content }}</textarea>
                    @error('content')
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
@section('script')
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('ckeditor', options);
    </script>
@endsection
