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
                    Nhãn hàng sản phẩm
                </div>
                
                <div class="card-body">
                    <form action="{{route('product.brand.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input class="form-control" type="text" name="brand_name" id="name" value="{{old('brand_name')}}">
                            @error('brand_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input class="form-control" type="text" name="brand_slug" id="slug" value="{{old('brand_slug')}}">
                            @error('brand_slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả ngắn</label>
                            <textarea  class="form-control"  name="brand_desc" id="description">{{old('brand_desc')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="pending" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Chờ duyệt
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="public">
                                <label class="form-check-label" for="exampleRadios2">
                                    Công khai
                                </label>
                            </div>
                        </div>
                        
                        <button type="submit" name="btn-add" value="add" class="btn btn-primary">Thêm mới</button>
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
                                <th scope="col">Slug</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @php
                                $stt = 0;
                            @endphp
                            @foreach ( $brands as $brand)
                                @php
                                    $stt ++;
                                @endphp
                                    
                                <tr>
                                    <th scope="row">{{ $stt }}</th>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>{{ $brand->brand_slug }}</td>
                                    <td>{{ $brand->brand_desc }}</td>

                                    <td>
                                        <a href='{{route("product.brand.edit",$brand->id)}}' class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href='{{route("product.brand.delete",$brand->id)}}' onclick="return confirm('Bạn có chắc chắn muốn xóa trường này??')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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