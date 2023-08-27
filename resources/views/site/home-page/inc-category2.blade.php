<section class="vs-service-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="section-title">
                        <h2 class="h1">Our Services</h2>
                        <p>Proactively revolutionize granular customer service after pandemic internal or "organic"
                            sources proactive human capital rather.</p>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel wow fadeIn" data-wow-delay="0.3s" data-slide-show="3">
                @foreach ($services as $service)
                <div class="col-xl-4 mb-25">
                    <div class="service-box">
                        <div class="sr-img"><img src="{{asset('images/'.$service->photo)}}" alt="Service Image" class="w-100">
                        </div>
                        <div class="sr-icon"><i class="flaticon-computer-mouse"></i></div>
                        <div class="sr-content">
                            <h3 class="h4"><a class="text-reset" href="service.html">
                            {{$service->name}}
                        </a></h3>
                            <p class="fs-xs">
                            {!!$service->description!!}
                            </p>
                        </div><a href="service.html" class="icon-btn style4"><i
                                class="far fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>