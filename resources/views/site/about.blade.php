    @extends('site.layouts.app')

    @section('title', __('front.aboutus'))

    @section('banner_title', __('front.aboutus') )

    @section('css')
    @stop

    @section('js')
    @stop

    @section('content')

    @include('site.inc-banner')


    <section class="vs-about-wrapper space">
        <div class="parallax" data-parallax-image="{{asset('images/bg/bg-7.jpg')}}"></div>
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-6 mb-40 mb-lg-0 cl">
                    <div class="vs-surface wow" data-wow-delay="0.3s">
                        <div class="about-img3 position-relative">
                            <img src="{{asset('images/'.$about_video->photo)}}"
                            alt="About Image" class="w-100">
                            <a href="{!! $about_video->description !!}"
                                class="popup-video play-btn style2 position-center">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center cl">
                    <div class="row">
                        <div class="col-xl-10">
                            <h2 class="h1 mb-3"><span>{!! $dr_name->description_ar !!}</span>
                            </h2>
                        </div>
                        <div class="col-xl-10">
                            <p class="mb-4">{!! $about->description !!}</p>
                        </div>
                    </div>
                    <div class="media-style1">

                        <div class="media-body">
                            <h3 class="media-title">للتواصل و الإستفسارات</h3>
                            <p class="media-text">
                                <i class="fas fa-phone"></i>
                                <a>{{$phone->value}}</a>
                            </p>
                            <p class="media-text">
                                <i class="fas fa-phone"></i>
                                <a>{{$phone2->value}}</a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('site.home-page.inc-whyus')
</section>
</div>

@include('site.home-page.inc-faqs')

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
            <div class="d-none d-md-block bg-top-right position-absolute start-0 top-0 w-100 h-100"
            data-bg-src="{{asset('design-site/img/bg/testimonial-shape-1.png')}}"></div>
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
                    <div class="testimonail-quote">
                        <img src="{{asset('design-site/img/bg/quote-icon.png')}}" alt="quote">
                    </div>
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

<section class="vs-blog-wrapper space-top space-md-bottom pt-0">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="section-title">
                    <h2 class="h1">المقالات</h2>
                </div>
            </div>
        </div>
        <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.3s" data-slide-show="3" data-lg-slide-show="2">
            @foreach($blogs as $blog)
            <div class="col-xl-4">
                <div class="vs-blog blog-card">
                    <div class="blog-img"><img src="{{asset('images/'.$blog->photo)}}" alt="Blog Image" class="w-100">
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title h5 font-body lh-base">
                            <a href="{{route('front.blogdetails',$blog->id)}}">{{$blog->title}}</a>
                        </h3>
                        <!-- <div>{!!$blog->description!!}</div> -->
                         <a href="{{route('front.blogdetails',$blog->id)}}"class="link-btn">قراءة المزيد
                        <i class="far fa-long-arrow-right"></i>
                        </a>
                     </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </section>


</div>

@stop
