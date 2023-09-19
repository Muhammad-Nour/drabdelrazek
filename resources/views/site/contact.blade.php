<?php
use App\Models\Custom;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Blog;

$about   = Custom::select('id','photo', 'description_'.app()->getLocale().' as description')->where('code', 'about')->first();
$address = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code','address')->first();
$phone    = Setting::where('code', 'phone')->first();
$facebook = Setting::where('code', 'facebook')->first();
$LinkedIn = Setting::where('code', 'LinkedIn')->first();
$WhatsApp = Setting::where('code', 'WhatsApp')->first();

$secret1 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret1')->first();
$secret2 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret2')->first();
$secret3 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret3')->first();
$secrets_video = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secrets_video')->first();
$secrets_photo = Custom::select('id','photo')->where('code', 'secrets_photo')->first();

$dr_name = Custom::where('code', 'dr_name')->first();
$bio = Custom::where('code', 'bio')->first();

?>
    @extends('site.layouts.app')

    @section('title', __('front.aboutus'))

    @section('css')
    @stop

    @section('js')
    @stop

    @section('content')
    <div class="breadcumb-wrapper">
        <div class="parallax" data-parallax-image="{{asset('design-site/img/breadcurmb/breadcurmb-1-1.jpg')}}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Contact Us</h1>
                <div class="breadcumb-menu-wrap"><i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="vs-contact-wrapper vs-contact-layout1 space-top space-md-bottom">
        <div class="container">
            <div class="row gx-60 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <form action="https://html.vecurosoft.com/medixi/demo/mail.php" method="POST"
                        class="ajax-contact form-wrap3 mb-30" data-bg-color="#f3f6f7">
                        <div class="form-title">
                            <h3 class="mt-n2 fls-n2 mb-0">Send Us a Message</h3>
                            <p class="text-theme mb-4">Your email address will not be published*</p>
                        </div>
                        <div class="form-group mb-15"><input type="text" class="form-control style3"
                                name="name" id="name" placeholder="Name"> <i class="fal fa-user"></i></div>
                        <div class="form-group mb-15"><input type="text" class="form-control style3"
                                name="email" id="email" placeholder="E-mail"> <i class="fal fa-envelope"></i>
                        </div>
                        <div class="form-group mb-15">
                            <textarea name="message" id="message" cols="30" rows="3" class="form-control style3"
                                placeholder="Message"></textarea> <i class="fal fa-pencil-alt"></i>
                        </div>
                        <div class="form-btn pt-15"><button class="vs-btn style2">Send Message<i
                                    class="fas fa-chevron-right"></i></button></div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="contact-information mb-30">
                        <h2 class="mt-n2">We are here for help you! Arrange a meeting.</h2>
                        <div class="row">
                            <div class="col-xxl-10">
                                <p>Holisticly engage inexpensive architectures via high-quality solutions. Efficiently
                                    implement synergistic applications vis-a-vis best-of-breed ecommerce onotonectally
                                    enable client-based portals</p>
                            </div>
                        </div>
                        <h3 class="h4 pt-2 mb-10">{{__('front.appointments')}}</h3>
                       	<p>{{$appointment1->description}}</p>
                       	<p>{{$appointment2->description}}</p>
                       	<p>{{$appointment3->description}}</p>
                        <h4 class="pt-2 mb-10">{{__('front.address')}}</h4>
                        <p class="fs-md">
                        	<i class="far fa-map-marker-alt me-2"></i>
                        	{{$address->description}}
                        </p>
                        <h4 class="pt-2 mb-2">{{__('front.customer_service')}}</h4>
                        <h4 class="h3 font-theme2 mb-0"><a href="tel:880369525423"><i
                                    class="far fa-phone-alt me-2"></i>{{$phone->value}}</a></h4>
                    </div>
                </div>
            </div>
            <div class="ratio ratio-21x9 contact-map mt-70 mb-30"><iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.1583088354!2d-74.11976389828038!3d40.697663748695746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1615903229405!5m2!1sen!2sbd"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
 @stop