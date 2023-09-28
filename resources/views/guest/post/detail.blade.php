@extends('welcome')

@section('content')
<div class="blog-detail-page container">
    <div class="breadcum">
        <p><a href="{{route('public.home')}}"> Home</a> / <a href="#">{{ $category }}</a> / <a href="#">{{ ucwords($post->post_title) }}</a> </p>
    </div>
    <div class="blog-detail-page-content">
        {{-- <img src="{{ url("$post->post_image") }}" alt=""> --}}
        <div class="blog-detail-page-main-content">
            <div class="blog-description">
                <div class="blog-description-top">
                    <div class="blog-description-top-category">
                        <p>{{ $category }}</p>
                    </div>
                    <div class="blog-description-top-author">
                        <p>{{ $admin }}</p>
                    </div>
                    <div class="blog-description-top-time">
                        <p>{{ $post->created_at->format('M j.Y') }}</p>
                    </div>
                </div>
                <div class="blog-description-title">
                    <a href="#">{{ Str::upper($post->post_title) }}</a>
                </div>

                <div class="blog-description-content">
                    {!! $post->post_content !!}
                </div>
                {{-- <div class="tags-share-blog-detail-page">
                    <div class="tags-blog-detail-page">
                        <span>Tagged:</span>
                        <span>salad</span>
                        <span>seafood</span>
                        <span>foods</span>
                    </div>
                    <div class="share-blog-detail-page">
                        <span>share:</span>
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-youtube"></i>
                        <i class="fa-brands fa-pinterest"></i>
                    </div>
                </div> --}}
                <div class="prev-next-post-blog-page">
                    @if ($previous_post)
                    <div class="prev-post-blog-page">
                        <a href="{{ route('post.detail',$previous_post->id) }}">
                            <i class="fa-solid fa-chevron-left"></i><span>Previous Post</span>
                            <p>{{ wordwrap($previous_post->post_title,5)  }}</p>
                        </a>
                    </div>
                    @else
                        <div></div>
                    @endif
                    @if ($next_post)
                    <div class="next-post-blog-page">
                        <a href="{{ route('post.detail',$next_post->id) }}">
                            <span>Next Post</span><i class="fa-solid fa-chevron-right"></i>
                            <p>{{ wordwrap($next_post->post_title,5)  }}</p>
                        </a>
                    </div>
                    @endif
                </div>
                <div class="author-information-blog-detail-page">
                    <div class="author-blog-detail">
                        <img src="{{asset('/image/blog-detail/img4.png')}}" alt="">
                    </div>
                    <div class="author-info-blog-detail">
                        <p>{{ $post->admin->name }}</p>
                        <p>The tiles are highly resistant to water and dirt and can be cleaned, so they are compatible with the cultivation of plants and cooking and the functions.</p>
                        <a href="#">All Author Posts</a>
                    </div>
                </div>
                {{-- <div class="you-may-also-like-blog-detail">
                    <p>You May Also Like...</p>
                    <div class="related-blog-blog-detail-page">
                        @foreach ($related_posts as $related_post)
                            
                            <div class="blog-item">
                                <div class="blog-image">
                                    <img src="{{asset('/image/blog/img1.png')}}" alt="">
                                </div>
                                <div class="blog-description">
                                    <div class="blog-description-top">
                                        <div class="blog-description-top-category">
                                            <p>Lifestyle</p>
                                        </div>
                                        <div class="blog-description-top-author">
                                            <p>Admin</p>
                                        </div>
                                        <div class="blog-description-top-time">
                                            <p>SEP 15. 2022 </p>
                                        </div>
                                    </div>
                                    <div class="blog-description-title">
                                        <a href="#">Avocado Grilled Salmon, Rich In
                                            Nutrients For The Body</a>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div> --}}
                {{-- <div class="comment-blog-detail-page">
                    <p>LEAVE A COMMENTs</p>
                    <div class="comment-blog-detail-content">
                        <div class="comment-sugar-dady">
                            <div class="comment-sugar-dady-image">
                                <img src="{{asset('/image/blog-detail/img5.png')}}" alt="">
                            </div>
                            <div class="comment-sugar-dady-content">
                                <p>ALEXANDRA MILLER</p>
                                <p>The tiles are highly resistant to water and dirt and can be cleaned, so they are compatible with the cultivation
                                    of plants and cooking and the functions. There are few plugins and apps available for this purpose, many of them required a monthly subscription. </p>
                                <a href="#">Leave Reply</a>
                            </div>  
                        </div>
                        <div class="comment-sugar-baby">
                            <div class="comment-sugar-baby-image">
                                <img src="{{asset('/image/blog-detail/img6.png')}}" alt="">
                            </div>
                            <div class="comment-sugar-baby-content">
                                <p>FRANK ANGEL</p>
                                <p>The tiles are highly resistant to water and dirt and can be cleaned, so they are compatible with the cultivation
                                    of plants and cooking and the functions. There are few plugins and apps available for this purpose, many of them required a monthly subscription. </p>
                                <a href="#">Leave Reply</a>
                            </div>  
                        </div>
                        <div class="comment-sugar-dady">
                            <div class="comment-sugar-dady-image">
                                <img src="{{asset('/image/blog-detail/img7.png')}}" alt="">
                            </div>
                            <div class="comment-sugar-dady-content">
                                <p>MICHAEL ANTHONY</p>
                                <p>The tiles are highly resistant to water and dirt and can be cleaned, so they are compatible with the cultivation
                                    of plants and cooking and the functions. There are few plugins and apps available for this purpose, many of them required a monthly subscription. </p>
                                <a href="#">Leave Reply</a>
                            </div>  
                        </div>
                        
                    </div>
                </div>
                <div class="comment-create-blog-detai">
                    <p>LEAVE A REPLY</p>
                    <p>Your email address will not be published. Required fields are marked *</p>
                    <form action="" method="post">
                        <input type="text" placeholder="Your Name *" >
                        <input type="email" placeholder="Your Email *">
                        <textarea name="" id="" cols="100" rows="10" placeholder="COMMENTS"></textarea>
                        <input type="checkbox" id="post-comment">
                        <label class="checkbox-important" for="post-comment">Save my name, email, and website in this browser for the next time I comment.</label>
                        <input type="submit" value="Post Comment">
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection