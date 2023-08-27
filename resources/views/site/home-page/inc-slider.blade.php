<section class="vs-hero-wrapper position-relative">
        <div class="vs-hero-carousel" data-navprevnext="true" data-height="800" data-container="1900"
            data-slidertype="responsive">
           @foreach ($sliders as $slider)
            <div class="ls-slide" data-ls="duration: 13000; transition2d: 5;">
                <img src="{{asset('images/'.$slider->photo)}}"
                    alt="Hero Image" class="ls-bg">
                <h1 class="text-title ls-l ls-responsive" data-ls-mobile="left: 100px; top: 120px; font-size: 120px;"
                    data-ls-tablet="left: 100px; top: 80px; font-size: 92px;"
                    data-ls-laptop="left: 100px; top: 120px; font-size: 82px;"
                    style="left: 335px; top: 208px; font-size: 72px; font-weight: 700;"
                    data-ls="delayin: 600; easingin: easeInOutSine; texttransitionin: true; textstartatin: transitioninstart; textdurationin: 2000; texttypein: words_asc; textshiftin: 200; textoffsetyin: -100; offsetyout: -100; durationout: 2000; ">
                    {{$slider->name}}</h1>
                <p class="ls-l text-white ls-responsive ls-hide-sm" data-ls-mobile="left: 100px; "
                    data-ls-tablet=" left: 100px; top: 360px; font-size: 34px; width: 1000px; line-height: 52px;"
                    data-ls-laptop="left: 100px; top: 380px; font-size: 26px; width: 800px; line-height: 48px;"
                    style="left: 335px; top: 400px; width: 605px; font-size: 16px; font-weight: 400; white-space: normal; letter-spacing: 0.02em; line-height: 28px;"
                    data-ls="delayin: 800; texttransitionin: true; textstartatin: transitioninstart; texttypein: lines_asc; textshiftin: 100; textoffsetyin: 100; textdurationin: 2000; offsetyout: 100; durationout: 2000; ">
                    {!! $slider->description !!}
                </p>
            </div>
            @endforeach
          
        </div>
    </section>