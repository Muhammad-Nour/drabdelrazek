<?php
use App\Models\Service;
use App\Models\Custom;
use App\Models\Setting;
use App\Models\Branch;

$branches = Branch::select('id','name_'.app()->getLocale().' as name','description_'.app()->getLocale().' as description')->get();
$services = Service::select('id','photo','title_'.app()->getLocale().' as name','description_'.app()->getLocale().' as description')->get();

$appointment1 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code','appointment1')->first();

$appointment2 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code','appointment2')->first();

$appointment3 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code','appointment3')->first();


$about = Custom::select('id','photo', 'description_'.app()->getLocale().' as description')->where('code', 'about')->first();
$phone = Setting::where('code', 'phone')->first();
$phone2 = Setting::where('code', 'phone2')->first();
        $email = Setting::where('code', 'email')->first();
        $address = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'address')->first();

        $dr_name = Custom::where('code', 'dr_name')->first();

        $facebook = Setting::where('code', 'facebook')->first();
        $instagram = Setting::where('code', 'instagram')->first();
        $WhatsApp = Setting::where('code', 'WhatsApp')->first();
        $tiktok = Setting::where('code', 'tiktok')->first();
        $youtube = Setting::where('code', 'youtube')->first();
?>
<footer class="footer-wrapper footer-layout1" data-bg-src="{{asset('design-site/img/bg/bg-shape-4.png')}}">
    <div class="container">
        <div class="footer-top">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-6 col-md-auto text-center text-sm-start">
                    <div class="footer1-logo">
                        <a href="index.html">
                            <img src="{{ asset('images/aman-etm2nan.png')}}" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-auto pt-20 pt-sm-0 pb-20 pb-sm-0 text-center text-sm-end">
                    <div class="footer-social">
                        <a href="{{$facebook->value}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://wa.me/{{ $WhatsApp->value }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a href="{{$instagram->value}}" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="{{$tiktok->value}}" target="_blank"><i class="fab fa-tiktok"></i></a>
                        <a href="{{$youtube->value}}" target="_blank"><i class="fab fa-youtube"></i></a>
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
                        <h3 class="widget_title">{{ __('front.aboutus') }} </h3>
                        <div class="vs-widget-about">
                            {!!$about->description!!}
                            <h4>
                                <a class="text-theme hover-white">
                                    <i class="fas fa-phone-volume me-2 pe-1"></i> {{$phone->value}}<br>
                                    <i class="fas fa-phone-volume me-2 pe-1"></i> {{$phone2->value}}
                                </a>
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-auto col-xl-auto">
                    <div class="widget footer-widget widget_nav_menu">
                        <h3 class="widget_title">{{ __('front.service') }}</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                @foreach($services as $service)
                                <li><a href="{{ route('front.serviceDetails',$service->id) }}">{{$service->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 col-xl-3">
                    <div class="widget footer-widget widget_nav_menu">
                        <h3 class="widget_title">{{__('site.branches')}}</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                @foreach($branches as $branch)
                                <li><a href="{{route('front.contact',$branch->id)}}">{{$branch->name}}</a></li>
                                @endforeach
                            </ul>
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
                    <p class="mb-0 text-white">
                        Copyright
                        <i class="fal fa-copyright"></i>
                        2023 . All rights reserved | Designed By
                        <a href="https://wa.me/+201151379295" target="_blanck">Future For Development</a> .</p>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <a href="https://wa.me/{{ $WhatsApp->value }}" target="_blank" class="btn-whatsapp-pulse btn-whatsapp-pulse-border">
        <i class="fab fa-whatsapp"></i>
    </a>

    <a href="#" class="scrollToTop scroll-bottom style2"><i class="fas fa-arrow-alt-up"></i></a>
