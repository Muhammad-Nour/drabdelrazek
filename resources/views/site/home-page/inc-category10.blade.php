<div class="breadcumb-wrapper">
    <div class="parallax" data-parallax-image="{{asset('design-site/img/breadcurmb/breadcurmb-1-1.jpg')}}"></div>
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{__('front.meettings')}}</h1>
            <div class="breadcumb-menu-wrap"><i class="far fa-home-lg"></i>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">{{__('front.home')}}</a></li>
                    <li class="active">{{__('front.meettings')}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="vs-blog-wrapper space-top space-md-bottom">
    <div class="container">

        <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.3s" data-slide-show="3" data-lg-slide-show="2">
            @foreach($meettings as $meetting)
            <div class="col-xl-4">
                <div class="vs-blog blog-card">
                    <div class="blog-img">
                        <img src="{{asset('images/'.$meetting->photo)}}"
                        alt="video Image" class="w-100">
                        <a href="{{$meetting->video}}"
                            class="popup-video play-btn style2 position-center">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title h5 font-body lh-base">
                            {{$meetting->title}}
                        </h3>

                        <p>
                            {{$meetting->description}}
                        </p>
                     </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>