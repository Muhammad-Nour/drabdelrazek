@extends('site.layouts.app')

@section('title', __('front.products'))

@section('css')
@stop

@section('js')
@stop

@section('content')

     <!-- Shop-->
     <section class="section section-xl bg-default products">
        <div class="container">
          <div class="row row-90 justify-content-center">
            <div class="col-lg-12 col-xl-12">

              <div class="row row-lg row-40">
                @foreach($products as $product)
                <div class="col-sm-6 col-md-3 cl">
                  <!-- Product-->
                  <article class="product">
                    <div class="product-figure"><img src="{{ asset('design-site/site/images/'.$product->photo) }}" alt="{{ $product->name }}" width="270" height="280"/>
                      <div class="product-button"><a class="button button-md button-white button-ujarak" href="{{ route('front.productDetails',$product->id) }}">{{ __('front.addto_card') }}</a></div>
                    </div>
                    <h6 class="product-title"><a href="{{ route('front.productDetails',$product->id) }}">{{ $product->name }}</a></h6>
                    <div class="product-price-wrap">
                      <div class="product-price">{{ $product->price .' '. __('front.sar') }}</div>
                    </div>
                  </article>
                </div>
                @endforeach
              </div>

            </div>

          </div>
        </div>
      </section>

@stop
