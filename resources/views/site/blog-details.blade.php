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

$secrets_video = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secrets_video')->first();

$phone2 = Setting::where('code', 'phone2')->first();

$dr_name = Custom::where('code', 'dr_name')->first();

$bio = Custom::where('code', 'bio')->first();

?>
@extends('site.layouts.app')

@section('title', $blog->title_ar)

@section('banner_title',$blog->title_ar )

@section('css')
@stop

@section('js')
@stop

@section('content')

@include('site.inc-banner')

    <section class="vs-blog-wrapper space-top space-md-bottom pt-70 blogs">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="vs-blog blog-single">
                        <div class="blog-img">
                            <img src="{{asset('images/'.$blog->photo)}}" alt="Blog Image">
                        </div>
                        <div class="blog-content">
                            <h2 class="blog-title h3"> {{$blog->title_ar}}</h2>
                            <p>{!!$blog->description_ar!!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
