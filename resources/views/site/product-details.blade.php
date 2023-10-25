@extends('site.layouts.app')

@section('title', __('front.products'))

@section('css')
@stop

@section('js')
@stop

@section('content')
<div class="product-details">
<!-- Single Product-->
<section class="section section-sm section-first bg-default">
    <div class="container">
      <div class="row row-50">
        <div class="col-lg-7 cl">
          <div class="product-image">
            <img src="{{ asset('design-site/site/images/'.$product->photo) }}" alt="{{ $product->{'name_'.app()->getLocale()} }}">
          </div>
        </div>
        <div class="col-lg-5 cl">
          <div class="single-product">
            <h4>{{ $product->{'name_'.app()->getLocale()} }}</h4>
            <div class="group-md group-middle">
              <div class="single-product-price">{{ number_format($product->price,2) .' '. __('front.sar') }}</div>
            </div>
            <div class="divider divider-30"></div>

            <div class="group-sm group-middle">
              <div class="product-stepper">
                <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000">
              </div>
              <div><a class="button button-primary button-pipaluk" href="#">{{ __('front.addto_card') }}</a></div>
            </div>
            <div class="divider divider-40"></div>
            <div class="group-md group-middle"><span class="social-title">{{ __('front.share') }}</span>
              <div>
                <ul class="list-inline list-inline-sm social-list">
                  <li><a class="icon fa fa-facebook" href="#"></a></li>
                  <li><a class="icon fa fa-twitter" href="#"></a></li>
                  <li><a class="icon fa fa-google-plus" href="#"></a></li>
                  <li><a class="icon fa fa-instagram" href="#"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Bootstrap tabs-->
      <div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs-5">
        <!-- Nav tabs-->
        <ul class="nav nav-tabs">
          <li class="nav-item" role="presentation"><a class="nav-link active" href="#description" data-toggle="tab">{{ __('front.description') }}</a></li>
          <li class="nav-item" role="presentation"><a class="nav-link" href="#details" data-toggle="tab">{{ __('front.details') }}</a></li>
        </ul>
        <!-- Tab panes-->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="description">
            {!! $product->{'description_'.app()->getLocale()} !!}
          </div>
          <div class="tab-pane fade" id="details">
            {!! $product->{'details_'.app()->getLocale()} !!}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--Designs-->
  <section class="section section-sm bg-default">
    <div class="container">
      <div class="oh">
        <div class="title-decoration-lines wow slideInUp" data-wow-delay="0s">
          <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">{{ __('front.designs') }}</span></h3>
        </div>
      </div>
      <div class="row row-30" data-lightgallery="group">
        @foreach($product->galleries as $gallery)
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
  <!-- Single Product-->
  <section class="section section-sm section-last bg-default">
    <div class="container">
      <h4>{{ __('front.related_products') }}</h4>
      <div class="row row-40">
        @foreach($category->products as $relproduct)
        @if($relproduct->id != $product->id)
        <div class="col-sm-6 col-md-5 col-lg-3 cl">
          <!-- Product-->
          <article class="product">
            <div class="product-figure"><img src="{{ asset('design-site/site/images/'.$relproduct->photo) }}" alt="{{ $relproduct->{'name_'.app()->getLocale()} }}" width="270" height="280"/>
              <div class="product-button"><a class="button button-md button-white button-ujarak" href="{{ route('front.productDetails',$relproduct->id) }}">{{ __('front.addto_card') }}</a></div>
            </div>
            <h6 class="product-title"><a  href="{{ route('front.productDetails',$relproduct->id) }}" title="{{ $relproduct->{'name_'.app()->getLocale()} }}">{{ $relproduct->{'name_'.app()->getLocale()} }}</a></h6>
            <div class="product-price-wrap">
              <div class="product-price">{{ number_format($relproduct->price, 2) .' '. __('front.sar') }}</div>
            </div>
          </article>
        </div>
        @endif
        @endforeach
      </div>
    </div>
  </section>
</div>
@stop
