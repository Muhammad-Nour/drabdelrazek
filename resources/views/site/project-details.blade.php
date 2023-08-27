@extends('site.layouts.app')

@section('title', __('front.projects'))

@section('css')
@stop

@section('js')
@stop

@section('content')

<section class="section section-sm bg-default project-details">
    <div class="container">
      <div class="oh">
        <div class="title-decoration-lines wow slideInUp" data-wow-delay="0s">
          <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">{{ $project->{'name_'.app()->getLocale()} }}</span></h3>
        </div>
      </div>
      <div class="row row-30" data-lightgallery="group">
        @foreach($galleries as $gallery)
        <div class="col-sm-6 col-lg-4 cl">
          <div class="oh-desktop">
            <!-- Thumbnail Classic-->

            <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInLeft" data-wow-delay="0s">
              <div class="thumbnail-mary-figure"><img src="{{ asset('design-site/site/images/'.$gallery->photo) }}" alt="" width="370" height="303"/>
              </div>
              <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="{{ asset('design-site/site/images/'.$gallery->photo) }}" data-lightgallery="item">
                <img src="{{ asset('design-site/site/images/'.$gallery->photo) }}" alt="" width="370" height="303"/></a>
              </div>
            </article>

          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

@stop
