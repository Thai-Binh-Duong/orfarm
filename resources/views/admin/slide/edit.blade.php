@extends('layouts.admin')

@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Cập nhật Slide
        </div>
        <div class="card-body">
            <form action="{{route('admin.slide.update',$slide->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="upload">Image</label>
                    <input type="file" name="slide_image" id="upload">
                    @if ( session('error_slide_image'))  
                        <p class="alert alert-danger">{{ session('error_slide_image') }}</p>
                    @endif
                    {{ session('error_slide_image') }}
                    <img class="slide-200" src="{{ url("$slide->slide_image") }}" alt="">
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input class="form-control" type="text" name="slide_link" id="link" value="{{$slide->slide_link}}">
                    @error('slide_link')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slide_slug" class="form-control" id="slug"  value="{{$slide->slide_slug}}">
                    @error('slide_slug')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" name="btn-update" value="update" class="btn btn-primary">Cập nhật</button>      
            </form>
        </div>
    </div>
</div>
@endsection