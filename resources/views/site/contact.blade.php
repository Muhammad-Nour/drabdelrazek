<?php
use App\Models\Custom;
use App\Models\Branch;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Blog;

$about   = Custom::select('id','photo', 'description_'.app()->getLocale().' as description')->where('code', 'about')->first();
$branches = Branch::select('id', 'description_'.app()->getLocale().' as description',
        'name_'.app()->getLocale().' as name','address_'.app()->getLocale().' as address')->get();
$phone    = Setting::where('code', 'phone')->first();
$phone2    = Setting::where('code', 'phone2')->first();
$facebook = Setting::where('code', 'facebook')->first();
$instgram = Setting::where('code', 'instgram')->first();
$WhatsApp = Setting::where('code', 'WhatsApp')->first();

$secret1 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret1')->first();
$secret2 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret2')->first();
$secret3 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret3')->first();
$secrets_video = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secrets_video')->first();
$secrets_photo = Custom::select('id','photo')->where('code', 'secrets_photo')->first();

$dr_name = Custom::where('code', 'dr_name')->first();

$bio = Custom::where('code', 'bio')->first();

?>
@extends('site.layouts.app')

@section('title', __('front.contact'))

@section('css')
@stop

@section('js')
@stop

@section('content')
<div class="breadcumb-wrapper">
    <div class="parallax" data-parallax-image="{{asset('design-site/img/breadcurmb/breadcurmb-1-1.jpg')}}"></div>
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{__('front.contact')}}</h1>
            <div class="breadcumb-menu-wrap"><i class="far fa-home-lg"></i>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">{{__('front.home')}}</a></li>
                    <li class="active">{{__('front.contact')}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="vs-contact-wrapper vs-contact-layout1 space-top space-md-bottom">
    <div class="container">
        <div class="row gx-60 align-items-center">
            <div class="col-lg-12">
                <div class="contact-information mb-30">
                    <h2 class="mt-n2">{{$branch->name_ar}}</h2>

                    <h3 class="h4 pt-2 mb-10">مواعيد العمل</h3>
                    <p>{{$branch->description_ar}}</p>

                    <h4 class="pt-2 mb-10">{{__('front.address')}}</h4>
                    <p class="fs-md"><i class="far fa-map-marker-alt me-2"></i>{{$branch->address_ar}}</p>
                </div>
                <div class="ratio ratio-21x9 contact-map mt-70 mb-30">
                {!!$branch->map!!}
                </div>
                    <h4 class="pt-2 mb-2">{{__('front.customer_service')}}</h4>
                    <h4 class="h3 font-theme2 mb-0">
                        <i class="far fa-phone-alt me-2"></i>{{$phone->value}} |
                        <i></i>{{$phone2->value}}
                    </h4>
                </div>
            </div>
        </div>
        
    </div>
</section>
@stop