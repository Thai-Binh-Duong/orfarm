@extends('layouts.admin')

@section('content')

<div id="content" class="container-fluid">
    @if (session('status'))
        <p class="alert-success">{{ session('status') }}</p> 
    @endif
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách sản phẩm</h5>
            <div class="form-search form-inline">
                <form action="" method="GET" >
                    <input type="text" name="keyword" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href=" {{ request()->fullUrlWithQuery(['status' => 'active' ]) }} " class="text-primary">Kích hoạt<span class="text-muted">({{ $count_product_active }})</span></a>
                <a href=" {{ request()->fullUrlWithQuery( ['status' => 'trash'] ) }} " class="text-primary">Vô hiệu hóa<span class="text-muted">({{ $count_product_trash }})</span></a>
            </div>
            <form action="{{ route('admin.product.action') }}" method="GET">
                @csrf
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" name="action" id="">
                        <option value="">Chọn</option>
                        @foreach ($list_action as $action_key => $action_value)
                            <option value="{{$action_key}}">{{$action_value}}</option>
                        @endforeach

                    </select>
                    <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                </div>
                
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <th scope="col">
                                <input name="checkall" type="checkbox">
                            </th>
                            <th scope="col">STT</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($products->total() > 0 )
                            @php
                                $stt=0;
                            @endphp
                            @foreach ($products as $product)
                                @php
                                    $stt++;
                                @endphp
                            <tr class="">
                                <td>
                                    <input type="checkbox" name="check[]" value="{{ $product->id }}">
                                </td>
                                <td>{{ $stt }}</td>
                                <td><img class="product-80" src='{{ url("$product->product_image") }}' alt=""></td>
                                <td><a href="{{ route('admin.product.edit',$product->id) }}">{{ $product->product_name }}</a></td>
                                <td> {{  number_format($product->product_new_price).currency() }} </td>
                                <td>
                                    @foreach ($categories as $category)
                                        @if ($product->category_id == $category->id)
                                            {{ $category->name }}
                                        @endif
                                    @endforeach
                                    
                                </td>
                                <td>{{ $product->created_at }}</td>
                                <td>
                                    @if ( $product->product_quantity > 0 )
                                        <span class="badge badge-success">Còn hàng</span>
                                    @else
                                        <span class="badge badge-dark">Hết hàng</span>
                                    @endif
                                    
                                </td>
                                <td>
                                    <a href="{{ route('admin.product.edit',$product->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.product.delete',$product->id) }}"  onclick="return confirm('Bạn có chắc chắn muốn xóa trường này??')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                            @endforeach
                        @else
                            <tr>
                                <td colspan="9" >
                                    <p class="alert-danger">Khong co ban ghi nao</p>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </form>
            <nav aria-label="Page navigation example">
                {{ $products->links() }}
            </nav>
        </div>
    </div>
</div>
@endsection