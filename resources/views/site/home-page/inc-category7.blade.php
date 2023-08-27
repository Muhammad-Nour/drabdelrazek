<section class="vs-project-wrapper position-relative space-top pb-50" data-bg-color="#f9f9f9">
    <div class="project-shape" data-bg-src="{{asset('design-site/img/bg/bg-shape-7.jpg')}}"></div>
    <div class="container z-index-common">
        <div class="row text-center justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="section-title">
                    <h2 class="h1 text-white">Latest Projects</h2>
                    <p class="text-white">Proactively revolutionize granular customer service after pandemic internal or "organic" sources proactive human capital rather.</p>
                </div>
            </div>
        </div>
        <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.3s" data-slide-show="3">
            @foreach($projects as $project)
            <div class="col-xl-4">
                <div class="vs-project-box mb-30">
                    <div class="project-img">
                        <img src="{{asset('images/'.$project->photo)}}" alt="Project Image"
                        class="w-100">
                    </div>
                    <div class="project-content">
                        <span class="project-cat fs-xs">{{$project->name}}</span>
                        <h4 class="project-name">{{$project->description}}</h4>
                        <a href="{{asset('images/'.$project->photo)}}"
                        class="icon-btn style4 popup-image"><i class="fal fa-eye"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>