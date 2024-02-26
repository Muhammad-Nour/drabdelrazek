@extends('site.layouts.app')

@section('title', __('front.meettings'))

@section('banner_title', __('front.meettings') )

@section('css')
@stop

@section('js')
@stop

@section('content')


@include('site.inc-banner')

<section class="vs-blog-wrapper space-top space-md-bottom pt-70">
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
