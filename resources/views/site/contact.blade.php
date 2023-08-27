@extends('site.layouts.app')

@section('title', __('front.contactus'))

@section('css')
@stop

@section('js')
@stop

@section('content')
<div class="contact">
 <!-- Contact information-->
 <section class="section section-sm section-first bg-default">
    <div class="container">
      <div class="row row-30 justify-content-center">
        <div class="col-sm-8 col-md-6 col-lg-4 cl">
          <article class="box-contacts">
            <div class="box-contacts-body">
              <div class="box-contacts-icon fl-bigmug-line-cellphone55"></div>
              <div class="box-contacts-decor"></div>
              <p class="box-contacts-link"><a href="tel:{{ $phone->value }}">{{ $phone->value }}</a></p>
              <p class="box-contacts-link"><a href="tel:{{ $phone2->value }}">{{ $phone2->value }}</a></p>
            </div>
          </article>
        </div>
        <div class="col-sm-8 col-md-6 col-lg-4 cl">
          <article class="box-contacts">
            <div class="box-contacts-body">
              <div class="box-contacts-icon fl-bigmug-line-up104"></div>
              <div class="box-contacts-decor"></div>
              <p class="box-contacts-link"><a href="#">{{ $address->description }}</a></p>
              <p class="box-contacts-link"><a href="#">{{ $address2->description }}</a></p>
            </div>
          </article>
        </div>
        <div class="col-sm-8 col-md-6 col-lg-4 cl">
          <article class="box-contacts">
            <div class="box-contacts-body">
              <div class="box-contacts-icon fl-bigmug-line-chat55"></div>
              <div class="box-contacts-decor"></div>
              <p class="box-contacts-link"><a href="mailto:{{ $email->value }}">{{ $email->value }}</a></p>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Form-->
  <section class="section section-sm section-last bg-default text-left">
    <div class="container">
      <article class="title-classic">
        <div class="title-classic-title">
          <h3>{{ __('front.Get_in_touch') }}</h3>
        </div>
        <div class="title-classic-text">
          <p>{{ __('front.send_us_message') }}</p>
        </div>
      </article>
      <form class="rd-form rd-form-variant-2 rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="../../../external.html?link=https://livedemo00.template-help.com/wt_prod-8852/theme/bat/rd-mailform.php">
        <div class="row row-14 gutters-14">
          <div class="col-md-4 cl">
            <div class="form-wrap">
              <input class="form-input" id="contact-your-name-2" type="text" name="name" data-constraints="@Required">
              <label class="form-label" for="contact-your-name-2">{{ __('front.name') }}</label>
            </div>
          </div>
          <div class="col-md-4 cl">
            <div class="form-wrap">
              <input class="form-input" id="contact-email-2" type="email" name="email" data-constraints="@Email @Required">
              <label class="form-label" for="contact-email-2">{{ __('front.email') }}</label>
            </div>
          </div>
          <div class="col-md-4 cl">
            <div class="form-wrap">
              <input class="form-input" id="contact-phone-2" type="text" name="phone" data-constraints="@Numeric">
              <label class="form-label" for="contact-phone-2">{{ __('front.phone') }}</label>
            </div>
          </div>
          <div class="col-12 cl">
            <div class="form-wrap">
              <label class="form-label" for="contact-message-2">{{ __('front.message') }}</label>
              <textarea class="form-input textarea-lg" id="contact-message-2" name="message" data-constraints="@Required"></textarea>
            </div>
          </div>
          <div class="col-md-12">
            <button class="button button-primary button-pipaluk" type="submit">{{ __('front.send_message') }}</button>
        </div>
        </div>


      </form>
    </div>
  </section>

  <section class="map-section">
  <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125197.92274992952!2d42.67026377654808!3d16.89773557115866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1607e2973d13a0bb%3A0x35737d6f29786cf2!2z2KzYp9iy2KfZhiDYp9mE2LPYudmI2K_Zitip!5e0!3m2!1sar!2seg!4v1688478141992!5m2!1sar!2seg"  height="500" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  </section>
</div>
@stop
