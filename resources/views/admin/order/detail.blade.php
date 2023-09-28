@extends('layouts.admin')

@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Chi tiết đơn hàng
        </div>
        {{-- {{ $order}} --}}
        <div class="card-body order-detail">
            <form action="{{route('admin.order.update',$order->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="order_name">Họ tên</label>
                            <input class="form-control" type="text" disabled  name="name" id="order_name" value="{{$order->name}}">
                        </div>
                        <div class="form-group">
                            <label for="order_email">Email</label>
                            <input class="form-control" disabled type="email" name="email" id="order_email" value="{{$order->email}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="order_phone">Phone</label>
                            <input class="form-control" disabled type="text" name="phone" id="order_phone" value="{{$order->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="order_price">Price Total</label>
                            <input class="form-control" disabled type="text" name="price" id="order_price" value="{{$order->price.currency()}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="order_address">Address</label>
                    <input class="form-control" disabled type="text" name="address" id="order_address" value="{{$order->address}}">
                </div>
                <div class="form-group">
                    <label for="order_note">Note</label>
                    <input class="form-control" disabled type="text" name="note" id="order_note" value="{{$order->note}}">
                </div>
                <div class="form-group">
                    <label for="">Product Items</label>
                </div>
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{ $order_items }} --}}
                        
                        @php
                            $order_item = json_decode($order->order,true);
                            $stt =0;
                        @endphp
                        
                        @foreach ($order_item as $item)
                            @php
                                $stt ++;
                            @endphp
                            <tr class="list-items-cart">
                                <td>{{$stt}}</td>
                                <td><img class="product-80" src="{{ url( $item["image"] ) }}" alt=""></td>
                                <td> <p style="font-size: 17px">{{ ucwords($item['name']) }}</p> </td>
                                <td><p>{{ $item['qty'] }}</p></td>
                                <td>{{ money_format($item['price']).currency() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="form-group">
                    <label for="order_status">Status</label>
                    <select name="status" id="order_status">
                        <option value="processing"
                            @if ($order->status == 'processing' )
                                selected
                            @endif
                        >Đang xử lý</option>
                        <option value="complete"
                        @if ($order->status == 'complete' )
                            selected
                        @endif>Hoàn thành</option>
                        <option value="cancel"
                        @if ($order->status == 'cancel' )
                            selected
                        @endif>Hủy đơn hàng</option>
                    </select>
                </div>
                
                <button type="submit" name="btn-update" value="update" class="btn btn-primary">Cap nhat</button>
            </form>
        </div>
    </div>
</div>
@endsection