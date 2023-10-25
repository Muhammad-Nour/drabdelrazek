@extends('site.layouts.app')

@section('title', __('front.project_name'))

@section('css')
@stop

@section('js')
@stop

@section('content')

    @include('site.home-page.inc-slider')

    @include('site.home-page.inc-services')

    @include('site.home-page.inc-about')

    @include('site.home-page.inc-whyus')

    @include('site.home-page.inc-faqs')

    @include('site.home-page.inc-beforeAfter')

    @include('site.home-page.inc-testimonials')

    @include('site.home-page.inc-blogs')

    @include('site.home-page.inc-meettings')

@stop
