@extends('welcome')

@section('content')
    
    <section class="banner ">
        <div class="slider-banner owl-carousel owl-theme" >
            @foreach ($slides as $slide)
                <div class="item">
                    <a href="{{ $slide->slide_link }}">
                        <img src="{{ url("$slide->slide_image") }}" alt="">
                    </a> 
                </div>
            @endforeach
            
        </div>
    </section>
    <section class="content" style="background-color: #F2F2F6;padding-bottom: 80px;">
        <div class="category">
            <div class="container ">
                @foreach ($categories as $category)
                    <div class="category-tag-image">
                        <a href="{{ route("filter.category",$category->id) }}">
                            <img src="{{ url("$category->image_url")  }} " alt="">
                            <p>{{ ucwords($category->name) }}</p>
                            <span>{{ $category->products->count() }} items</span>
                        </a>
                    </div>
                @endforeach
                
            </div>
        </div>
        <div class="product">
            <div class="title-product">
                <p class="title-product-top">~ Special Products ~</p>
                <p class="title-product-middle">Weekly Food Offers</p>
                <p class="title-product-bot">The liber tempor cum soluta nobis eleifend option congue doming quod
                    mazim.</p>
            </div>
            <div class="list-product container">
                <div id="product-first" class="product-nav owl-carousel owl-theme">
                    @foreach ($products as $product)
                        
                        <div class="item product-items ">
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
                                        <img src="{{ url("$product->product_image") }}" alt="" 
                                        style="display:block ;margin:auto">
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <p class="weight">
                                    {{ $product->product_weight." ".weight() }}</p>
                                <p class="product-name"><a href="{{ route('product.detail',$product->id) }}">
                                    {{ ucwords($product->product_name) }}</a></p>
                                <div class="rating">
                                    <img src=" {{asset("/image/product/rating.png") }}">
                                </div>
                                <p class="price">{{ number_format( $product->product_new_price , 0 , "," , "." ).currency()}} <span class="old-price">{{ number_format( $product->product_old_price , 0 , "," , "." ).currency()}} </span></p>

                            </div>
                            <div class="hover-product-readmore">
                                <a href="{{ route('cart.add',$product->id) }}">ADD TO CART</a>

                                <ul>
                                    <li>Type : Organic</li>
                                    <li>MFG : {{ $product->updated_at->format('F j.Y') }}</li>
                                    <li>LIFE : {{ $product->product_life }} days</li>
                                </ul>
                            </div>
                        </div>
                        
                    @endforeach
                    
                </div>
            </div>
        </div>
        <div class="special container">
            <div class="special-image">
            </div>
            <div class="special-cotent">
                <div class="special-cotent-top">
                    <p class="special-cotent-top-1">~ The Best For Your ~</p>
                    <p class="special-cotent-top-2">Organic Drinks <br>
                        <span>Easy Healthy</span> - Happy Life
                    </p>
                    <p class="special-cotent-top-3">The liber tempor cum soluta nobis eleifend option congue <br>
                        doming quod mazim placerat facer possim assum.</p>
                </div>
                <div class="special-cotent-bottom">
                    <div class="special-cotent-bottom-left">
                        <p class="special-cotent-bottom-left-1 dash-line">Fresh Fruits:</p>
                        <p class="special-cotent-bottom-left-2">Apples, Berries & Cherries</p>
                        <p class="special-cotent-bottom-left-3 dash-line">Expiry Date:</p>
                        <p class="special-cotent-bottom-left-4">See on The Bottle Cap</p>
                        <p class="special-cotent-bottom-left-5"> <a href="#">Add To Cart</a> </p>
                    </div>
                    <div class="special-cotent-bottom-right">
                        <p class="special-cotent-bottom-right-1 dash-line">Ingredient:</p>
                        <p class="special-cotent-bottom-right-2">Energy, Protein, Sugars</p>
                        <p class="special-cotent-bottom-right-3 dash-line"> Bootle Size:</p>
                        <p class="special-cotent-bottom-right-4"> 500ml - 1000ml</p>
                        <p class="special-cotent-bottom-right-5"> <a href="#">View More</a> </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="introduce">
            <div class="container">
                <div class="d-grid grid-column-3 gap-30 width-100-percent">
                    <div class="introduce-content-1">
                        <div class="introduce-background-1">
                            <p>Top offers</p>
                            <p>Eat Green <br>
                                Best For Family</p>
                            <p>Free Shipping 05km</p>
                        </div>
                    </div>
                    <div class="introduce-content-2">
                        <div class="introduce-background-2">
                            <p>Weekend Deals</p>
                            <p>Fresh Food <br>
                                Restore Health</p>
                            <p></p>
                        </div>
                    </div>
                    <div class="introduce-content-3">
                        <div class="introduce-background-3">
                            <p>Top seller</p>
                            <p>Healthy <br>
                                Fresh Free Bread</p>
                            <p>Limited Time: Online Only!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hot-item">
            <div class="container">
                <div class="hot-item-title">
                    <p>~ Our Products ~</p>
                    <p>What's Hot Items</p>
                    <div class="list-hot-item">
                        <ul>
                            <li class="active"><a href="#all-product">Fresh Fruit</a></li>
                            <li><a href="#fresh-meat">Fresh Meat</a></li>
                            <li><a href="#fresh-vegetable">Fresh Vegetables</a></li>
                        </ul>
                    </div>
                </div>
                <div id="all-product" class="list-hot-product product-nav owl-carousel owl-theme">
                    @foreach ($fresh_fruits as $fresh_fruit)
                        
                        <div class="item product-items ">
                            <div class="product-front">
                                <div class="product-instock">
                                    <div class="product-instock-left">
                                        @if ( $fresh_fruit->product_new_price < $fresh_fruit->product_old_price )
                                            <span class="sale">-{{ percent($fresh_fruit->product_new_price,$fresh_fruit->product_old_price) }}%</span>
                                        @else
                                            <span class="sale">+{{ percent($fresh_fruit->product_new_price,$fresh_fruit->product_old_price) }}%</span>
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
                                                <a href="{{ route('product.detail',$fresh_fruit->id) }}">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- end hover -->
                                    </div>
                                </div>
                                <div class="product-image">
                                    <a href="{{ route('product.detail',$fresh_fruit->id) }}">
                                        <img src="{{ url("$fresh_fruit->product_image") }}" alt="" 
                                        style="display:block ;margin:auto">
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <p class="weight">
                                    {{ $fresh_fruit->product_weight." ".weight() }}</p>
                                <p class="product-name"><a href="{{ route('product.detail',$fresh_fruit->id) }}">
                                    {{ ucwords($fresh_fruit->product_name) }}</a></p>
                                <div class="rating">
                                    <img src=" {{asset("/image/product/rating.png") }}">
                                </div>
                                <p class="price">{{ number_format( $fresh_fruit->product_new_price , 0 , "," , "." ).currency()}} <span class="old-price">{{ number_format( $fresh_fruit->product_old_price , 0 , "," , "." ).currency()}} </span></p>

                            </div>
                            <div class="hover-product-readmore">
                                <a href="{{ route('cart.add',$fresh_fruit->id) }}">ADD TO CART</a>

                                <ul>
                                    <li>Type : Organic</li>
                                    <li>MFG : {{ $fresh_fruit->updated_at->format('F j.Y') }}</li>
                                    <li>LIFE : {{ $fresh_fruit->product_life }} days</li>
                                </ul>
                            </div>
                        </div>
                        
                    @endforeach
                
                </div>
                <div id="fresh-meat" class="list-hot-product product-nav owl-carousel owl-theme">

                    {{-- {{ $fresh_meat }} --}}

                    @foreach ( $fresh_meats as $fresh_meat)
                        
                        <div class="item product-items ">
                            <div class="product-front">
                                <div class="product-instock">
                                    <div class="product-instock-left">
                                        @if ( $fresh_meat->product_new_price < $fresh_meat->product_old_price )
                                            <span class="sale">-{{ percent($fresh_meat->product_new_price,$fresh_meat->product_old_price) }}%</span>
                                        @else
                                            <span class="sale">+{{ percent($fresh_meat->product_new_price,$fresh_meat->product_old_price) }}%</span>
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
                                                <a href="{{ route('product.detail',$fresh_meat->id) }}">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- end hover -->
                                    </div>
                                </div>
                                <div class="product-image">
                                    <a href="{{ route('product.detail',$fresh_meat->id) }}">
                                        <img src="{{ url("$fresh_meat->product_image") }}" alt="" 
                                        style="display:block ;margin:auto">
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <p class="weight">
                                    {{ $fresh_meat->product_weight." ".weight() }}</p>
                                <p class="product-name"><a href="{{ route('product.detail',$fresh_meat->id) }}">
                                    {{ ucwords($fresh_meat->product_name) }}</a></p>
                                <div class="rating">
                                    <img src=" {{asset("/image/product/rating.png") }}">
                                </div>
                                <p class="price">{{ number_format( $fresh_meat->product_new_price , 0 , "," , "." ).currency()}} <span class="old-price">{{ number_format( $fresh_meat->product_old_price , 0 , "," , "." ).currency()}} </span></p>

                            </div>
                            <div class="hover-product-readmore">
                                <a href="{{ route('cart.add',$fresh_meat->id) }}">ADD TO CART</a>

                                <ul>
                                    <li>Type : Organic</li>
                                    <li>MFG : {{ $fresh_meat->updated_at->format('F j.Y') }}</li>
                                    <li>LIFE : {{ $fresh_meat->product_life }} days</li>
                                </ul>
                            </div>
                        </div>
                        
                    @endforeach
                    
                </div>
                <div id="fresh-vegetable" class="list-hot-product product-nav owl-carousel owl-theme">
                    @foreach ($fresh_vegetables as $fresh_vegetable)
                        
                    <div class="item product-items ">
                        <div class="product-front">
                            <div class="product-instock">
                                <div class="product-instock-left">
                                    @if ( $fresh_vegetable->product_new_price < $fresh_vegetable->product_old_price )
                                        <span class="sale">-{{ percent($fresh_vegetable->product_new_price,$fresh_vegetable->product_old_price) }}%</span>
                                    @else
                                        <span class="sale">+{{ percent($fresh_vegetable->product_new_price,$fresh_vegetable->product_old_price) }}%</span>
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
                                            <a href="{{ route('product.detail',$fresh_vegetable->id) }}">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- end hover -->
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="{{ route('product.detail',$fresh_vegetable->id) }}">
                                    <img src="{{ url("$fresh_vegetable->product_image") }}" alt="" 
                                    style="display:block ;margin:auto">
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <p class="weight">
                                {{ $fresh_vegetable->product_weight." ".weight() }}</p>
                            <p class="product-name"><a href="{{ route('product.detail',$fresh_vegetable->id) }}">
                                {{ ucwords($fresh_vegetable->product_name) }}</a></p>
                            <div class="rating">
                                <img src=" {{asset("/image/product/rating.png") }}">
                            </div>
                            <p class="price">{{ number_format( $fresh_vegetable->product_new_price , 0 , "," , "." ).currency()}} <span class="old-price">{{ number_format( $fresh_vegetable->product_old_price , 0 , "," , "." ).currency()}} </span></p>

                        </div>
                        <div class="hover-product-readmore">
                            <a href="{{ route('cart.add',$fresh_vegetable->id) }}">ADD TO CART</a>

                            <ul>
                                <li>Type : Organic</li>
                                <li>MFG : {{ $fresh_vegetable->updated_at->format('F j.Y') }}</li>
                                <li>LIFE : {{ $fresh_vegetable->product_life }} days</li>
                            </ul>
                        </div>
                    </div>
                        
                    @endforeach

                </div>

                <p style="font-size: 16px;line-height: 23px;color: #4D5574;text-align: center;margin-top: -50px;">
                    Discover thousands of other quality products.<a href="#" style="color: #96AE00;"> Shop All
                        Products <img src="{{ asset("/image/read-more.png") }}" alt=""> </a></p>
            </div>
        </div>
        <div class="flash-sale container">
            
            <div class="flash-sale-content">
                <p class="flash-sale-content-1">~ Deals Of The Day ~</p>
                <p class="flash-sale-content-2">Premium Drinks <br>
                    Fresh Farm Product</p>
                <p class="flash-sale-content-3">The liber tempor cum soluta nobis eleifend option congue <br>
                    doming quod mazim placerat facere possum assam going through.</p>
                <p class="flash-sale-content-4">hurry up! Offer End In:</p>
                <div class="flash-sale-time">
                    <p class="flash-sale-content-5">56
                        <span>Days</span>
                    </p>
                    <p class="flash-sale-content-6">40
                        <span>hours</span>
                    </p>
                    <p class="flash-sale-content-7">15
                        <span>mins</span>
                    </p>
                    <p class="flash-sale-content-8">14
                        <span>secs</span>
                    </p>
                </div>
                <div class="flash-sale-button">
                    <a href="#" class="flash-sale-button-1">Shop Now</a>
                    <a href="#" class="flash-sale-button-2">View Menu</a>
                </div>
            </div>
            <div class="flash-sale-column-2"></div>
        </div>
        <div class="blog">
            <div class="container">
                <div class="blog-title">
                    <p class="blog-title-1">~ Read Our Blog ~</p>
                    <p class="blog-title-2">Our Latest Post</p>
                    <p class="blog-title-3">The liber tempor cum soluta nobis eleifend option congue doming quod
                        mazim.</p>
                </div>
                <div id="blog-content" class="blog-nav owl-carousel owl-theme">
                    {{-- {{ $posts }} --}}
                    @foreach ($posts as $post)

                    <div class="blog-item item">
                        <div class="blog-image">
                            <img src="{{ url("$post->post_image") }}" alt="">
                        </div>
                        <div class="blog-description">
                            <div class="blog-description-top">
                                <div class="blog-description-top-category">
                                    {{-- <p>Lifestyle</p> --}}
                                    <p>{{ $post->category->name }}</p>
                                </div>
                                <div class="blog-description-top-author">
                                    {{-- <p>Admin</p> --}}
                                    <p>{{ $post->admin->name }}</p>
                                </div>
                                <div class="blog-description-top-time">
                                    {{-- SEP 15. 2022  --}}
                                    <p>{{ $post->created_at->format('M j.Y') }}</p>
                                </div>
                            </div>
                            <div class="blog-description-title">
                                {{-- <a href="#">Avocado Grilled Salmon, Rich In
                                    Nutrients For The Body</a> --}}
                                <a href="{{ route('post.detail',$post->id) }}">{{ Str::words( ucwords($post->post_title), 10, ' ...')  }}</a>
                            </div>
                            <div class="blog-description-content">
                                {{-- <p>{{ $post->post_description }}</p> --}}
                                <p>{{ Str::words($post->post_description, 20, ' ...') }}</p>
                            </div>
                            <div class="blog-description-button">
                                <a href="{{ route('post.detail',$post->id) }}">Continue reading</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        @if (session('orderSuccess'))
            <script>
                swal({
                    title: "Order Success!! Please check your email",
                    icon: "success",
                    button: false,
                    timer: 2500,
                });
            </script>
        @endif
        
    </section>
    
@endsection