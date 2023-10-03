<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>ORFARM</title>

        <link rel="shortcut icon" href=" {{ asset('/image/favicon.svg') }}  " type="image/x-icon">
        <link rel="stylesheet" href=" {{ asset('/font/Jost/jost/Jost400Book.otf') }} ">
        {{-- <link rel="stylesheet" href=" {{ asset('/font/Jost/static/Jost-Regular.ttf') }} "> --}}

        <link rel="stylesheet" href="{{ asset('/css/reset.css') }} ">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }} "> 
        <link rel="stylesheet" href="{{ asset('/css/responsive.css') }} ">
        <link rel="stylesheet" href="{{ asset('/css/menu-mobile.css') }} ">
        <link rel="stylesheet" href="{{ asset('/css/cart-inpage.css') }} ">
        <link rel="stylesheet" href="{{ asset('/css/form-search.css') }} ">
        <link rel="stylesheet" href="{{ asset('/css/form-login.css') }} ">
        <link rel="stylesheet" href="{{ asset('/css/list-blog.css') }} ">
        <link rel="stylesheet" href="{{ asset('/css/blog-detail.css') }} ">
        <link rel="stylesheet" href="{{ asset('/css/about-us.css') }} ">
        <link rel="stylesheet" href="{{ asset('/css/contact-us.css') }} ">
        <link rel="stylesheet" href="{{ asset('/css/404.css') }} ">
        <link rel="stylesheet" href="{{ asset('/css/product-detail.css') }} ">
        <link rel="stylesheet" href="{{ asset('/css/shop.css') }} ">
        <link rel="stylesheet" href="{{ asset('/css/cart-page.css') }} ">
        <link rel="stylesheet" href="{{ asset('/css/custom-pagination.css') }} ">

        <link rel="stylesheet" href="{{ asset('/slider/owlcarousel/assets/owl.carousel.min.css') }} ">
        <link rel="stylesheet" href="{{ asset('/slider/owlcarousel/assets/owl.theme.default.min.css') }} ">
        <link rel="stylesheet" href="{{ asset('/icon/fontawesome-free-5.15.4-web/css/all.min.css') }} ">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        {{-- <script src="{{ asset('/js/jquery.min.js') }} "></script> --}}
        <script src="{{ asset('/js/form-login-signup.js') }} "></script>
        <script src="{{ asset('/js/form-search.js') }} "></script>
        <script src="{{ asset('/js/cart-inpage.js') }} "></script>
        <script src="{{ asset('/js/style.js') }} "></script>
        <script src="{{ asset('/js/shop.js') }} "></script>
        <script src="{{ asset('/js/product-detail.js') }} "></script>
        <script src="{{ asset('/js/ajax.js') }} "></script>

    </head>
    <body>
        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div> --}}
        <div class="main">
            <header>
                <div class="topbar">
                    <div class="container">
                        <div class="topbar-left">
                            Due to the <span>COVID-19</span> epidemic, orders may be processed with a slight delay.
                        </div>
                        <div class="topbar-right">
                            <ul>
                                <li class="link"> <a href="{{ route('shop.show') }}">Store Location</a></li>
                                <li class="link"><a href="{{ route('cart.show') }}">Order Tracking</a></li>
                                <li class="link"><a href="{{ route('shop.show') }}">FAQs</a></li>
                                <!-- <li class="line">|</li>
                                <li class="language-item"><a href="#">ENG</a>
                                    <ul class="sub-menu-topbar">
                                        <li><a href="#">Australia</a></li>
                                        <li class="active"><a href="#">English</a></li>
                                        <li><a href="#">Spain</a></li>
                                        <li><a href="#">Brazil</a></li>
                                        <li><a href="#">France</a></li>
                                        <li><a href="#">United States</a></li>
                                    </ul>
                                </li>
                                <li class="language-item"><a href="#">USD</a>
                                    <ul class="sub-menu-topbar">
                                        <li><a href="#">ARS</a></li>
                                        <li class="active"><a href="#">USD</a></li>
                                        <li><a href="#">DKK</a></li>
                                        <li><a href="#">BRL</a></li>
                                        <li><a href="#">EUR</a></li>
                                        <li><a href="#">GBP</a></li>
                                    </ul>
                                </li> -->
                            </ul>
        
                        </div>
        
                    </div>
                </div>
                <div class="header-main">
                    <div class="container">
                        <div class="mobile-menu-icon">
                            <i class="fas fa-bars"></i>
                        </div>
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('/image/Logo.png') }}" alt="">
                            </a>
                        </div>
                        <div class="menu">
                            @php
                                $nav_active = session('nav_active');
                            @endphp
                            <ul>
                                <li class="
                                {{ $nav_active == "home" ? 'active' : '' }}
                                {{-- mega-menu --}}
                                "><a href="{{ url('/') }}">Home</a>
                                    {{-- <ul class="sub-menu-main-menu first">
                                        <li class="child"><a href="#">Homepage v1</a></li>
                                        <li class="active child"><a href="#">Homepage v2</a></li>
                                        <li class="child"><a href="#">Homepage v3</a></li>
                                        <li class="child"><a href="#">Homepage v4</a></li>
                                        <li class="child"><a href="#">Homepage v5</a></li>
                                        <li class="child"><a href="#">Homepage v6</a></li>
                                    </ul> --}}
                                </li>
                                <li class=" 
                                {{ $nav_active == "shop" ? 'active' : '' }}
                                {{-- mega-menu --}}
                                "><a href="{{ route('shop.show') }}">Shop </a>
                                    {{-- <ul class="sub-menu-main-menu second">
                                        <li>
                                            <ul class="sub-menu-top">
                                                <li>
                                                    <ul class="sub-menu-top-content">
                                                        <li class="title">SHOP LAYOUT</li>
                                                        <li class="child"><a href="#">Shop - Full Width</a></li>
                                                        <li class="child"><a href="#">Shop - Sidebar Right</a></li>
                                                        <li class="child"><a href="#">Shop - List View</a></li>
                                                        <li class="child"><a href="#">Shop - Checkout</a></li>
                                                        <li class="child"><a href="#">Shop - Cart</a></li>
                                                        <li class="child"><a href="#">Shop - Wishlist</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="sub-menu-top-content">
                                                        <li class="title">PRODUCT LAYOUT</li>
                                                        <li class="child"><a href="#">Scroll Gallery</a></li>
                                                        <li class="active child"><a href="#">Carousel Gallery</a></li>
                                                        <li class="child"><a href="#">Grid Gallery</a></li>
                                                        <li class="child"><a href="#">Left Vertical Gallery</a></li>
                                                        <li class="child"><a href="#">Right Vertical Gallery</a></li>
                                                        <li class="child"><a href="#">Bottom Gallery</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="sub-menu-top-content">
                                                        <li class="title">OTHER SHOP PAGE</li>
                                                        <li class="child"><a href="#">Page - Collection</a></li>
                                                        <li class="child"><a href="#">Page - Lookbook</a></li>
                                                        <li class="child"><a href="#">Page - Lookbook</a></li>
                                                        <li class="child"><a href="#">Page - Shopping Cart</a></li>
                                                        <li class="child"><a href="#">Page - Wistlish</a></li>
                                                        <li class="child"><a href="#">Page - Checkout</a></li>
                                                    </ul>
                                                </li>
        
                                            </ul>
                                        </li>
                                        <li>
                                            <ul class="sub-menu-bot">
                                                <li>
                                                    <ul class="sub-menu-bot-content">
                                                        <li class="title">PRODUCT TYPES</li>
                                                        <li class="child"><a href="#">Simple Product</a></li>
                                                        <li class="child"><a href="#">Grouped Product</a></li>
                                                        <li class="child"><a href="#">Variable Product</a></li>
                                                        <li class="child"><a href="#">Special Product</a></li>
                                                        <li class="child"><a href="#">Out Of Stock</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('/image/sub-menu/img.png') }}" alt="">
                                                </li>
        
        
                                            </ul>
                                        </li>
        
        
                                    </ul> --}}
                                </li>
                                {{-- <li class="
                                mega-menu
                                "><a href="#">Page</a>
                                    <ul class="sub-menu-main-menu third">
                                        <li class="child"><a href="http://localhost:81/php1/figma/cart-page.html#">Cart Page online</a></li>
                                        <li class="active child"><a href="http://localhost:81/php1/figma/product-detail.html#">Product detail online</a></li>
                                        <li class="child"><a href="http://localhost:81/php1/figma/blog-detail-page.html#">Blog detail online</a></li>
                                        <li class="child"><a href="#">Our Team</a></li>
                                        <li class="child"><a href="#">Payment Plans</a></li>
                                        <li class="child"><a href="http://localhost:81/php1/figma/404.html#">Page 404 online</a></li>
                                        <li class="child"><a href="#">Gift Cards</a></li>
                                    </ul>
                                </li> --}}
                                <li class="
                                {{ $nav_active == "blog" ? 'active' : '' }}
                                {{-- mega-menu --}}
                                "><a href="{{ route('post.show') }}">Blog</a>
                                    {{-- <ul class="sub-menu-main-menu last">
                                        <li class="child"><a href="#">Blog Standard</a></li>
                                        <li class="active child"><a href="#">Blog Side Image</a></li>
                                        <li class="child"><a href="#">Blog Grid</a></li>
                                        <li class="child"><a href="#">Blog Text Only</a></li>
                                        <li class="child"><a href="#">Blog Overlay Image</a></li>
                                        <li class="child"><a href="#">Blog Image</a></li>
                                    </ul> --}}
                                </li>
                                <li class="
                                {{ $nav_active == "about-us" ? 'active' : '' }}
                                "><a href="{{ route('about-us.show') }}">About Us</a></li>
                                <li class="
                                {{ $nav_active == "contact-us" ? 'active' : '' }}
                                "><a href="{{ route('contact.show') }}">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="list-icon-contact">
                            <div class="icon-contact-item search"><a href="#" id="show-form-search"> <img
                                        src="{{ asset('/image/icon/search.png')}}" alt=""></a></div>
        
                            <div class="icon-contact-item login"><a href="#" id="show-lightbox"> <img
                                        src="{{ asset('/image/icon/login.png')}}" alt=""></a></div>
        
                            <div class="icon-contact-item like"><a href="#"><img src="{{ asset('/image/icon/like.png')}}" alt=""></a>
                            </div>
                            <div class="icon-contact-item cart">
                                <a href="#" id="cart-inpage"> <img src="{{ asset('/image/icon/cart.svg')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        
        @yield('content')
        
        <div class="footer-top" style="background-color:transparent;">
        </div>
        <footer>
            <div class="container">
                <div class="footer-shipping">
                    <div class="footer-shipping-item">
                        <img src="{{ asset('/image/footer/icon1.png')}}" alt="">
                        <p>Fast Delivery</p>
                        <p>Across West & East India</p>
                    </div>
                    <div class="footer-shipping-item">
                        <img src="{{ asset('/image/footer/icon2.png')}}" alt="">
                        <p>safe payment</p>
                        <p>100% Secure Payment</p>
                    </div>
                    <div class="footer-shipping-item">
                        <img src="{{ asset('/image/footer/icon3.png')}}" alt="">
                        <p>Online Discount</p>
                        <p>Add Multi-buy Discount</p>
                    </div>
                    <div class="footer-shipping-item">
                        <img src="{{ asset('/image/footer/icon4.png')}}" alt="">
                        <p>Help Center</p>
                        <p>Dedicated 24/7 Support</p>
                    </div>
                    <div class="footer-shipping-item">
                        <img src="{{ asset('/image/footer/icon5.png')}}" alt="">
                        <p>Curated items</p>
                        <p>From Handpicked Sellers</p>
                    </div>
    
                </div>
                <div class="line-footer"></div>
                <div class="footer-main">
                    <div class="footer-main-contact">
                        <p class="title">Let Us Help You</p>
                        <p>If you have any question, please <br>
                            contact us at: <span style="color:#96AE00">support@example.com</span></p>
                        <p>Social Media:</p>
                        <img src="{{ asset('/image/footer/social-contact.png')}}" alt="">
                    </div>
                    <div class="footer-main-address">
                        <p class="title">Looking for Orfarm?</p>
                        <p>68 St. Vicent Place, Glasgow, Greater <br>
                            Newyork NH2012, UK.</p>
                        <p><span> Monday – Friday:</span> 8:10 AM – 6:10 PM </p>
                        <p><span> Saturday: </span>10:10 AM – 06:10 PM </p>
                        <p> <span>Sunday:</span> Close </p>
                    </div>
                    <div class="footer-main-hot-category">
                        <p class="title">HOT CATEGORIES</p>
                        <p><span>Fruits & Vegetables</span></p>
                        <p> Dairy Products</p>
                        <p><span>Package Foods</span></p>
                        <p><span>Beverage</span></p>
                        <p><span> & Wellness</span></p>
                    </div>
                    <div class="line-vertical-footer"></div>
                    <div class="footer-main-our-newsletter">
                        <p class="title">Our newsletter</p>
                        <p>Subscribe to the Orfarm mailing list to receive updates <br>
                            on new arrivals & other information.</p>
                        <div class="form-contact">
                            <form action="" method="POST" class="subscribe">
                                <input type="text" name="form-contact" placeholder="Your email address...">
                                <button type="submit">SUBSCRIBED</button>
                                <img src="{{ asset('/image/footer/email.png')}}" alt="">
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="footer-botom">
            <div class="copyright">Copyright © ORFARM all rights reserved. Powered by <span class="my-project">Thai Binh Duong</span>.</div>
        </div>
        <section class="dialog">
            <div class="form-login">
                <div class="lightbox-login">
                    <a href="#" class="close-lightbox">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                    <div class="login-tab">
                        <ul>
                            <li class="active"><a href="#login">LOGIN</a></li>
                            <li><a href="#register">REGISTER</a></li>
                        </ul>
                    </div>
                    <div class="form-content">
                        <div class="login-form" id="login">
                            <form action="{{ route('guest.login') }}" method="POST" >
                                @csrf
                                <label for="email-login"> Email *</label>
                                <div class="wrap-input">
                                    <input class="form-input" type="email" id="email-login" name="email" value="{{ old("email") }}"
                                    placeholder="Username">
                                    <i id="icon-fname" class="far fa-user-circle"></i>
                                </div>
                                <small class="error_email_login text-danger"></small>
                                <small class="text-danger error_check_login"></small>
                                <div class="space-16"></div>
                                <label for="password-login">Password *</label>
                                <div class="wrap-input">
                                    <input type="password" class="form-input"  autocomplete="on" id="password-login" name="password" placeholder="Password">
                                    <i id="icon-password" class="fas fa-unlock-alt"></i>
                                </div>
                                <small class="error_password_login text-danger"></small>
                                <small class="text-danger error_check_login"></small>
                                <div class="space-16"></div>
                                <input type="checkbox" id="form-login-checkbox"><label for="form-login-checkbox" class="checkbox-important">Remember me</label>
                                <a href="#" class="lost-pasword">Lost your password?</a><br>
                                <input type="submit" value="SUBMIT" name="login">
                                <p style="font-weight: 400;font-size: 14px;line-height: 20px;text-align: center;
                                color: #4D5574;">By providing your email address, you agree to our </p>
                                <p style="font-weight: 400;font-size: 14px;line-height: 20px;text-align: center;
                                color: #4D5574;"><a href="#" style="color: #96AE00;"> Privacy Policy </a> and <a
                                        href="#" style="color: #96AE00;"> Terms of Service </a>.</p>
                            </form>
                        </div>
                        <div class="login-form" id="register">
                            <form action="{{ route('guest.register') }}" method="POST" >
                                @csrf
                                <div class="alert alert-danger register" style="display:none"></div>
                                <label for="email-register"> Email *</label>
                                <div class="wrap-input">
                                <input type="email" class="form-input" id="email-register" name="email" placeholder="Email"
                                value="{{ old("email") }}"  ><i id="icon-fname" class="far fa-user-circle"></i>
                                </div>

                                <small class="error_email_register text-danger"></small>
                                
                                <div class="space-16"></div>
    
                                <label for="password">Password *</label>
                                <div class="wrap-input">
                                <input type="password" class="form-input" autocomplete="on" id="password" name="password" placeholder="Password"><i id="icon-password"
                                    class="fas fa-unlock-alt"></i>
                                    
                                </div>

                                <small class="error_password_register text-danger"></small>

                                {{-- <div class="space-16"></div>
                                <label for="password-repeat-register">Repeat Password *</label>
                                <div class="wrap-input">
                                <input type="password" class="form-input" autocomplete="on" id="password-repeat-register" name="password_confirmation" placeholder="Password"><i
                                    id="icon-password-2" class="fas fa-unlock-alt"></i>
                                    
                                </div> --}}

                                <div class="space-16"></div>
                                <input type="submit" 
                                value="REGISTER" name="btn_register"
                                >
                                <p style="font-weight: 400;font-size: 14px;line-height: 20px;text-align: center;
                                color: #4D5574;">By providing your email address, you agree to our </p>
                                <p style="font-weight: 400;font-size: 14px;line-height: 20px;text-align: center;
                                color: #4D5574;"><a href="#" style="color: #96AE00;"> Privacy Policy </a> and <a
                                        href="#" style="color: #96AE00;"> Terms of Service </a>.</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-search" >
                <div class="modal-search">
                    <a href="#" class="close-search-form">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                    <p class="title">WHAT ARE YOU LOOKING FOR?</p>
                    <form action="{{ route('product.search') }}" method="POST">
                        @csrf
                        <input type="text" name="search" placeholder="Search in 400+ products...">
                        <div class="btn_search">
                            <input type="submit" value="Search" name="search_button">
                            <i class="fas fa-search"></i>
                        </div>
                        
                    </form>
                    {{-- <p class="category">Popular Searches: <a href="#">Vegetables</a>, <a href="#">Meat</a>, <a href="#">Drink Juice</a></p> --}}
                </div>
            </div>
            <div class="cart-inpage  {{ Cart::count() == 0 ? "empty" : '' }} ">
                <div class="cart-block">
                    <div class="cart-inpage-title">
                        <p>Your cart</p>
                        <a href="#" class="close-cart-inpage"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                    <div class="cart-inpage-content">
                        @if ( Cart::count() > 0 )
                            <div class="cart-product">
                                {{-- {{ $cart }} --}}
                                @foreach ( Cart::content() as $cart_item )
                                    <div class="cart-product-item">
                                        <div class="cart-product-item-left">
                                            <a href="{{ route('cart.remove',$cart_item->rowId) }}"><i class="fa-solid fa-xmark"></i></a>
                                            <img src='{{ url($cart_item->options->product_image)}}' alt="" width="60px" height="60px">
                                        </div>
                                        <div class="cart-product-item-right">
                                            <p>{{ ucwords($cart_item->name) }}</p>
                                            <p><span class="cart-product-{{$cart_item->id}}">{{ $cart_item->qty }}</span> × <span>{{  money_format($cart_item->price).currency() }}</span></p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @else
                            <img src="{{ asset('/image/cart/cart-empty.png')}}" alt="">
                            <p>Your cart is currently empty.</p>
                            <a href="{{ route('shop.show') }}">Return to shop</a>
                        @endif

                    </div>
                    <div class="cart-inpage-footer">
                        @if ( Cart::count() > 0 )
                            <div class="cart-check-out">
                                <div class="total-price">
                                    <p>SUBTOTAL:</p>
                                    <p class="total-price-cart">{{ Cart::total(0,'.',',') }}</p>
                                </div>
                                <a href="{{ route("cart.show") }}">VIEW CART</a>
                                {{-- <a href="#">CHECK OUT</a> --}}
                            </div>
                        @endif    
                        <p class="footer-text">Free shipping for orders <span>under 10km</span></p>
                    </div>
                </div>
            </div>

            <div class="menu-mobile">
                <div class="close-mobile-menu">
                    <a href="#">CLOSE<span>&times;</span> </a>
                </div>
                <div class="menu-mobile-content">
                    <p>WHAT ARE YOU LOOKING FOR?</p>

                    <form action="{{ route('product.search') }}" method="POST">
                        @csrf
                        <div class="input-search-menu-mobile">
                            <input type="text" name="search" placeholder="Search products...">
                        </div>
                        
                        <div class="btn_search">
                            <input type="submit" value="Search" name="search_button">
                            <i class="fas fa-search"></i>
                        </div>
                        
                    </form>

                    {{-- <div class="input-search-menu-mobile">
                        <input type="search" name="" id="" placeholder="Search products...">
                    </div> --}}

                    <div class="main-sub-menu-mobile">
                        <div class="main-sub-menu-mobile-item">
                            <a href=" {{route("public.home")}} ">Home 
                                {{-- <span> 
                                    <i class="fas fa-chevron-up"></i>
                                    <i class="fas fa-chevron-down"></i></span>  --}}
                            </a> 
                            {{-- <div class="hide-main-sub-menu-mobile">
                                <ul>
                                    <li> <a href="#">About Me</a> </li>
                                    <li> <a href="#">Coming Soon</a> </li>
                                    <li> <a href="#">FAQs</a> </li>
                                    <li> <a href="#">Our Team</a> </li>
                                    <li> <a href="#">Page 404</a> </li>
                                </ul>
                            </div> --}}
                        </div>
                        <div class="main-sub-menu-mobile-item">
                            <a href=" {{route("shop.show")}} ">Shop 
                                {{-- <span><i class="fas fa-chevron-up"></i><i class="fas fa-chevron-down"></i></span> --}}
                            </a> 
                            {{-- <div class="hide-main-sub-menu-mobile">
                                <ul>
                                    <li> <a href="#">About Me</a> </li>
                                    <li> <a href="#">Coming Soon</a> </li>
                                    <li> <a href="#">FAQs</a> </li>
                                    <li> <a href="#">Our Team</a> </li>
                                    <li> <a href="#">Page 404</a> </li>
                                </ul>
                            </div> --}}
                        </div>
                        {{-- <div class="main-sub-menu-mobile-item">
                            <a href="#">Page 
                                <span><i class="fas fa-chevron-up"></i><i class="fas fa-chevron-down"></i></span> 
                            </a> 
                            <div class="hide-main-sub-menu-mobile">
                                <ul>
                                    <li> <a href="#">About Me</a> </li>
                                    <li> <a href="#">Coming Soon</a> </li>
                                    <li> <a href="#">FAQs</a> </li>
                                    <li> <a href="#">Our Team</a> </li>
                                    <li> <a href="#">Page 404</a> </li>
                                </ul>
                            </div>
                        </div> --}}
                        <div class="main-sub-menu-mobile-item">
                            <a href="  {{route("post.show")}}   ">Blog
                                {{-- <span><i class="fas fa-chevron-up"></i><i class="fas fa-chevron-down"></i></span> --}}
                            </a> 
                            {{-- <div class="hide-main-sub-menu-mobile">
                                <ul>
                                    <li> <a href="#">About Me</a> </li>
                                    <li> <a href="#">Coming Soon</a> </li>
                                    <li> <a href="#">FAQs</a> </li>
                                    <li> <a href="#">Our Team</a> </li>
                                    <li> <a href="#">Page 404</a> </li>
                                </ul>
                            </div> --}}
                        </div>
                        <div class="main-sub-menu-mobile-item">
                            <a href=" {{route("about-us.show")}}  ">About Us
                                {{-- <span><i class="fas fa-chevron-up"></i><i class="fas fa-chevron-down"></i></span> --}}
                            </a> 
                            {{-- <div class="hide-main-sub-menu-mobile">
                                <ul>
                                    <li> <a href="#">About Me</a> </li>
                                    <li> <a href="#">Coming Soon</a> </li>
                                    <li> <a href="#">FAQs</a> </li>
                                    <li> <a href="#">Our Team</a> </li>
                                    <li> <a href="#">Page 404</a> </li>
                                </ul>
                            </div> --}}
                        </div>
                        <div class="main-sub-menu-mobile-item">
                            <a href=" {{route("contact.show")}}  ">Contact Us 
                                {{-- <span><i class="fas fa-chevron-up"></i><i class="fas fa-chevron-down"></i></span>  --}}
                            </a> 
                            {{-- <div class="hide-main-sub-menu-mobile">
                                <ul>
                                    <li> <a href="#">About Me</a> </li>
                                    <li> <a href="#">Coming Soon</a> </li>
                                    <li> <a href="#">FAQs</a> </li>
                                    <li> <a href="#">Our Team</a> </li>
                                    <li> <a href="#">Page 404</a> </li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                    {{-- <p>My Account</p>
                    <a href="#">LOGIN</a>
                    <a href="#">REGISTER</a> --}}
                </div>
            </div>
            <div class="navigation-mobile-fixed">
                <div class="navigation-mobile-relative">
                    <a href=" {{route("public.home")}} "><i class="fa-solid fa-house"></i></a>
                    <a href=" {{route("shop.show")}} " style="transform: translateX(-50%);"><i class="fa-sharp fa-solid fa-store"></i></a>
                    <a href=" {{route("cart.show")}} "><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href=" {{route("shop.show")}} "  style="transform: translateX(50%);"><i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href=" # "><i class="fa-solid fa-user"></i></a>
                </div>
            </div>
            <div class="background-dialog">
            </div>
        </section>
    </div>
        <script src=" {{ asset('/slider/owlcarousel/owl.carousel.min.js') }} "></script>
        
        @if (session('register_success'))
            <script>
                swal({
                    text: "Register Success",
                    icon: "success",
                    button: false,
                    timer: 3000,
                });
            </script>
        @endif
        
    </body>
</html>
