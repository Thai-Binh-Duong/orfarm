@extends('welcome')

@section('content')
<div class="list-blog-slider">
    @foreach ($special_posts as $special_post)
        <div class="list-blog-slider-content">
            <div class="blog-media">
                <img src="{{ url("$special_post->post_image") }}" alt="">
            </div>
            <div class="blog-content">
                <div class="blog-description-top">
                    <div class="blog-description-top-category">
                        <p>{{ $special_post->category->name }}</p>
                    </div>
                    <div class="blog-description-top-author">
                        <p>{{ $special_post->admin->name }}</p>
                    </div>
                    <div class="blog-description-top-time">
                        <p>{{ $special_post->created_at->format('M j.Y') }}</p>
                    </div>
                </div>
                <div class="blog-description-title">
                    <a href="{{ route('post.detail',$special_post->id) }}">{{ Str::words( ucwords($special_post->post_title), 10, ' ...')  }}</a>
                </div>
                <div class="blog-description-button">
                    <a href="{{ route('post.detail',$special_post->id) }}">Continue reading</a>
                </div>
            </div>
        </div>
    @endforeach 
    
</div>
<div class="list-blog-page container">
    <div class="blog-page-content">
        <div class="blog-page-content-wrap">
            @if ( !empty($posts)   )
                
                <div class="blog-page-main-content">
                    @foreach ($posts as $post_item)
                        <div class="blog-item">
                            <a href="{{ route('post.detail',$post_item->id) }}" class="blog-image">
                                <img src="{{ url("$post_item->post_image") }}" alt="">
                            </a>
                            <div class="blog-description">
                                <div class="blog-description-top">
                                    <div class="blog-description-top-category">
                                        <p>{{ $post_item->category->name }}</p>
                                    </div>
                                    <div class="blog-description-top-author">
                                        <p>{{ $post_item->admin->name }}</p>
                                    </div>
                                    <div class="blog-description-top-time">
                                        <p>{{ $post_item->created_at->format('M j.Y') }}</p>
                                    </div>
                                </div>
                                <div class="blog-description-title">
                                    <a href="{{ route('post.detail',$post_item->id) }}">{{ Str::words( ucwords($post_item->post_title), 10, ' ...')  }}</a>
                                </div>
                                <div class="blog-description-content">
                                    <p>{{ Str::words($post_item->post_description, 20, ' ...') }}</p>
                                </div>
                                <div class="blog-description-button">
                                    <a href="{{ route('post.detail',$post_item->id) }}">Continue reading</a>
                                </div>
                            </div>
                        </div>
        
                    @endforeach
                </div>

                {{ $posts->links('pagination.custom') }}
                @else

                <div class="page-404">
                    <img style="width:200px" src="{{asset("/image/contact-us-page/Group.png")}}" alt="">
                    <p>Khong co ban ghi nao</p>
                    <a href="{{ route('post.show') }}">Back to blog page</a>
                </div>

            @endif
            
        </div>
        
        <div class="blog-page-sidebar">
            <div class="blog-page-sidebar-search">
                <form action="" method="GET">
                    <input type="text" name="keyword" placeholder="Search....">
                    <div class="search-btn-blog-list">
                        <input type="submit" name="search-btn" value="Search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </form>
            </div>
            <div class="blog-page-sidebar-category">
                <p>Blog Categories</p>
                <ul>
                    
                    @foreach ($categories as $category)
                        <li><a href="{{ route('post.filter',$category->id) }}">{{ ucwords($category->name) }}</a><span>({{ $category->posts->count() }})</span> </li>
                    @endforeach
                    
                </ul>
            </div>
            <div class="blog-page-sidebar-recent-post">
                <p>Recent Posts</p>
                {{-- {{$recent_posts}} --}}

                <div class="recent-post-list">
                    @foreach ($recent_posts as $recent_post)
                        <div class="recent-post-list-detail">
                            <a href="{{route('post.detail',$recent_post->id)}}">
                                <div class="recent-post-list-detail-image">
                                    <img src="{{ url("$recent_post->post_image") }}" alt=""></div>
                                <div class="recent-post-list-detail-content" >
                                    <ul>
                                        <li>{{ Str::words( ucwords($recent_post->post_title), 10, ' ...')  }}</li>
                                        <li>{{ $recent_post->created_at->format('M j.Y') }}</li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    
                </div>
            </div>
            {{-- <div class="blog-page-sidebar-tags">
                <p>TAGS</p>
                <div class="blog-page-sidebar-tags-content">
                    <a href="#">healthy</a>
                    <a href="#">natural</a>
                    <a href="#">salad</a>
                    <a href="#">foods</a>
                    <a href="#">orfarm</a>
                    <a href="#">meat</a>
                    <a href="#">grocery</a>
                    <a href="#">fresh</a>
                    <a href="#">vegetables</a>
                    <a href="#">seafoods</a>
                    <a href="#">fruits</a>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection