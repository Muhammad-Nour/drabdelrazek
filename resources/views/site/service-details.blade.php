@extends('site.layouts.app')

@section('title', __('front.project_name'))

@section('banner_title', $service->{'title_'.app()->getLocale()} )

@section('css')
@stop

@section('js')
@stop

@section('content')

@include('site.inc-banner')

<section class="vs-service-wrapper space-top space-md-bottom pt-70 service-detils">
    <div class="container">
        <div class="row">
            <div class="col-md-8 cl">
                <div class="service-content mb-30">
                    <div class="vs-surface wow" data-wow-delay="0.3s"><img src="{{asset('images/'.$service->photo)}}" alt="{{ $service->{'title_'.app()->getLocale()} }}" class="w-100"></div>
                </div>
            </div>
            <div class="col-md-10 cl">
                <div class="fs-md text-title mb-4 pb-2">
                    {!!$service->{'description_'.app()->getLocale()}!!}
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($instructions as $instruction)
            <div class="col-md-6">
                <h5>{{ $instruction->{'title_'.app()->getLocale()} }}</h5>
                <div>
                    {!! $instruction->{'description_'.app()->getLocale()} !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@stop
