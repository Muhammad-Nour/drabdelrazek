<div class="sidemenu-wrapper d-none d-lg-block">
        <div class="sidemenu-content"><button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget footer-widget">
                <div class="vs-widget-about">
                    <div class="footer-logo"><img src="{{asset('design-site/img/logo.svg')}}" alt="logo"></div>
                    <p class="footer-text1">Lorem ipsum dolor sit amet, consectet eiusmod tempor incididunt ut labore e
                        rem ipsum dolor sit amet. sum dolor sit amet, consectet eiusmod.</p>
                    <div class="footer-social3"><a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i
                                class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-google"></i></a> <a
                            href="#"><i class="fab fa-linkedin-in"></i></a></div>
                </div>
            </div>
            <div class="widget footer-widget">
                <h3 class="widget_title">Visiting Hours</h3>
                <div class="footer-table">
                    <table>
                        <tr>
                            <td>Mon - Fri:</td>
                            <td>8:00 am - 8:00 pm</td>
                        </tr>
                        <tr>
                            <td>Saturday:</td>
                            <td>9:00 am - 6:00 pm</td>
                        </tr>
                        <tr>
                            <td>Sunday:</td>
                            <td>9:00 am - 6:00 pm</td>
                        </tr>
                    </table>
                </div>
                <div class="address-line"><i class="far fa-map-marker-alt text-theme fs-md"></i> <a href="#"
                        class="text-reset fs-md">374 William S Canning Blvd, Fall River MA 2721</a></div>
            </div>
            <div class="widget footer-widget">
                <h4 class="widget_title">Gallery Posts</h4>
                <div class="footer-gallery">
                    <div class="gal-item"><a href="#"><img src="{{asset('design-site/img/widget/gal-1-1.jpg')}}" alt="Gallery Image"
                                class="w-100"></a></div>
                    <div class="gal-item"><a href="#"><img src="{{asset('design-site/img/widget/gal-1-2.jpg')}}" alt="Gallery Image"
                                class="w-100"></a></div>
                    <div class="gal-item"><a href="#"><img src="{{asset('design-site/img/widget/gal-1-3.jpg')}}" alt="Gallery Image"
                                class="w-100"></a></div>
                    <div class="gal-item"><a href="#"><img src="{{asset('design-site/img/widget/gal-1-4.jpg')}}" alt="Gallery Image"
                                class="w-100"></a></div>
                    <div class="gal-item"><a href="#"><img src="{{asset('design-site/img/widget/gal-1-5.jpg')}}" alt="Gallery Image"
                                class="w-100"></a></div>
                    <div class="gal-item"><a href="#"><img src="{{asset('design-site/img/widget/gal-1-6.jpg')}}" alt="Gallery Image"
                                class="w-100"></a></div>
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
                                    <a href="index.html">
                                        <img src="{{asset('design-site/img/logo.svg')}}"
                                            alt="Logo">
                                    </a>
                                </div>
                            </div>
                            <div class="col text-end text-lg-center">
                                <nav class="main-menu menu-style1 d-none d-lg-block">
                                    <ul>
                                        <li><a href="{{route('home')}}">Home</a></li>
                                        
                                        <li><a href="{{route('front.about')}}">About</a></li>
                                      
                                        <li class="menu-item-has-children"><a href="service.html">Services</a>
                                            <ul class="sub-menu">
                                                <li><a href="service.html">Services</a></li>
                                                <li><a href="service-details.html">Services Details</a></li>
                                            </ul>
                                        </li>
                                           
                                        <li><a href="{{route('front.blog')}}">Blog</a></li>

                                        <li class="menu-item-has-children"><a href="#">Contact</a>
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
                            <div class="col-auto gap-3 d-none d-lg-flex"><a href="#"
                                    class="icon-btn style3 searchBoxTggler"><i class="far fa-search"></i></a> <a
                                    href="#" class="icon-btn style3 sideMenuToggler"><i class="far fa-bars"></i></a>
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