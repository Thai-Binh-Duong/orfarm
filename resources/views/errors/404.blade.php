{{-- @extends('errors::minimal')

@section('title', __('Not Found')) --}}

{{-- @section('code', '404')

@section('message', __('Not Found')) --}}
@extends('welcome')

@section('content')
    <div class="page-404">
        <img src="{{asset("/image/contact-us-page/Group.png")}}" alt="">
        <p>Oops...That link is broken.</p>
        <p>Sorry for the inconvenience. Go to our homepage or check out our latest collections.</p>
        <a href="{{ url('/') }}">Back to homepage</a>
    </div>
@endsection

