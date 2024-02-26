@extends('site.layouts.app')

@section('title', __('front.blog'))

@section('banner_title', __('front.blog') )

@section('css')
@stop

@section('js')
@stop

@section('content')

@include('site.inc-banner')

    <section class="vs-blog-wrapper space-top space-md-bottom pt-70 blogs">
        <div class="container">
            <div class="row">
            	@foreach($blogs as $blog)
                <div class="col-lg-8">
                    <div class="vs-blog blog-single">
                        <div class="blog-img"><a href="blog-details.html">
                        	<img src="{{asset('images/'.$blog->photo)}}"
                                    alt="Blog Image"></a></div>
                        <div class="blog-content">
                            <h2 class="blog-title h3">
                            	<a href="{{route('front.blogdetails',$blog->id)}}">{{$blog->title}}</a>
                            </h2>
                            <p>{!!$blog->description!!}</p>
                            <a href="{{route('front.blogdetails',$blog->id)}}" class="link-btn">قراءة المزيد
                            	<i class="fal fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@stop
