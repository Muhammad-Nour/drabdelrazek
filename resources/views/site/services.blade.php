@extends('site.layouts.app')

@section('title', __('front.project_name'))

@section('banner_title', $category->{'name_'.app()->getLocale()} )

@section('css')
@stop

@section('js')
@stop

@section('content')

@include('site.inc-banner')

<section class="vs-service-wrapper space-top space-md-bottom services pt-70">
    <div class="container">
        <div class="row wow fadeIn" data-wow-delay="0.3s" data-slide-show="3">
            @foreach ($services as $service)
            <div class="col-xl-4 mb-25 cl">
                <div class="service-box">
                    <div class="sr-img"><img src="{{asset('images/'.$service->photo)}}" alt="Service Image" class="w-100">
                    </div>
                    <div class="sr-icon"><i class="flaticon-stethoscope-1"></i></div>
                    <div class="sr-content">
                        <h3 class="h4"><a class="text-reset" href="{{ route('front.serviceDetails',$service->id) }}">
                        {{$service->name}}
                    </a></h3>
                        <div class="des">
                        {!!$service->description!!}
                        </div>
                    </div><a href="{{ route('front.serviceDetails',$service->id) }}" class="icon-btn style4"><i
                            class="far fa-long-arrow-alt-left"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@stop
