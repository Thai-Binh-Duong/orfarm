@extends('layouts.admin')

@section('content')
<div id="content" class="container-fluid">
    @if ( session('status') )
        <p class="alert-success">{{session('status')}}</p>
    @endif
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Edit danh mục sản phẩm
                </div>

                <div class="card-body">
                    
                    <form action="{{ route('product.category.update',$cat) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input class="form-control" type="text" name="name" id="name"
                            value="{{ $cat->name }}"
                            >
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="select">Danh mục cha</label>
                            <select class="form-control" name="parent_category" id="select">
                                <option value="">Chọn danh mục</option>
                                @foreach ( $categories as $category)
                                        <option value="{{ $category->id }}" 
                                            @if ( $category->id == $cat->parent_cat_id )
                                                selected
                                            @endif
                                        >{{ $category->name }}</option>
                                    
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="pending" 
                                @if ( $cat->status == "pending" )
                                    checked
                                @endif
                                >
                                <label class="form-check-label" for="exampleRadios1">
                                    Chờ duyệt
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="public"
                                @if ( $cat->status == "public" )
                                    checked
                                @endif
                                >
                                <label class="form-check-label" for="exampleRadios2">
                                    Công khai
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Ảnh danh mục</label>
                            <input type="file" name="upload_file" id="upload_image">
                            <img class="image-category-admin" src='{{url("$cat->image_url")}}' alt="">
                        </div>
                        
                        <button type="submit" name="btn-update" value="update" class="btn btn-primary">Chỉnh sửa</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Danh sách
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Parent Category</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 0;
                            @endphp
                            @foreach ( $categories as $category)
                                @php
                                    $stt ++;
                                @endphp
                                <tr>
                                    <th scope="row">{{ $stt }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td><img class="image-category-admin" src=" {{ url(" $category->image_url") }}" alt=""></td>
                                    <td>
                                        @foreach ($categories as $item)
                                            @if ( $category->parent_cat_id != 0 && $category->parent_cat_id == $item->id )
                                                {{ $item->name }}
                                            @endif
                                        @endforeach
                                        
                                    </td>
                                    <td>
                                        <a href='{{route("product.category.edit",$category->id)}}' class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href='{{route("product.category.delete",$category->id)}}' class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" onclick="return confirm('Bạn có muốn xóa danh mục này không?')" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection