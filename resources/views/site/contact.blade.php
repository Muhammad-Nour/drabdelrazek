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
$email    = Setting::where('code', 'email')->first();
$facebook = Setting::where('code', 'facebook')->first();
$instgram = Setting::where('code', 'instgram')->first();
$WhatsApp = Setting::where('code', 'WhatsApp')->first();

$secrets_video = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secrets_video')->first();
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
            @if (session('msg'))
            <div class="alert alert-success">
                <button type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{session('msg')}}
            </div>
            @endif
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">

                <form action="{{route('message.store')}}" method="get"
                class="form-wrap3 mb-30" data-bg-color="#f3f6f7">
                @csrf
                <div class="form-title">
                    <h3 class="mt-n2 fls-n2 mb-0">إرسل رسالتك بأمان</h3>
                    <p class="text-theme mb-4">لن يتم نشر بياناتك الشخصية</p>
                    @if (session('msg'))
                    <div class="alert alert-success">
                        <button type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{session('msg')}}
                    </div>
                    @endif
                </div>
                <div class="form-group mb-15">
                    <input type="text" class="form-control {{ $errors->first('name') ? 'border-red' : 'style3' }}" 
                    name="name" id="name" placeholder="الإسم" required value="{{old('name')}}"> 
                    <i class="fal fa-user"></i>
                    @if ($errors->first('name'))
                    <p class="text-center"><span class="form-error"> {{ $errors->first('name') }}</span></p>
                    @endif
                </div>
                <div class="form-group mb-15">
                    <input type="text" class="form-control {{ $errors->first('phone') ? 'border-red' : 'style3' }}" 
                    name="phone" id="phone" placeholder="الموبايل" required value="{{old('phone')}}"> 
                    <i class="fal fa-mobile"></i>
                    @if ($errors->first('phone'))
                    <p class="text-center"><span class="form-error"> {{ $errors->first('phone') }}</span></p>
                    @endif
                </div>
                <div class="form-group mb-15">
                    <input type="email" class="form-control {{ $errors->first('email') ? 'border-red' : 'style3' }}" 
                    name="email" id="email" placeholder="الإيميل" value="{{old('email')}}"> 
                    <i class="fal fa-envelope"></i>
                    @if ($errors->first('email'))
                    <p class="text-center"><span class="form-error"> {{ $errors->first('email') }}</span></p>
                    @endif
                </div>
                <div class="form-group mb-15 ">
                    <textarea name="description" id="description" cols="30" rows="3"
                    class="form-control {{ $errors->first('description') ? 'text-border-red' : 'style3' }}" 
                    placeholder="الرسالة" required value="{{old('description')}}">
                </textarea> 
                <i class="fal fa-pencil-alt"></i>
                @if ($errors->first('description'))
                <p class="text-center"><span class="form-error"> {{ $errors->first('description') }}</span></p>
                @endif
            </div>
            <div class="form-btn pt-15">
                <button class="vs-btn style2" type="submit">إرسال
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </form>
    </div>
    <div class="col-lg-6">
        <div class="contact-information mb-30">
            <h2 class="mt-n2">{{$branch->name_ar}}</h2>
            <h3 class="mt-n2">نحن هنا لخدمتك ، تواصل معنا فى أي وقت</h3>

            <h3 class="h4 pt-2 mb-10">مواعيد العمل</h3>
            <p>{{$branch->description_ar}}</p>

            <h4 class="pt-2 mb-10">{{__('front.address')}}</h4>
            <p class="fs-md"><i class="far fa-map-marker-alt me-2"></i>{{$branch->address_ar}}</p>

            <h4 class="pt-2 mb-10">{{__('front.email')}}</h4>
            <p class="fs-md"><i class="fal fa-envelope fa-sm me-2"></i>{{$email->value}}</p>
        </div>
        <h4 class="pt-2 mb-2">{{__('front.customer_service')}}</h4>
        <h4 class="h3 font-theme2 mb-0">
            <i class="far fa-phone-alt me-2"></i>{{$phone->value}} |
            <i></i>{{$phone2->value}}
        </h4>
    </div>
    <div class="ratio ratio-21x9 contact-map mt-70 mb-30">
        {!!$branch->map!!}
    </div>
</div>
</div>

</div>
</section>
@stop