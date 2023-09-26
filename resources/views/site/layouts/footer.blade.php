<?php
use App\Models\Service;
use App\Models\Custom;
use App\Models\Branch;

$branches = Branch::select('id','name_'.app()->getLocale().' as name','description_'.app()->getLocale().' as description')->get();

$services = Service::select('id','photo','title_'.app()->getLocale().' as name','description_'.app()->getLocale().' as description')->get();

?>
<footer class="footer-wrapper footer-layout1" data-bg-src="{{asset('design-site/img/bg/bg-shape-4.png')}}">
    <div class="container">
        <div class="footer-top">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-6 col-md-auto text-center text-sm-start">
                    <div class="footer1-logo bg-white">
                        <a href="index.html">
                            <img src="{{asset('design-site/img/logo.svg')}}"
                            alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-auto pt-20 pt-sm-0 pb-20 pb-sm-0 text-center text-sm-end">
                    <div class="footer-social">
                        <a href="{{$facebook->value}}" target="_blank"><i class="fab fa-facebook-f"></i></a> 
                        <a href="{{$instgram->value}}" target="_blank"><i class="fab fa-instagram"></i></a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-lg-3 col-xl-3">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">{{__('front.aboutus')}}</h3>
                        <div class="vs-widget-about">
                            <p>{{$about->description}}</p>
                            <h4>
                                <a class="text-theme hover-white">
                                    <i class="fas fa-phone-volume me-2 pe-1"></i> {{$phone->value}}<br>
                                    <i class="fas fa-phone-volume me-2 pe-1"></i> {{$phone2->value}}
                                </a>
                            </h4>
                            <div class="d-flex mt-3 pt-1">
                                <div class="avater-small mr-20">
                                    <img src="{{asset('images/slider/2.jpg')}}" alt="Avater Image">
                                </div>
                                <div class="media-body align-self-center">
                                    <h5 class="mb-0 font-body lh-1 text-white">
                                        {{$dr_name->description_ar}}
                                    </h5>
                                    <span class="text-theme fs-xs lh-1">
                                        {{$bio->description_ar}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-auto col-xl-auto">
                    <div class="widget footer-widget widget_nav_menu">
                        <h3 class="widget_title">{{__('front.services')}}</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                @foreach($services as $service)
                                <li><a href="#">{{$service->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-xl-3">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">{{__('front.appointments')}}</h3>
                        @foreach($branches as $branch)
                        <p>{{$branch->name}} | {{$branch->description}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright bg-theme">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto text-center text-md-end">
                    <p class="mb-0 text-white">
                        Copyright 
                        <i class="fal fa-copyright"></i> 
                        2023 . All rights reserved by 
                        <a href="https://wa.me/+201151379295" target="_blanck">Future For Development</a> .</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>