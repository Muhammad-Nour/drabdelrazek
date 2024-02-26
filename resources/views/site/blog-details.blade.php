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
