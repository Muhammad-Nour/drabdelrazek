<section class="testimonial-wrapper pt-70 space-md-bottom">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="section-title">
                    <h2 class="h1">{{__('front.testimonial')}}</h2>
                </div>
            </div>
        </div>
        <div class="position-relative">
            <div class="row gx-30 mb-30 mb-lg-0">
                <div class="col-md-5 col-lg-4 col-xl-3 z-index-common cl">
                    <div class="avater-slider-box vs-carousel" data-slide-show="1" data-md-slide-show="1"
                    data-fade="true" data-asnavfor=".testimonail-desc-slide">
                    @foreach($testimonials as $testimonial)
                    <div class="avater-slider">
                        <div class="avater">
                            <img src="{{asset('images/'.$testimonial->photo)}}"
                            alt="Author Image">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-7 col-lg-8 col-xl-8 align-self-center cl">
                <div class="pl-30 no-pl-md mt-2 mt-md-0 position-relative">

                    <div class="vs-carousel testimonail-desc-slide text-center text-md-start" data-dots="true"
                    data-slide-show="1" data-md-slide-show="1" data-asnavfor=".avater-slider-box">
                    @foreach($testimonials as $testimonial)
                    <div class="testimonail-desc">

                        <p class="mb-0 testi-text">
                            {{$testimonial->description}}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
