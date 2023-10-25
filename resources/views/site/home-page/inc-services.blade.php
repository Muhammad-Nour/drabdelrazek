<section class="vs-service-wrapper space-top space-md-bottom pt-70 services">
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="section-title">
                        <h2 class="h1">{{ __('front.service') }}</h2>

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
                            <h3 class="h4"><a class="text-reset" href="{{ route('front.serviceDetails',$service->id) }}">
                            {{$service->name}}
                        </a></h3>
                            <div class="des">
                            {!!$service->description!!}
                            </div>
                        </div><a href="{{ route('front.serviceDetails',$service->id) }}" class="icon-btn style4"><i
                                class="far fa-long-arrow-alt-left"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
