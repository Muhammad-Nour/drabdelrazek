<?php
use App\Models\Custom;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\Branch;

$about   = Custom::select('id','photo', 'description_'.app()->getLocale().' as description')->where('code', 'about')->first();
$address = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'address')->first();
$branches = Branch::select('id', 'description_'.app()->getLocale().' as description',
    'name_'.app()->getLocale().' as name','address_'.app()->getLocale().' as address')->get();

$phone    = Setting::where('code', 'phone')->first();
$facebook = Setting::where('code', 'facebook')->first();
$instgram = Setting::where('code', 'instgram')->first();
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

@section('title', __('front.meettings'))

@section('css')
@stop

@section('js')
@stop

@section('content')


<div class="breadcumb-wrapper">
    <div class="parallax" data-parallax-image="{{asset('design-site/img/breadcurmb/breadcurmb-1-1.jpg')}}"></div>
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{__('front.blog')}}</h1>
            <div class="breadcumb-menu-wrap"><i class="far fa-home-lg"></i>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">{{__('front.home')}}</a></li>
                    <li class="active">{{__('front.blog')}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="vs-blog-wrapper space-top space-md-bottom">
    <div class="container">

        <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.3s" data-slide-show="3" data-lg-slide-show="2">
            @foreach($meettings as $meetting)
            <div class="col-xl-4">
                <div class="vs-blog blog-card">
                    <div class="blog-img">
                        <img src="{{asset('images/'.$meetting->photo)}}"
                        alt="video Image" class="w-100">
                        <a href="{{$meetting->video}}"
                            class="popup-video play-btn style2 position-center">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title h5 font-body lh-base">
                            {{$meetting->title}}
                        </h3>

                        <p>
                            {{$meetting->description}}
                        </p>
                     </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



@stop