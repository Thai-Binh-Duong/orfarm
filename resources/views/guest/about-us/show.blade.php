@extends('welcome')

@section('content')
<div class="about-us-page">
    <div class="banner-about-us-page" style="background-image:url({{ asset('/image/about-us/bg1.png') }}">
        <p>About for Orfarm</p>
        <p>Unique People</p>
        <p>Over 25 years of experience, we have crafted thousands of strategic discovery process that <br>
            enables us to peel back the layers which enable us to understand, connect.</p>
        <a href="#">About us</a>
    </div>
    <div class="about-us-page-content ">
        <div class="about-us-page-content-1 container">
            <div class="about-us-page-content-1-left">
                <img src="{{asset("/image/about-us/about-us.webp")}}" alt="">
            </div>
            <div class="about-us-page-content-1-right">
                <p>Welcome to Orfarm</p>
                <p>We Help Your <br>
                    Digital Business Grow</p>
                <p>We provide digital experience services to startups and small businesses. 
                    We help our clients succeed by creating brand identities, digital experiences, 
                    and print materials. Sed trspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                <ul>
                    <li><i class="fa-solid fa-check"></i>Track your daily activity.</li>
                    <li><i class="fa-solid fa-check"></i>Start a private group video call.</li>
                    <li><i class="fa-solid fa-check"></i>All the lorem ipsum generators on the Internet.</li>
                </ul>
            </div>
        </div>
        <div class="about-us-page-content-2 container">
            <div class="about-us-page-content-2-content">
                <img src="{{asset("/image/about-us/icon1.png")}}" alt="">
                <p>Select Your Products</p>
                <p>Choose from select produce to start.
                    Keep, add, or remove items.</p>
            </div>
            <img src="{{asset("/image/about-us/1.png")}}" alt="">
            <div class="about-us-page-content-2-content">
                <img src="{{asset("/image/about-us/icon2.png")}}" alt="">
                <p>Our Shop Orfarm</p>
                <p>We provide 100+ products, provide 
                    enough nutrition for your family.</p>
            </div>
            <img src="{{asset("/image/about-us/2.png")}}" alt="">
            <div class="about-us-page-content-2-content">
                <img src="{{asset("/image/about-us/icon3.png")}}" alt="">
                <p>Delivery To Your</p>
                <p>Delivery to your door. Up to 100km
                    and it's completely free.</p>
            </div>
        </div>
        <div class="about-us-page-content-3">
            <div class="why-chose-us-about-us-page">
                <p>~ Why Choose Us ~</p>
                <p>Our Amazing Work</p>
                <p>The liber tempor cum soluta nobis eleifend option congue doming quod mazim.</p>
                <div class="why-chose-us-about-us-page-content">
                    <div class="gossip-why-chose-us-about-us">
                        <img src="{{asset("/image/about-us/bg2.png")}}" alt="">
                        <p>Who We Are</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit,
                            sed do eiusmod tempor labore et dolore dignissimos cumque.
                            Excepteur sint occaecat cupidatat proident.</p>
                    </div>
                    <div class="gossip-why-chose-us-about-us">
                        <img src="{{asset("/image/about-us/bg3.png")}}" alt="">
                        <p>Our Products</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit,
                            sed do eiusmod tempor labore et dolore dignissimos cumque.
                            Excepteur sint occaecat cupidatat proident.</p>
                    </div>
                    <div class="gossip-why-chose-us-about-us">
                        <img src="{{asset("/image/about-us/bg4.png")}}" alt="">
                        <p>How We Work</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit,
                            sed do eiusmod tempor labore et dolore dignissimos cumque.
                            Excepteur sint occaecat cupidatat proident.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-us-page-content-4 container">
            <div class="working-ability-about-us-page">
                <p>~ Good Performance ~</p>
                <p>Our Working Ability</p>
                <p>The liber tempor cum soluta nobis eleifend option congue doming quod mazim.</p>
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/c5lhCqtXXaM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <div class="working-ability-about-us-page-content">
                    <div class="cheat-working-ability-about-us-page">
                        <span><img src="{{asset("/image/about-us/dot.png")}}" alt="">5465+</span>
                        <p>Active Clients</p>
                        <p>Sed ut perspiciatis unde omnis
                            iste natus sit accusantium doloremque.</p>
                    </div>
                    <div class="cheat-working-ability-about-us-page">
                        <span><img src="{{asset("/image/about-us/dot.png")}}" alt="">4968+</span>
                        <p>Projects Done</p>
                        <p>Sed ut perspiciatis unde omnis
                            iste natus sit accusantium doloremque.</p>
                    </div>
                    <div class="cheat-working-ability-about-us-page">
                        <span><img src="{{asset("/image/about-us/dot.png")}}" alt="">565+</span>
                        <p>Team Advisors</p>
                        <p>Sed ut perspiciatis unde omnis
                            iste natus sit accusantium doloremque.</p>
                    </div>
                    <div class="cheat-working-ability-about-us-page">
                        <span><img src="{{asset("/image/about-us/dot.png")}}" alt="">495+</span>
                        <p>Users Online</p>
                        <p>Sed ut perspiciatis unde omnis
                            iste natus sit accusantium doloremque.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-us-page-content-5">
            <div class="different-about-us-page">
                <p>~ Highest Quality ~</p>
                <p>What Makes Us Different</p>
                <p>The liber tempor cum soluta nobis eleifend option congue doming quod mazim.</p>
                <div class="different-about-us-page-content">
                    <div class="lie-different-about-us-page">
                        <img src="{{asset("/image/about-us/different/icon1.png")}}" alt="">
                        <p>100% Fresh Food</p>
                        <p>Adjust global theme options and see
                            design changes in real-time.</p>
                        <a href="#">Learn more</a>
                    </div>
                    <div class="lie-different-about-us-page">
                        <img src="{{asset("/image/about-us/different/icon2.png")}}" alt="">
                        <p>100% Fresh Food</p>
                        <p>Adjust global theme options and see
                            design changes in real-time.</p>
                        <a href="#">Learn more</a>
                    </div>
                    <div class="lie-different-about-us-page">
                        <img src="{{asset("/image/about-us/different/icon3.png")}}" alt="">
                        <p>100% Fresh Food</p>
                        <p>Adjust global theme options and see
                            design changes in real-time.</p>
                        <a href="#">Learn more</a>
                    </div>
                    <div class="lie-different-about-us-page">
                        <img src="{{asset("/image/about-us/different/icon4.png")}}" alt="">
                        <p>100% Fresh Food</p>
                        <p>Adjust global theme options and see
                            design changes in real-time.</p>
                        <a href="#">Learn more</a>
                    </div>
                </div>
                <p>Our nearly 1.4K committed staff members are ready to help.<span><a href="#"  style="color:#96AE00 ;"> Help Center <i class="fa-solid fa-chevrons-right"></i></a></span></p>
            </div>
        </div>
        <div class="about-us-page-content-6 container">
            <div class="testimonial-about-us-page">
                <p>~ Happy Customer ~</p>
                <p>What Client Says</p>
                <p>The liber tempor cum soluta nobis eleifend option congue doming quod mazim.</p>
                <div class="testimonial-about-us-page-content">
                    <div class="client-say-testimonial-about-us-page">
                        <img src="{{asset("/image/blog-detail/img4.png")}}" alt="">
                        <p>" I think Hub is the best theme I ever seen this year. Amazing design, easy to customize and a design quality superlative account on its cloud platform for the optimized performance. "</p>
                        <span>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </span>
                        <p>Jackson Roben</p>
                        <p>Web Designer at Blueskytechco</p>
                    </div>
                    <div class="client-say-testimonial-about-us-page">
                        <img src="{{asset("/image/blog-detail/img5.png")}}" alt="">
                        <p>" I think Hub is the best theme I ever seen this year. Amazing design, easy to customize and a design quality superlative account on its cloud platform for the optimized performance. "</p>
                        <span>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </span>
                        <p>Algistino Lionel</p>
                        <p>Web Designer at Blueskytechco</p>
                    </div>
                    <div class="client-say-testimonial-about-us-page">
                        <img src="{{asset("/image/blog-detail/img6.png")}}" alt="">
                        <p>" I think Hub is the best theme I ever seen this year. Amazing design, easy to customize and a design quality superlative account on its cloud platform for the optimized performance. "</p>
                        <span>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </span>
                        <p>Leonardo Roben</p>
                        <p>Web Designer at Blueskytechco</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection