<section class="vs-hero-wrapper position-relative inc-slider">
        <div class="vs-hero-carousel" data-navprevnext="true" data-height="800" data-container="1900"
            data-slidertype="responsive">
           @foreach ($sliders as $slider)
            <div class="ls-slide" data-ls="duration: 13000; transition2d: 5;">
                <img src="{{asset('images/'.$slider->photo)}}"
                    alt="Hero Image" class="ls-bg">

            </div>
            @endforeach

        </div>
    </section>
