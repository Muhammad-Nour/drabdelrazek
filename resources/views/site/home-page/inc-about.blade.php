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
                            <p class="mb-4">{!! $about->description !!} </p>
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
                    <a href="{{ route('front.about') }}" class="vs-btn">رؤية المزيد</a>
                </div>
            </div>
        </div>
    </section>
