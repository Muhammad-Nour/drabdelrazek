<section class="vs-about-wrapper space">
        <div class="parallax" data-parallax-image="{{asset('design-site/img/bg/bg-7.jpg')}}"></div>
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-6 mb-40 mb-lg-0">
                    <div class="vs-surface wow" data-wow-delay="0.3s">
                        <div class="about-img3 position-relative">
                            <img src="{{asset('images/'.$secrets_photo->photo)}}"
                                alt="About Image" class="w-100"> 
                                <a href="{{$secrets_video->description}}"
                                class="popup-video play-btn style2 position-center">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-content mb-2">
                        <div class="row">
                            <div class="col-xl-10">
                                {!!$secret1->description!!}
                            </div>
                            <div class="col-xl-10">
                                <p class="mb-4">{{$secret2->description}}</p>
                            </div>
                        </div>
                        <div class="media-style1">
                            <div class="media-icon"><i class="fas fa-phone"></i></div>
                            <div class="media-body">
                                <h3 class="media-title">{{$secret3->description}}</h3>
                                <p class="media-text"><a href="tel:+4412345996">{{$phone->value}}</a></p>
                            </div>
                        </div><a href="about.html" class="vs-btn">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>