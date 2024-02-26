@extends('site.layouts.app')

@section('title', __('front.contact'))

@section('banner_title', __('front.contact') )

@section('css')
@stop

@section('js')
@stop

@section('content')

@include('site.inc-banner')

<section class="vs-contact-wrapper vs-contact-layout1 space-top space-md-bottom pt-70 contact">
    <div class="container">
        <div class="row gx-60">

            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">

                <form action="{{route('message.store')}}" method="get"
                class="form-wrap3 mb-30" data-bg-color="#f3f6f7">
                @csrf
                <div class="form-title">
                    <h3 class="mt-n2 fls-n2 mb-0">إرسل لنا رسالتك </h3>
                    <p class="text-theme mb-4"> </p>
                    @if (session('msg'))
                    <div class="alert alert-success">
                        <button type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{session('msg')}}
                    </div>
                    @endif
                </div>
                <div class="form-group mb-15">
                    <input type="text" class="form-control {{ $errors->first('name') ? 'border-red' : 'style3' }}"
                    name="name" id="name" placeholder="الإسم" required value="{{old('name')}}">
                    <i class="fal fa-user"></i>
                    @if ($errors->first('name'))
                    <p class="text-center"><span class="form-error"> {{ $errors->first('name') }}</span></p>
                    @endif
                </div>
                <div class="form-group mb-15">
                    <input type="text" class="form-control {{ $errors->first('phone') ? 'border-red' : 'style3' }}"
                    name="phone" id="phone" placeholder="الموبايل" required value="{{old('phone')}}">
                    <i class="fal fa-mobile"></i>
                    @if ($errors->first('phone'))
                    <p class="text-center"><span class="form-error"> {{ $errors->first('phone') }}</span></p>
                    @endif
                </div>
                <div class="form-group mb-15">
                    <input type="email" class="form-control {{ $errors->first('email') ? 'border-red' : 'style3' }}"
                    name="email" id="email" placeholder="الإيميل" value="{{old('email')}}">
                    <i class="fal fa-envelope"></i>
                    @if ($errors->first('email'))
                    <p class="text-center"><span class="form-error"> {{ $errors->first('email') }}</span></p>
                    @endif
                </div>
                <div class="form-group mb-15 ">
                    <textarea name="description" id="description" cols="30" rows="3"
                    class="form-control {{ $errors->first('description') ? 'text-border-red' : 'style3' }}"
                    required placeholder="الرسالة"> {{old('description')}}
                </textarea>
                <i class="fal fa-pencil-alt"></i>
                @if ($errors->first('description'))
                <p class="text-center"><span class="form-error"> {{ $errors->first('description') }}</span></p>
                @endif
            </div>
            <div class="form-btn pt-15">
                <button class="vs-btn style2" type="submit">إرسال
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </form>
    </div>
    <div class="col-lg-6">
        <div class="contact-information mb-30">
            <h3 class="mt-n2">فرع {{$branch->name_ar}}</h3>
            <div class="row">
                <div class="col-xxl-10">
                    <p>نحن هنا لخدمتك وللاجابة على استفساراتكم ، تواصل معنا فى أي وقت وسيتم الرد عليك فى اقرب وقت.</p>
                </div>
            </div>
            <h3 class="h4 pt-2 mb-10">مواعيد العمل</h3>
            <p>{{$branch->description_ar}}</p>

            <h4 class="pt-2 mb-10">{{__('front.address')}}</h4>
            <p class="fs-md"><i class="far fa-map-marker-alt me-2"></i>{{$branch->address_ar}}</p>

            <h4 class="pt-2 mb-10">{{__('front.email')}}</h4>
            <p class="fs-md"><i class="fal fa-envelope fa-sm me-2"></i>{{$email->value}}</p>
        </div>
        <h4 class="pt-2 mb-2">{{__('front.customer_service')}}</h4>
        <h4 class="h3 font-theme2 mb-0"> <a href="#">
            <i class="far fa-phone-alt me-2"></i>{{$phone->value}} |
            <i></i>{{$phone2->value}}</a>
        </h4>
    </div>
    <div class="ratio ratio-21x9 contact-map mt-70 mb-30">
        {!!$branch->map!!}
    </div>
</div>
</div>

</div>
</section>
@stop
