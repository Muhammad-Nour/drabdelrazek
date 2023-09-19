<?php
use App\Models\Custom;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Blog;

$about   = Custom::select('id','photo', 'description_'.app()->getLocale().' as description')->where('code', 'about')->first();
$address = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'address')->first();
$phone    = Setting::where('code', 'phone')->first();
$facebook = Setting::where('code', 'facebook')->first();
$LinkedIn = Setting::where('code', 'LinkedIn')->first();
$WhatsApp = Setting::where('code', 'WhatsApp')->first();

$secret1 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret1')->first();
$secret2 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret2')->first();
$secret3 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret3')->first();
$secrets_video = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secrets_video')->first();
$secrets_photo = Custom::select('id','photo')->where('code', 'secrets_photo')->first();

$phone2 = Setting::where('code', 'phone2')->first();

$dr_name = Custom::where('code', 'dr_name')->first();

$bio = Custom::where('code', 'bio')->first();

?>
@extends('site.layouts.app')

@section('title', __('front.blog'))

@section('css')
@stop

@section('js')
@stop

@section('content')

<div class="breadcumb-wrapper">
    <div class="parallax" data-parallax-image="{{asset('design-site/img/breadcurmb/breadcurmb-1-1.jpg')}}"></div>
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Blogs</h1>
            <div class="breadcumb-menu-wrap"><i class="far fa-home-lg"></i>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Blogs</li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    <section class="vs-blog-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="row">
            	@foreach($blogs as $blog)
                <div class="col-lg-8">
                    <div class="vs-blog blog-single">
                        <div class="blog-img"><a href="blog-details.html">
                        	<img src="{{asset('design-site/img/blog/blog-s-1-1.jpg')}}"
                                    alt="Blog Image"></a></div>
                        <div class="blog-content">
                            <div class="blog-meta">
                            	<a href="#"><i class="fal fa-eye"></i>17 Views</a> 
                            	<a href="#"><i class="fal fa-comments"></i>09 Comments</a> 
                            	<a href="#"><i class="fal fa-calendar"></i>{{$blog->date}}</a>
                            </div>
                            <h2 class="blog-title h3">
                            	<a href="blog-details.html">{{$blog->title}}</a>
                            </h2>
                            <p>{!!$blog->description!!}</p>
                            <a href="blog-details.html" class="link-btn">Read More
                            	<i class="fal fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach($blogs as $blog)
                <div class="col-lg-4">
                    <aside class="sidebar-area pl-30">
                        <div class="widget">
                            <h3 class="widget_title">Popular Posts</h3>
                            <div class="recent-post-wrap">
                                <div class="thumb-post">
                                    <div class="media-img">
                                    	<a href="blog-details.html">
                                    	<img src="{{asset('design-site/img/widget/thumb-1-3.jpg')}}" alt="Blog Image">
	                                    </a>
	                                </div>
                                    <div class="media-body">
                                        <h4 class="post-title">
                                        	<a href="blog-details.html">{{$blog->title}}
                                        	</a>
                                        </h4>
                                        <a class="post-date" href="blog.html">
                                        	<i class="fal fa-calendar-alt"></i>{{$blog->date}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@stop