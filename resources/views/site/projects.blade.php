@extends('site.layouts.app')

@section('title', __('front.projects'))

@section('css')
@stop

@section('js')
@stop

@section('content')

<!-- Grid Gallery-->
<section class="section section-xl bg-default text-center projects">
    <div class="container isotope-wrap">

      <div class="row row-50 isotope" data-lightgallery="group">
        @foreach($projects as $project)
        <div class="col-md-6 col-lg-4 isotope-item cl" data-filter="Type 3">
          <!-- Thumbnail Modern-->
          <article class="thumbnail thumbnail-modern">
            <a class="thumbnail-modern-figure" href="{{ asset('design-site/site/images/'.$project->photo) }}" data-lightgallery="item">
                <img src="{{ asset('design-site/site/images/'.$project->photo) }}" alt="{{ $project->name }}" width="370" height="303"/></a>
            <div class="thumbnail-modern-caption">
              <h5 class="thumbnail-modern-title"><a href="{{ route('front.projectDetails', $project->id) }}">{{ $project->name }}</a></h5>
            </div>
          </article>
        </div>
        @endforeach
      </div>

    </div>
</section>

@stop
