@php
    use App\Models\Faq;
    $faqs = Faq::get();
@endphp
<section class="vs-service-wrapper space-top space-md-bottom pt-70 faqs">
    <div class="parallax" data-parallax-image="{{asset('images/bg/bg-8.jpg')}}"></div>
    <div class="container">
        <div class="vs-accordion accordion accordion-style2" id="vsaccordion">
            <div class="row">
                <div class="col-md-12 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="section-title">
                        <h2 class="h1 text-center">{{__('front.faqs')}}</h2>
                    </div>
                </div>
                @foreach ($faqs as $faq)
                <div class="col-md-6 cl">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button {{ ($loop->iteration == 1) ? '' : 'collapsed' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="true"
                                aria-controls="collapse{{ $loop->iteration }}">{{ $faq->{'title_'.app()->getLocale()} }}</button></h2>
                        <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse {{ ($loop->iteration == 1) ? 'show' : '' }}" data-bs-parent="#vsaccordion">
                            <div class="accordion-body">
                                {!! $faq->{'description_'.app()->getLocale()} !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
