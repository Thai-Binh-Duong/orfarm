@extends('layouts.admin')

@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm bài viết
        </div>
        <div class="card-body">
            <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Tiêu đề bài viết</label>
                    <input class="form-control" type="text" name="post_title" id="name" value="{{old('post_title')}}">
                    @error('post_title')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Mo ta bài viết</label>
                    <input type="text" name="post_description" class="form-control" id="description"  value="{{old('post_description')}}">
                    @error('post_description')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Nội dung bài viết</label>
                    <textarea name="post_content" class="form-control textarea" id="content" cols="30" rows="5"> {{old('post_content')}}</textarea>
                    @error('post_content')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="upload">Image</label>
                    <input type="file" name="post_image" id="upload">
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" name="category_id" id="">
                        <option value="">Chọn danh mục</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" name="btn-add" value="add" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection