@extends('layouts.admin')

@section('content')

<div id="content" class="container-fluid">
    @if (session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
    @endif
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách đơn hàng</h5>
            <div class="form-search form-inline">
                <form action="" method="GET">
                    <input type="text" name="keyword" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            
            <div class="analytic">
                <a href=" {{ request()->fullUrlWithQuery(['status' => 'active']) }} " class="text-primary">Active<span class="text-muted">({{ $count_order_active }})</span></a>
                <a href="{{ request()->fullUrlWithQuery([ 'status' => 'trash' ]) }}" class="text-primary">Trash<span class="text-muted">({{ $count_order_trash }})</span></a>
            </div>
            <form action="{{ route("admin.order.action") }}" method="POST">
                @csrf
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" name="action" id="">
                    <option value="">Chọn</option>
                    @foreach ($list_action as $key => $action)
                        <option value="{{$key}}">{{ $action }}</option>
                    @endforeach
                    
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            {{-- {{$orders}} --}}
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="checkall">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Mã</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Giá trị</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @php
                        $stt =0;
                    @endphp
                    @foreach ($orders as $order)
                        @php
                            $stt++;
                        @endphp
                        <tr>
                            <td>
                                <input type="checkbox" name="check[]" value="{{ $order->id }}">
                            </td>
                            <td>{{ $stt }}</td>
                            <td>{{ $order->id }}</td>
                            <td>
                                {{ $order->name }}
                                
                            </td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td>
                                {{ $order->price.currency() }}
                            </td>
                            <td>

                            @if ( $order->status == 'processing' )
                                <span class="badge badge-warning">Đang xử lý</span>
                            @elseif( $order->status == 'complete' )
                                <span class="badge badge-success">Hoàn thành</span>
                            @elseif( $order->status == 'cancel' )
                                <span class="badge badge-dark">Hủy đơn hàng</span>
                            @endif

                            </td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.order.detail',$order->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Chi Tiết"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('admin.order.delete',$order->id) }}" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
            </form>
            <nav aria-label="Page navigation example">
                {{ $orders->links() }}
            </nav>
        </div>
    </div>
</div>
@endsection