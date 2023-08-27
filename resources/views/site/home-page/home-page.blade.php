@extends('site.layouts.app')

@section('title', __('front.project_name'))

@section('css')
@stop

@section('js')
@stop

@section('content')

    @include('site.home-page.inc-slider')

    @include('site.home-page.inc-category2')

    @include('site.home-page.inc-category3')

    @include('site.home-page.inc-category5')

    @include('site.home-page.inc-category6')

    @include('site.home-page.inc-category7')

    @include('site.home-page.inc-category8')

    @include('site.home-page.inc-category9')

@stop
