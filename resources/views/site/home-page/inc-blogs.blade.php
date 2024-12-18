<section class="vs-blog-wrapper space-top space-md-bottom pt-0">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="section-title">
                    <h2 class="h1">المقالات</h2>
                </div>
            </div>
        </div>
        <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.3s" data-slide-show="3" data-lg-slide-show="2">
            @foreach($blogs as $blog)
            <div class="col-xl-4">
                <div class="vs-blog blog-card">
                    <div class="blog-img"><img src="{{asset('images/'.$blog->photo)}}" alt="Blog Image" class="w-100">
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title h5 font-body lh-base">
                            <a href="{{route('front.blogdetails',$blog->id)}}">{{$blog->title}}</a>
                        </h3>
                        <!-- <div>{!!$blog->description!!}</div> -->
                         <a href="{{route('front.blogdetails',$blog->id)}}"class="link-btn">قراءة المزيد
                        <i class="far fa-long-arrow-right"></i>
                        </a>
                     </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </section>
