@extends('welcome')

@section('content')
<div class="shop container">
    <div class="breadcum">
        <a href="{{ route('public.home') }}">Home</a> / <a href="{{ route('shop.show') }}">Shop</a>
    </div>
    <div class="content">
        <div class="sidebar-left">
            <a href="#" class="close-lightbox">&times;</a>
            <div class="filter">
                <div class="filter-category">
                    <div class="title-filter">
                        <p>Product Categories</p>
                    </div>
                    <div class="filter-content">
                        <form action=" {{ route('shop.filter') }} " method="POST">
                            @csrf
                            <ul>
                                
                                @foreach ($categories as $category)
                                    
                                <li> 
                                    <ul >
                                        <li>
                                            <div class="checkbox-category">
                                                <input class="checkbox-custom-feature" type="checkbox" name="categories[]" value="{{ $category->id }}" id="category-{{ $category->id }}"> <label class="checkbox-important"  for="category-{{ $category->id }}">{{ $category->name }}</label> 
                                            </div>
                                            
                                            {{-- @if( !empty(json_decode(data_tree($categories,$category->id),true)))
                                            
                                                <div class="icon-checkbox-filter">
                                                    <a class="click-show-menu" onclick() href="#"><i class="fas fa-plus"></i></a>
                                                    <a class="click-hide-menu" onclick() href="#"><i class="fas fa-minus"></i></a>
                                                </div>
                                            @endif --}}
                                            
                                        </li>
                                        <li>
                                            
                                            {{-- {{ var_dump(json_decode(data_tree($categories,$category->id),true) ) }} --}}

                                            {{-- <ul class="child-filter">
                                                @php
                                                    $child_cat = json_decode(data_tree($categories,$category->id),true) ;
                                                    
                                                @endphp 
                                                @foreach ( $child_cat as $child_category)
                                                <li><input type="checkbox"  name="categories[]" value="{{ $child_category['id'] }}" id="category-child-{{ $child_category['id'] }}"> <label class="checkbox-important" for="category-child-{{  $child_category['id'] }}">{{  $child_category['name'] }}</label></li>
                                                    
                                                @endforeach
                                                
                                            </ul> --}}
                                        </li>
                                    </ul>
                                </li>

                                @endforeach
                                
                            </ul>
                            <input type="submit" name="submit-category" value="FILTER">
                        </form>
                    </div>
                </div>
                {{-- <div class="filter-price">
                    <div class="title-filter">
                        <p>FILTER BY PRICE</p>
                    </div>
                    <div class="filter-content">
                        <input type="range" min="0" max="100">
                    </div>
                </div> --}}

                <div class="filter-brand">
                    <div class="title-filter">
                        <p>FILTER BY BRAND</p>
                    </div>
                    <div class="filter-content">
                        <div class="filter-brand-input-custom">
                            <form action=" {{ route('shop.filter') }} " method="POST">
                            <ul>
                                @foreach ($brands as $brand)
                                    <li><input type="checkbox"  name="brands[]"  id="brand-child-{{$brand->id}}"> <label class="checkbox-important"  for="brand-child-{{$brand->id}}">{{$brand->brand_name}}<span>({{ $brand->products->count() }})</span></label></li>
                                @endforeach
                            </ul>
                            <input type="submit" name="submit-brand" value="FILTER">
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="banner-sidebar">
                <img src=" {{asset('/image/shop-page/banner-sidebar.png')}} " alt="">
            </div>
        </div>
        <div class="shop-detail-content">
            <div class="navigation">
                <div class="show">
                    <p>Product Name : {{ $name_product }}</p>
                </div>
                <div class="view">
                    <!-- <i class="fas fa-th-large"></i>
                    <i class="fas fa-th"></i>
                    <i class="fas fa-list"></i> -->
                </div>
                {{-- <div class="sort-by">
                    <p>Sort by: Default sorting </p>
                </div> --}}
            </div>
            <div class="list-product-shop">
                @foreach ($products as $product)
                    <div class="product-item">
                        <div class="product-front">
                            <div class="product-instock">
                                <div class="product-instock-left">
                                    @if ( $product->product_new_price < $product->product_old_price )
                                        <span class="sale">-{{ percent($product->product_new_price,$product->product_old_price) }}%</span>
                                    @else
                                        <span class="sale">+{{ percent($product->product_new_price,$product->product_old_price) }}%</span>
                                    @endif
                                    <span class="feature">HOT</span>
                                </div>
                                <div class="product-instock-right opacity-hiden">
                                    <!-- more hover -->
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="far fa-heart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-layer-group"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('product.detail',$product->id) }}">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- end hover -->
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="{{ route('product.detail',$product->id) }}">
                                    <img class="img-front" src="{{ url("$product->product_image") }}" alt="" style="display:block ;margin:auto">
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <p class="weight">{{ $product->product_weight." ".weight() }}</p>
                            <p class="product-name"><a href="{{ route('product.detail',$product->id) }}">{{ ucwords($product->product_name) }}</a></p>
                            <div class="rating">
                                <img src="{{asset("/image/product/rating.png") }}">
                            </div>
                            <p class="price">{{ number_format( $product->product_new_price , 0 , "," , "." ).currency()}} <span class="old-price"> {{ number_format( $product->product_old_price , 0 , "," , "." ).currency()}} </span></p>

                        </div>
                        <div class="hover-product-readmore">
                            <a href="{{ route('cart.add',$product->id) }}">ADD TO CART</a>

                            <ul>
                                <li>Type : Organic</li>
                                <li>MFG :{{ $product->updated_at->format('F j.Y') }}</li>
                                <li>LIFE : {{ $product->product_life }} days</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- {{ $products->links('pagination.custom') }} --}}
            
        </div>
    </div>
    <div class="filter-icon">
        <i class="fas fa-filter"></i>
    </div>
</div>

    {{-- {{ $products }} --}}

    @if (session('not_product_search'))
        <script>
            swal({
                text: "We Dont Have This Product, Please Check Our Shop!!",
                icon: "warning",
                button: false,
                timer: 3000,
            });
        </script>
    @endif
@endsection