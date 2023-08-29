<?php
use App\Models\Service;
use App\Models\Custom;

$appointment1 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code','appointment1')->first();

$appointment2 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code','appointment2')->first();

$appointment3 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code','appointment3')->first();

$services = Service::select('id','photo', 'title_'.app()->getLocale().' as name','description_'.app()->getLocale().' as description')->get();

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
                            <a href="{{$facebook->value}}"><i class="fab fa-facebook-f"></i></a> 
                            <a href="{{$WhatsApp->value}}"><i class="fab fa-whatsapp"></i></a> 
                            <a href="{{$WhatsApp->value}}"><i class="far fa-basketball-ball"></i></a> 
                            <a href="{{$LinkedIn->value}}"><i class="fab fa-linkedin-in"></i></a>
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
                            <h3 class="widget_title">About Us</h3>
                            <div class="vs-widget-about">
                                {!!$about->description!!}
                                <h4><a class="text-theme hover-white" href="tel:693232512456">
                                    <i class="fas fa-phone-volume me-2 pe-1">
                                    </i> {{$phone->value}}</a></h4>
                                    <div class="d-flex mt-3 pt-1">
                                        <div class="avater-small mr-20">
                                            <img src="{{asset('design-site/img/author/author-2-3.jpg')}}" alt="Avater Image">
                                        </div>
                                            <div class="media-body align-self-center">
                                                <h5 class="mb-0 font-body lh-1 text-white">Dr. David Smith</h5><span
                                                class="text-theme fs-xs lh-1">Senior Consultant</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-auto col-xl-auto">
                                <div class="widget footer-widget widget_nav_menu">
                                    <h3 class="widget_title">Services</h3>
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
                                        <p>{{$appointment1->description}}</p>
                                        <p>{{$appointment2->description}}</p>
                                        <p>{{$appointment3->description}}</p>
                                    <div class="address-line">
                                        <i class="far fa-map-marker-alt text-theme fs-md"></i> 
                                        <a href="#"class="text-reset fs-md"></a>
                                        {{$address->description}}
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright bg-theme">
                        <div class="container">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto text-center text-md-end">
                                    <p class="mb-0 text-white">Copyright <i class="fal fa-copyright"></i> 2023 <a class="text-white"
                                        href="index.html">Medixi</a>. All rights reserved by <a class="text-white"
                                        href="https://themeforest.net/user/vecuro_themes">Vecuro</a>.</p>
                                    </div>
                                    <div class="col-auto d-none d-md-block">
                                        <ul class="footer-bottom-menu">
                                            <li><a href="#">Privacy</a></li>
                                            <li><a href="#">Terms</a></li>
                                            <li><a href="#">Contact</a></li>
                                            <li><a href="#">About</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>