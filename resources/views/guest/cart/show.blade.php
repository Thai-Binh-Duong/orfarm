@extends('welcome')

@section('content')
<div class="your-cart-page">
    <div class="cart-page-title">
        <p>Your Cart</p>
        <p> <a href="#">Home</a>  / <a href="#">Your Cart</a></p>
    </div>
    <div class="cart-page-content">

        <div class="cart-page-content-product-info">
            @if ( session('status') )
                <p class="alert-danger">{{ session('status') }}</p>
            @endif

            {{-- {{ $cart }} --}}
            <table>
                <thead>
                    <tr>
                        <td>Image</td>
                        <td>NAME</td>
                        <td>PRICE</td>
                        <td>QUANTITY</td>
                        <td>SUBTOTAL</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $cart_item)
                    {{-- {{ $cart_item }} --}}
                    <tr class="list-items-cart">
                        <td><img src="{{ url($cart_item->options->product_image) }}" alt=""></td>
                        <td><a href="{{ route('product.detail',$cart_item->id) }}">{{ ucwords($cart_item->name) }}</a> </td>
                        <td>{{ money_format($cart_item->price).currency() }}</td>
                        <td>
                            <div class="form-quantity-product" data-url_process="{{ route("cart-update") }}">
                                <span class="minus-quantity"><i class="fa-solid fa-minus"></i></span>
                                <input type="text"  class="quantity-input" size="3" 
                                value="{{ $cart_item->qty }}"
                                min="0" max="{{ $cart_item->options->quantity }}"
                                data-row-id="{{ $cart_item->rowId }}" data-id = "{{$cart_item->id}}" >
                                <span class="plus-quantity"><i class="fa-solid fa-plus"></i></span>
                            </div>
                        </td>
                        <td class="sub_total_price_{{$cart_item->id}}">{{ money_format($cart_item->subtotal).currency() }}</td>
                        <td><a href="{{ route('cart.remove',$cart_item->rowId) }}"><i class="fa-solid fa-xmark"></i></a> </td>
                    </tr>

                    @endforeach
                    
                </tbody>
            </table>
            <a href="{{ route("shop.show") }}">RETURN SHOP</a>
        </div>
        <div class="cart-page-sidebar">
            <div class="cart-page-sidebar-total-price">
                <p>Cart Totals </p>
                <div class="sidebar-total-price">
                    <p>Subtotal</p>
                    <p class="total-price-cart">{{ $total." ".currency() }}</p>
                </div>
                <div class="change-address-sidebarcart-page">
                    <form action="{{ route('order.add') }}" method="get" >
                        @csrf
                        
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input type="text" name="name" placeholder="Your Name">
                        
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input type="email" name="email" placeholder="Your Email">
                        
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input type="text" name="phone" placeholder="Your Phone">
                        
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input type="text" name="address" placeholder="Address">
                        <textarea name="note" cols="70%" rows="8" placeholder="MESSAGE"></textarea>
                        <input type="submit" name="add_order" value="BUY NOW">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('addSuccess'))
<script>
    swal({
        title: "Add Product To Cart Success!",
        icon: "success",
        button: false,
        timer: 2500,
    });
</script>

@endif
@endsection