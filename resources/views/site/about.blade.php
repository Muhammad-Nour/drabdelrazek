<?php
use App\Models\Custom;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\Why_us;
use App\Models\Branch;

$about   = Custom::select('id','photo', 'description_'.app()->getLocale().' as description')->where('code', 'about')->first();
$address = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'address')->first();
$phone    = Setting::where('code', 'phone')->first();
$facebook = Setting::where('code', 'facebook')->first();
$instgram = Setting::where('code', 'instgram')->first();
$WhatsApp = Setting::where('code', 'WhatsApp')->first();

$branches = Branch::select('id', 'description_'.app()->getLocale().' as description',
            'name_'.app()->getLocale().' as name','address_'.app()->getLocale().' as address')->get();

$secret1 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret1')->first();
$secret2 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret2')->first();
$secret3 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret3')->first();

$secrets_video = Custom::select('id', 'description_'.app()->getLocale().' as description','photo')->where('code', 'secrets_video')->first();

$secrets_photo = Custom::select('id','photo')->where('code', 'secrets_photo')->first();

$testimonials = Testimonial::select('id','photo','name',
    'description_'.app()->getLocale().' as description','position_'.app()->getLocale().' as position')->get();

$blogs = Blog::select('id','photo','description_'.app()->getLocale().' as description','title_'.app()->getLocale().' as title')->get();

$phone2 = Setting::where('code', 'phone2')->first();

$dr_name = Custom::where('code', 'dr_name')->first();

$bio = Custom::where('code', 'bio')->first();

$questions = Why_us::select('id','description_'.app()->getLocale().' as description')->get();


?>

    @extends('site.layouts.app')

    @section('title', __('front.aboutus'))

    @section('css')
    @stop

    @section('js')
    @stop

    @section('content')

    <div class="about">
        <div class="breadcumb-wrapper">
            <div class="parallax" 
            data-parallax-image="{{asset('images/'.$about->photo)}}">
        </div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <div class="breadcumb-menu-wrap"><i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="{{route('home')}}">{{__('front.home')}}</a></li>
                        <li class="active">{{__('front.aboutus')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="vs-about-wrapper space">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-6 mb-40 mb-lg-0">
                    <div class="vs-surface wow" data-wow-delay="0.3s">
                        <div class="about-img3 position-relative">
                            <img src="{{asset('images/'.$secrets_video->photo)}}"
                            alt="About Image" class="w-100">
                            <a href="{{$secrets_video->description}}"
                                class="popup-video play-btn style2 position-center">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="row">
                        <div class="col-xl-10">
                            <h2 class="h1 mb-3"><span>{{$dr_name->description_ar}}</span>
                            </h2>
                        </div>
                        <div class="col-xl-10">
                            <p class="mb-4">{{$about->description}}</p>
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


    <div class="pb-30 pb-lg-0">
        <div class="parallax" data-parallax-image="assets/img/bg/bg-8.jpg"></div>
        <section class="vs-skill-wrapper">
            <div class="container">
                <div class="skill-wrap1 bg-white">
                    <div class="row justify-content-center justify-content-lg-between">
                        <div class="col-md-6 col-lg-auto mb-30">
                            <div class="d-xl-flex text-center text-xl-start skill-box"><span
                                class="ripple-icon hover-style2 align-self-start mb-20 mb-xl-0 mr-20"><i
                                class="flaticon-discuss"></i></span>
                                <div class="media-body">
                                    <h2 class="mt-n2 mb-0 text-theme">30+</h2>
                                    <p class="text-title fs-md fw-medium mt-1 mt-xl-0 mb-2 mb-xl-2">Years Of Experience
                                    </p>
                                    <p class="fs-xs mb-0">Incubate extensive scenarios without top-line quality vectors.
                                    Authoritatively engage</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-auto mb-30">
                            <div class="d-xl-flex text-center text-xl-start skill-box"><span
                                class="ripple-icon hover-style2 align-self-start mb-20 mb-xl-0 mr-20"><i
                                class="flaticon-medical-equipment"></i></span>
                                <div class="media-body">
                                    <h2 class="mt-n2 mb-0 text-theme">100+</h2>
                                    <p class="text-title fs-md fw-medium mt-1 mt-xl-0 mb-2 mb-xl-2">Experienced Doctor's
                                    </p>
                                    <p class="fs-xs mb-0">Incubate extensive scenarios without top-line quality vectors.
                                    Authoritatively engage</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-auto mb-30">
                            <div class="d-xl-flex text-center text-xl-start skill-box"><span
                                class="ripple-icon hover-style2 align-self-start mb-20 mb-xl-0 mr-20"><i
                                class="flaticon-healthcare"></i></span>
                                <div class="media-body">
                                    <h2 class="mt-n2 mb-0 text-theme">200+</h2>
                                    <p class="text-title fs-md fw-medium mt-1 mt-xl-0 mb-2 mb-xl-2">Happy Patients</p>
                                    <p class="fs-xs mb-0">Incubate extensive scenarios without top-line quality vectors.
                                    Authoritatively engage</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="vs-accordion-wrapper space-top space-md-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 mb-30 mb-xl-0">
                        <div class="about-content">
                    <h2 class="h1 mb-3">لماذا نحن</h2>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <ul class="vs-list list-unstyled text-title">
                                @foreach($questions as $question)
                                <li style="font-size: 17px;font-weight: 500;">
                                    {{$question->description}}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-xl-6">
                    <div class="vs-accordion accordion accordion-style2" id="vsaccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header"><button class="accordion-button" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true"
                                aria-controls="collapse1">Uniquely optimize reliable models before wireless
                            results ofessionally impact progressive core.</button></h2>
                            <div id="collapse1" class="accordion-collapse collapse show"
                            data-bs-parent="#vsaccordion">
                            <div class="accordion-body">
                                <p>Professionally impact distributed data via value-added experiences. Proacti
                                    incentivize 24/365 applications whereas turnkey total linkage. whiteboard
                                multifunctional channels with interoperable value.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false"
                            aria-controls="collapse2">Lorem ipsum is placeholder text commonly used in the
                        graphic, print, and publishing industries for</button></h2>
                        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#vsaccordion">
                            <div class="accordion-body">
                                <p>Professionally impact distributed data via value-added experiences. Proacti
                                    incentivize 24/365 applications whereas turnkey total linkage. whiteboard
                                multifunctional channels with interoperable value.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false"
                            aria-controls="collapse3">From its medieval origins to the digital era, learn
                        everything there is to know about the ubiquitous</button></h2>
                        <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#vsaccordion">
                            <div class="accordion-body">
                                <p>Professionally impact distributed data via value-added experiences. Proacti
                                    incentivize 24/365 applications whereas turnkey total linkage. whiteboard
                                multifunctional channels with interoperable value.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<section class="testimonial-wrapper space-top space-md-bottom">
    <div class="parallax" data-parallax-image="{{asset('design-site/img/bg/bg-shape-6.jpg')}}"></div>
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="section-title">
                    <div class="sec-icon"><i class="flaticon-ecg"></i></div>
                    <h2 class="h1">{{__('front.testimonial')}}</h2>
                </div>
            </div>
        </div>
        <div class="position-relative">
            <div class="d-none d-md-block bg-top-right position-absolute start-0 top-0 w-100 h-100"
            data-bg-src="{{asset('design-site/img/bg/testimonial-shape-1.png')}}"></div>
            <div class="row gx-30 mb-30 mb-lg-0">
                <div class="col-md-5 col-lg-4 col-xl-3 z-index-common">
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
            <div class="col-md-7 col-lg-8 col-xl-8 align-self-center">
                <div class="pl-30 no-pl-md mt-2 mt-md-0 position-relative">
                    <div class="testimonail-quote">
                        <img src="{{asset('design-site/img/bg/quote-icon.png')}}" alt="quote">
                    </div>
                    <div class="vs-carousel testimonail-desc-slide text-center text-md-start" data-dots="true"
                    data-slide-show="1" data-md-slide-show="1" data-asnavfor=".avater-slider-box">
                    @foreach($testimonials as $testimonial)
                    <div class="testimonail-desc">
                        <div class="testi-rating">
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span
                                style="width:100%">Rated <strong class="rating">5.00</strong> out of
                            5</span></div>
                        </div>
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
<section class="vs-blog-wrapper space-md-bottom space-top">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="section-title">
                    <div class="sec-icon"><i class="flaticon-ecg"></i></div>
                    <h2 class="h1">{{__('front.blog')}}</h2>
                </div>
            </div>
        </div>
        <div class="row vs-carousel wow fadeIn" data-wow-delay="0.3s" data-slide-show="3" data-lg-slide-show="2">
            @foreach($blogs as $blog)
        <div class="col-xl-4">
            <div class="vs-blog blog-card">
                <div class="blog-img"><img src="{{asset('images/'.$blog->photo)}}" alt="Blog Image" class="w-100">
                </div>
                <div class="blog-content">
                    <h3 class="blog-title h5 font-body lh-base">
                    <a href="blog.html">{!!$blog->title!!}
                    </a>
                    </h3>
                    <a href="blog.html" class="link-btn">Read More
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
