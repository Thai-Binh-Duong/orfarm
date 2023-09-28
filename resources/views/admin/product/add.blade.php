@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm sản phẩm
        </div>
        
        <div class="card-body">
            <form action=" {{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" > 
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="product_name" id="name" value="{{ old('product_name') }}">
                            @error('product_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_price">Giá Mới ( {{ currency() }} ) </label>
                            <input class="form-control" type="number" min="1" name="product_new_price" id="new_price"  value="{{ old('product_new_price') }}">
                            @error('product_new_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="quantity">Số lượng sản phẩm</label>
                            <input  class="form-control" type="number" min="0" name="product_quantity" id="quantity"  value="{{ old('product_quantity') }}" >
                            @error('product_quantity')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="old_price">Giá Cũ ( {{ currency() }} ) </label>
                            <input class="form-control" type="number" min="1" name="product_old_price" id="old_price" value="{{ old('product_old_price') }}" >
                            @error('product_old_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả sản phẩm</label>
                    <textarea name="product_desc" class="form-control" id="description" >{{ old('product_desc') }}</textarea>
                    @error('product_desc')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="detail">Chi tiết sản phẩm</label>
                    <textarea name="product_content" class="form-control" id="detail" rows="3">{{ old('product_content') }}</textarea>
                    @error('product_content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">Danh mục</label>
                    <select class="form-control" name="category_id" id="category">
                        <option value="">Chọn danh mục</option>
                            @foreach ( $categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="brand">Nhãn hàng</label>
                    <select class="form-control" name="brand_id" id="brand">
                        <option value="">Chọn nhãn hàng</option>
                            @foreach ( $brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                            @endforeach
                    </select>
                    @error('brand_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="brand">Tag</label> <br>
                    @foreach ( $tags as $tag)
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag-{{ $tag->id }}">
                        <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                    @endforeach
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

                <div class="form-group">
                    <label for="weight">Cân nặng sản phẩm ( {{ weight() }} )</label>
                    <input  class="form-control" type="number" min="1" name="product_weight" id="weight"  value="{{ old('product_weight') }}" >
                    @error('product_weight')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input class="form-control" type="text" name="product_slug" id="slug" value="{{ old('product_slug') }}">
                    @error('product_slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="upload_file">Image</label>
                    <input type="file" name="upload_file" id="upload_file">
                    
                </div>

                <div class="form-group">
                    <label for="expiry_date">Hạn sử dụng ( {{ expiry() }} )</label>
                    <input class="form-control" type="number" min="1" name="product_life" id="expiry_date"  value="{{ old('product_life') }}">
                    @error('product_life')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" name="upload" value="add" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection