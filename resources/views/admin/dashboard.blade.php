@extends('layouts.admin')

@section('content')

<div class="container-fluid py-5">
    <div class="row">
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐƠN HÀNG THÀNH CÔNG</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $complete_order_count }}</h5>
                    <p class="card-text">Đơn hàng giao dịch thành công</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐANG XỬ LÝ</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $processing_order_count }}</h5>
                    <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">DOANH SỐ</div>
                <div class="card-body">
                    <h5 class="card-title">{{ money_format($complete_order_price*1000)." ".currency() }}</h5>
                    <p class="card-text">Doanh số hệ thống</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐƠN HÀNG HỦY</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $cancel_order_count }}</h5>
                    <p class="card-text">Số đơn bị hủy trong hệ thống</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end analytic  -->
    <div class="card">
        <div class="card-header font-weight-bold">
            ĐƠN HÀNG MỚI
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Giá trị</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thời gian</th>
                        @canany(['product.edit','product.delete'])
                            <th scope="col">Tác vụ</th>
                        @endcanany
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

                            @canany(['product.edit','product.delete'])
                                <td>
                                    <a href="{{ route('admin.order.detail',$order->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Chi Tiết"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.order.delete',$order->id) }}" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            @endcanany
                            
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                {{ $orders->links() }}
            </nav>
        </div>
    </div>
    
</div>
@endsection