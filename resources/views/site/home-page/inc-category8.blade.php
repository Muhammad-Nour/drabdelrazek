    <div data-bg-src="assets/img/bg/bg-shape-8.jpg">
        <section class="vs-middle-box-wrapper space-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-6 mb-30 mb-lg-0">
                        <div class="vs-middle-box d-md-flex text-center text-md-start bg-theme">
                            <div class="media-icon mb-20 mb-md-0 mr-20"><img src="{{asset('design-site/img/icons/icon-1-1.png')}}"
                                alt="Icon"></div>
                                <div class="media-body align-self-center"><span class="text-white fs-xs">Health Services</span>
                                    <h4 class="text-white mb-0">Known the truth for Peace of Mind</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="vs-middle-box d-md-flex text-center text-md-start bg-title">
                                <div class="media-icon mb-20 mb-md-0 mr-20"><img src="{{asset('design-site/img/icon/icon-1-1-001.png')}}"
                                    alt="Icon"></div>
                                    <div class="media-body align-self-center"><span class="text-theme fs-xs">Professinal Consult</span>
                                        <h4 class="text-title mb-0 text-white">Medicine Suggestion for diseases</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="testimonial-wrapper space-bottom">
                    <div class="container">
                        <div class="row text-center justify-content-center">
                            <div class="col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="section-title">
                                    <h2 class="h1">{{__('front.testimonial')}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.3s" data-slide-show="3" data-lg-slide-show="2">
                            @foreach($testimonials as $testimonial)
                            <div class="testimonial-box mb-30 bg-white">
                                    <div class="content">
                                        <p class="fs-md">{{$testimonial->description}}</p>
                                    </div>
                                    <div class="author-img">
                                        <div class="avater-line"></div>
                                        <div class="avater"><img src="{{asset('images/'.$testimonial->photo)}}" alt="Blog Image" class="w-100"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>