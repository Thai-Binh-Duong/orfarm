@extends('welcome')

@section('content')
    <div class="post-category container">
        <div class="breadcum">
            <p><a href="{{route('public.home')}}">Home</a> / <a href="#">{{ ucwords($category->name) }}</a> </p>
        </div>
        {{-- {{ $posts }} --}}
        @if( $posts )
            <div class="d-grid-4-gap-30 pad-bot-80 pad-top-30"> 
                @foreach ($posts as $post_items)
                    <div class="blog-item">
                        <a href="{{ route('post.detail',$post_items->id) }}" class="blog-image">
                            <img src="{{ url("$post_items->post_image") }}" alt="">
                        </a>
                        <div class="blog-description">
                            <div class="blog-description-top">
                                <div class="blog-description-top-category">
                                    <p>{{ $post_items->category->name }}</p>
                                </div>
                                <div class="blog-description-top-author">
                                    <p>{{ $post_items->admin->name }}</p>
                                </div>
                                <div class="blog-description-top-time">
                                    <p>{{ $post_items->created_at->format('M j.Y') }}</p>
                                </div>
                            </div>
                            <div class="blog-description-title">
                                <a href="{{ route('post.detail',$post_items->id) }}">{{ Str::words( ucwords($post_items->post_title), 10, ' ...')  }}</a>
                            </div>
                            <div class="blog-description-content">
                                <p>{{ Str::words($post_items->post_description, 20, ' ...') }}</p>
                            </div>
                            <div class="blog-description-button">
                                <a href="{{ route('post.detail',$post_items->id) }}">Continue reading</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="page-404">
                <img src="{{asset("/image/contact-us-page/Group.png")}}" alt="">
                <p>Khong co ban ghi nao</p>
                <a href="{{ route('post.show') }}">Back to blog page</a>
            </div>
        @endif
        
    </div>
@endsection