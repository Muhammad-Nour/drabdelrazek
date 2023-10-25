<?php
    use App\Models\Custom;
    use App\Models\Setting;
    use App\Models\Branch;
    use App\Models\Category;

    $navCategories = Category::get();
    $about = Custom::select('id','photo', 'description_'.app()->getLocale().' as description')->where('code', 'about')->first();
    $address = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'address')->first();
    $phone = Setting::where('code', 'phone')->first();
    $phone2 = Setting::where('code', 'phone2')->first();
    $email = Setting::where('code', 'email')->first();
    $branches = Branch::select('id', 'description_'.app()->getLocale().' as description',
            'name_'.app()->getLocale().' as name','address_'.app()->getLocale().' as address')->get();

    $facebook = Setting::where('code', 'facebook')->first();
    $instagram = Setting::where('code', 'instagram')->first();
    $WhatsApp = Setting::where('code', 'WhatsApp')->first();
    $tiktok = Setting::where('code', 'tiktok')->first();
    $youtube = Setting::where('code', 'youtube')->first();
?>
<!--
<div class="preloader"><button class="vs-btn preloaderCls">Cancel Preloader</button>
    <div class="preloader-inner"><svg width="88px" height="108px" viewBox="0 0 54 64">
        <defs></defs>
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <path class="beat-loader"
            d="M0.5,38.5 L16,38.5 L19,25.5 L24.5,57.5 L31.5,7.5 L37.5,46.5 L43,38.5 L53.5,38.5" id="Path-2"
            stroke-width="2"></path>
        </g>
    </svg></div>
</div>
-->
<!-- Mobile navBar -->
<div class="vs-menu-wrapper">
    <div class="vs-menu-area text-center"><button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo"><a href="index.html"><img src="{{asset('images/logo.png')}}" alt="Medixi"></a></div>

        <div class="vs-mobile-menu">
            <ul>
                <li><a href="{{route('home')}}">{{ __('front.home') }}</a></li>
                <li><a href="{{route('front.about')}}">{{ __('front.aboutus') }}</a></li>
                <li class="menu-item-has-children"><a href="#">{{ __('front.service') }}</a>
                    <ul class="sub-menu">
                        @foreach ($navCategories as $navCategory)
                        <li><a href="{{ route('front.service',$navCategory->id) }}">{{ $navCategory->{'name_'.app()->getLocale()} }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{route('front.blog')}}">{{ __('front.blog') }}</a></li>
                <li><a href="{{route('front.projects')}}">{{ __('front.projects') }}</a></li>
                <li><a href="{{route('front.meettings')}}">{{ __('front.meettings') }}</a></li>
                <li><a href="{{route('front.BookAppointment')}}">{{ __('front.appointment') }}</a></li>
                <li class="menu-item-has-children"><a href="#">{{ __('front.contactus') }}</a>
                    <ul class="sub-menu">
                        @foreach ($branches as $branche)
                        <li><a href="{{route('front.contact',$branche->id)}}">{{$branche->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Mobile navBar -->

<div class="sidemenu-wrapper d-none d-lg-block">
        <div class="sidemenu-content"><button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget footer-widget">
                <div class="vs-widget-about">
                    <div class="footer-logo"><img src="{{asset('images/logo.png')}}" alt="logo"></div>
                    <div class="footer-text1">
                        {!!$about->description!!}
                    </div>
                    <div class="footer-social3">
                        <a href="{{$facebook->value}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://wa.me/{{ $WhatsApp->value }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a href="{{$instagram->value}}" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="{{$tiktok->value}}" target="_blank"><i class="fab fa-tiktok"></i></a>
                        <a href="{{$youtube->value}}" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="widget footer-widget">
                <h3 class="widget_title">{{ __('front.contactus') }}</h3>

                <div class="address-line">
                    <i class="far fa-phone text-theme fs-md"></i> <a href="#"
                        class="text-reset fs-md">{{ $phone->value }} - {{ $phone2->value }}</a>
                </div>
                <div class="address-line">
                    <i class="far fa-envelope text-theme fs-md"></i> <a href="#"
                        class="text-reset fs-md">{{ $email->value }}</a>
                </div>
            </div>

        </div>
    </div>
    <div class="popup-search-box d-none d-lg-block"><button class="searchClose border-theme text-theme"><i
                class="fal fa-times"></i></button>
        <form action="#"><input type="text" class="border-theme" placeholder="What are you looking for"> <button
                type="submit"><i class="fal fa-search"></i></button></form>
    </div>

<div class="sticky-wrap">
            <div class="sticky-active">
                <div class="header-main">
                    <div class="container container-style1 position-relative">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <div class="header1-logo py-2">
                                    <a href="{{route('home')}}">
                                        <img src="{{ asset('images/logo.png')}}" alt="Logo">
                                    </a>
                                </div>
                            </div>
                            <div class="col text-end text-lg-center">
                                <nav class="main-menu menu-style1 d-none d-lg-block">
                                    <ul>
                                        <li><a href="{{route('home')}}">{{ __('front.home') }}</a></li>

                                        <li><a href="{{route('front.about')}}">{{ __('front.aboutus') }}</a></li>

                                        <li class="menu-item-has-children"><a href="#">{{ __('front.service') }}</a>
                                            <ul class="sub-menu">
                                                @foreach ($navCategories as $navCategory)
                                                <li><a href="{{ route('front.service',$navCategory->id) }}">{{ $navCategory->{'name_'.app()->getLocale()} }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>

                                        <li><a href="{{route('front.blog')}}">{{ __('front.blog') }}</a></li>

                                        <li><a href="{{route('front.projects')}}">{{__('front.projects')}}</a></li>

                                        <li><a href="{{route('front.meettings')}}">{{__('front.meettings')}}</a></li>

                                        <li><a href="{{route('front.BookAppointment')}}">{{__('front.appointment')}}</a></li>

                                        <li class="menu-item-has-children"><a href="#">{{ __('front.contactus') }}</a>
                                            <ul class="sub-menu">
                                                @foreach($branches as $branch)
                                                <li><a href="{{route('front.contact',$branch->id)}}">
                                                    {{$branch->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </nav><button class="vs-menu-toggle d-inline-block d-lg-none"><i
                                        class="fas fa-bars"></i></button>
                            </div>
                            <div class="col-auto gap-3 d-none d-lg-flex">
                                <!-- <a href="#" class="icon-btn style3 searchBoxTggler"><i class="far fa-search"></i></a> -->
                                <a href="#" class="icon-btn style3 sideMenuToggler"><i class="far fa-bars"></i></a>
                            </div>
                            <div class="col-auto d-none-xxxl">
                                <div class="header-call phone-box d-flex align-items-center style2"><a
                                        href="tel:66925682596" class="box-icon"><i class="fas fa-phone-alt"></i></a>
                                    <div class="media-body"><span class="fs-xs text-title">Call Anytime</span>
                                        <p class="h4 fw-bold lh-1 mb-0"><a href="tel:66925682596">669 2568 2596</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
