
<section class="vs-blog-wrapper space-top space-md-bottom pt-0 inc-meetings">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="section-title">
                    <h2 class="h1">اللقاءات</h2>
                </div>
            </div>
        </div>
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

                        <div class="des">
                            {{$meetting->description}}
                        </div>
                     </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
