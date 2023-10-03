@extends('welcome')

@section('content')
<div class="product-detail">
    <div class="breadcum">
        <p><a href="{{ route("public.home") }}">Home</a> / <a href="{{route("shop.show")}}">Product</a> / <a href="#">{{ ucwords($product->product_name) }}</a> </p>
    </div>
    <div class="product-detail-content">
        <div class="flex1">
            {{-- {{ $product }} --}}
            <div class="main-content-detail">
                <div class="product-detail-title">
                    <div class="name-of-product">
                        <p>{{ ucwords($product->product_name) }} - {{ $product->product_weight." ".weight() }}</p>
                    </div>
                    <div class="rate-of-product">
                        <div class="product-detail-brand">
                            <p>Brands: <span>{{strtoupper($product->brand->brand_name)}}</span></p>
                        </div>
                        <div class="product-detail-rate">
                            <a href="#">
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <span>02 REVIEWS</span>
                            </a>
                        </div>
                        <div class="product-detail-category">
                            <p>SKU: <span>{{ strtoupper($product->brand->brand_name) }}{{$product->id}}</span></p>
                        </div>
                    </div>
                </div>
                <div class="desription-product-detail-content">
                    <div class="product-detail-image">
                        <div class="library-product-image-current">
                            <div id="tab-library-1" class="library-product-image-tab-content "><img src="{{ url("$product->product_image") }}" alt=""></div>
                            {{-- <div id="tab-library-2" class="library-product-image-tab-content"><img src="{{ asset('/image/product-detail/bg2.png') }}" alt=""></div> --}}
                        </div>
                        {{-- <div class="library-product-image-tab">
                            <a href="#tab-library-1" class="active"><img src="{{ asset('/image/product-detail/bg1.png') }}" alt=""></a>
                            <a href="#tab-library-2"><img src="{{ asset('/image/product-detail/bg2.png') }}" alt=""></a>
                        </div> --}}
                    </div>
                    <div class="product-detail-infomation">
                        <div class="price-product-detail">
                            <p>{{ money_format($product->product_new_price)." ".currency() }}</p>
                        </div>
                        <div class="product-detai-desription-list">
                            <ul>
                                <li>Delicious non - dairy cheese sauce </li>
                                <li>Vegan & Allergy friendly </li>
                                <li>Smooth, velvety dairy free cheese sauce</li>
                            </ul>
                        </div>
                        <div class="divider-product-detai-desription">
                        </div>
                        <form action="{{ route('cart.add',$product->id) }}" method="GET">
                        <div class="quantity-product-detail-description">
                            
                                @csrf
                                <p>QTY : </p>
                                <div class="form-quantity-product">
                                    <span class="minus-quantity"><i class="fa-solid fa-minus"></i></span>
                                    <input type="text" name="quantity" class="qty-input" size="10" value="1" min="1" max="{{$product->product_quantity}}">
                                    <span class="plus-quantity"><i class="fa-solid fa-plus"></i></span>
                                </div>
                                <input class="add-cart" type="submit" name="add-cart" value="ADD TO CART">
                            
                        </div>
                        </form>
                        <div class="whistlist-product-detail-description">
                            <span><a href=""> <i class="fa-solid fa-heart"></i>ADD TO WHISTLIST</a></span>
                            <span><a href=""><i class="fa-solid fa-layer-group"></i>ADD TO COMPARE</a></span>
                            <span><a href=""><i class="fa-solid fa-share-nodes"></i>SHARE</a> </span>
                        </div>
                        <div class="divider-product-detai-desription">
                        </div>
                        <div class="payment-product-detail-description">
                            <ul>
                                <li><span>Availability:</span> <div> <span style="color: #00B853;">{{$product->product_quantity}} Instock</span> </div></li>
                                <li><span>Categories:</span> <div><a href="{{ route('filter.category',$product->cat->id)  }}">{{ ucwords($product->cat->name) }}</a></div></li>
                                <li><span>Tags:</span> 
                                    <div> 
                                        @php
                                            $count = count($product->tag);
                                        @endphp
                                        @foreach ( $product->tag as $tag)
                                            @php
                                                $count--;

                                            @endphp
                                            <span>{{ ucwords( $tag->name ) }}@if ($count > 0)
                                                ,
                                            @endif</span>
                                        @endforeach 
                                    </div> 
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content-detail">
                <div class="tab-description-detail-title">
                    <ul>
                        <li class="active"><a  id="product-description-detail-page">Product Description</a> </li>
                        <li><a id="additional-information-detail-page">ADDITIONAL INFORMATION</a> </li>
                        {{-- <li><a  id="review-detail-page">Reviews (1)</a> </li> --}}
                    </ul>
                </div>
                <div class="tab-description-detail-content">
                    <div class="container" id="product-description-detail-page-content">
                        <p>1 Designed by Puik in 1949 as one of the first models created especially for Carl Hansen & Son, 
                            and produced since 1950. The last of a series of chairs wegner designed based on inspiration 
                            from antique chinese armchairs. Excepteur sint occaecat cupidatat non proident, sunt in culpa 
                            qui officia eserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error
                            sit voluptatem accusantium doloremque laudantium, totam rem aperiam,aque ipsa quae ab illo 
                            inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                        <div class="d-flex-custom">
                            <div class="d-flex-left-detail-page">
                                <p class="title-text-detail-page">PRODUCT DETAILS</p>
                                <ul>
                                    <li>Material: Plastic, Wood</li>
                                    <li>Legs: Lacquered oak and black painted oak</li>
                                    <li>Dimensions and Weight: Height: 80 cm, Weight: 5.3 kg</li>
                                    <li>Length: 48cm</li>
                                    <li>Depth: 52 cm</li>
                                </ul>
                                <p>Lemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni 
                                    dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                
                            </div>
                            <img style="width:100%;object-fit:cover" src="{{ asset('/image/product-detail/bg3.png') }}" alt="">
                        </div>
                        <p class="title-text-detail-page">PRODUCT BRAND</p>
                        <p>Form is an armless modern chair with a minimalistic expression.
                            With a simple and contemporary design Form Chair has a soft and welcoming 
                            ilhouette and a distinctly residential look. The legs appear almost as if they 
                            are growing out of the shell. This gives the design flexibility and makes it possible 
                            to vary the frame. Unika is a mouth blown series of small, glass pendant lamps, originally 
                            designed for the Restaurant Gronbech. Est eum itaque maiores qui blanditiis architecto.
                            Eligendi saepe rem ut. Cumque quia earum eligendi. </p>
                        <img style="width:100%;object-fit:cover" src="{{ asset('/image/product-detail/bg4.png') }}" alt="">
                        <p class="title-text-detail-page">Product supreme quality</p>
                        <p>Praesent aliquam dignissim viverra. Maecenas lacus odio, feugiat eu nunc sit amet, maximus sagittis dolor. Vivamus nisi sapien, elementum sit amet eros sit amet, ultricies cursus ipsum. Sed consequat luctus ligula. Curabitur laoreet rhoncus blandit. Aenean vel diam ut arcu pharetra dignissim ut sed leo. Vivamus faucibus, ipsum in vestibulum vulputate, lorem orci convallis quam, sit amet consequat nulla felis pharetra lacus. 
                        </p>
                        <p>Duis semper erat mauris, sed egestas purus commodo. Cras imperdiet est in nunc tristique lacinia. Nullam aliquam mauris eu accumsan tincidunt. Suspendisse velit ex, aliquet vel ornare vel, dignissim a tortor. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
                    </div>
                    <div class="container" id="additional-information-detail-page-content">
                        <div class="padding-33-0">
                            <p class="title-description-product">Description : {{ $product->product_desc }}</p>
                            <p class="title-description-product">Content : {{ $product->product_content }}</p>
                            <p class="title-description-product">Life : {{ $product->product_life }} days</p>
                        </div>
                    </div>
                    {{-- <div class="container" id="review-detail-page-content">
                        <p>Review</p>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="right-sidebar">
            <div class="right-sidebar-content">
                <div class="right-sidebar-content-1">
                    <ul>
                        <li>
                            <img src="{{ asset('/image/product-detail/sidebar/box.png') }}" alt="">
                            <p>Free shipping apply to all
                                orders over $90</p>
                        </li>
                        <li>
                            <img src="{{ asset('/image/product-detail/sidebar/box2.png') }}" alt="">
                            <p>Guaranteed 100% Organic
                                from nature farms</p>
                        </li>
                        <li>
                            <img src="{{ asset('/image/product-detail/sidebar/box3.png') }}" alt="">
                            <p>60 days returns if you change
                                your mind</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right-sidebar-content">
                <div class="right-sidebar-content-2">
                    <img src="{{ asset('/image/product-detail/sidebar/Banner.png') }}" alt="">
                </div>
            </div>
            <div class="right-sidebar-content">
                <div class="right-sidebar-content-3">
                    <div class="right-sidebar-content-recent-product">
                        <p>Recent Products</p>
                        <div class="right-sidebar-content-recent-product-detail">
                            @foreach ($products as $product_item)
                            <div class="product-item">
                                <div class="product-front">
                                    <div class="product-instock">
                                        <div class="product-instock-left">
                                            @if ( $product_item->product_new_price < $product_item->product_old_price )
                                                <span class="sale">-{{ percent($product_item->product_new_price,$product_item->product_old_price) }}%</span>
                                            @else
                                                <span class="sale">+{{ percent($product_item->product_new_price,$product_item->product_old_price) }}%</span>
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
                                                    <a href="{{ route('product.detail',$product_item->id) }}">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- end hover -->
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="{{ route('product.detail',$product_item->id) }}">
                                            <img class="img-front" src="{{ url("$product_item->product_image") }}" alt="" style="display:block ;margin:auto">
                                            
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <p class="weight">500 gram</p>
                                    <p class="product-name"><a href="{{ route('product.detail',$product_item->id) }}">{{ $product_item->product_name }}</a></p>
                                    <div class="rating">
                                        <img src="{{ asset('/image/product/rating.png') }}">
                                    </div>
                                    <p class="price">{{ number_format( $product_item->product_new_price , 0 , "," , "." ).currency()}} <span class="old-price">{{ number_format( $product_item->product_old_price , 0 , "," , "." ).currency()}} </span></p>
        
                                </div>
                                <div class="hover-product-readmore">
                                    <a href="{{ route('cart.add',$product_item->id) }}">ADD TO CART</a>
        
                                    <ul>
                                        <li>Type : Organic</li>
                                        <li>MFG : {{ $product_item->updated_at->format('F j.Y') }}</li>
                                        <li>LIFE : {{ $product_item->product_life }} days</li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection