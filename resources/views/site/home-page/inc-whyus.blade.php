<section class="appointment-wrapper space-top space-md-bottom">
<div class="container">
<div class="row">
<div class="col-xl-6 mb-30 cl">
    <div class="about-content">
        <h2 class="h1 mb-3">لماذا نحن</h2>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <ul class="vs-list list-unstyled text-title">
                    @foreach($questions as $question)
                    <li style="font-size: 17px;font-weight: 500;" class="wow fadeInUp">
                        {!! $question->description !!}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-6 mb-30 pt-30 pt-xl-0">
    <form action="{{route('appointment.store')}}"
    method="get" class="form-wrap1 bg-white wow fadeInUp" data-wow-delay="0.3s">
    <div class="form-title-box bg-title">
        <div class="row justify-content-between align-items-center">
            <div class="col-auto">
                <h2 class="h4 mb-1 text-white">إحجز موعدك</h2>
            </div>
            <div class="col-auto d-none d-sm-block">
                <a class="ripple-icon style2">
                    <i class="fas fa-phone"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="form-box">
        <div class="row">

            @if (session('msg'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{session('msg')}}
            </div>
            @endif

            <div class="col-xl-6 form-group">
                <input name="name" type="text" placeholder="الإسم" required value="{{old('name')}}"
                class="form-control {{ $errors->first('name') ? 'border-red' : 'style2' }}" >
                <i class="fal small fa-user"></i>
                @if ($errors->first('name'))
                <p class="text-center"><span class="form-error"> {{ $errors->first('name') }}</span></p>
                @endif
            </div>
            <div class="col-xl-6 form-group">
                <input name="phone" type="number" placeholder="رقم الموبايل" required value="{{old('phone')}}"
                class="form-control {{ $errors->first('phone') ? 'border-red' : 'style2' }}">
                <i class="fal small fa-phone"></i>
                @if ($errors->first('phone'))
                <p class="text-center"><span class="form-error"> {{ $errors->first('phone') }}</span></p>
                @endif
            </div>

            <div class="col-xl-6 form-group">
                <select name="country_id" class="style2 form-select country-select" required data-url="{{ route('state.country') }}">
                        <option value="">{{ __('site.select') }}</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ (request()->country_id == $country->id) ? 'selected' : '' }} >{{ $country->{'name_'.app()->getLocale()} }}</option>
                        @endforeach
                   </select>
                @if ($errors->first('country'))
                <p class="text-center"><span class="form-error"> {{ $errors->first('country') }}</span></p>
                @endif
            </div>

            <div class="col-xl-6 form-group">
                <select name="state_id" class="style2 form-select state-select">
                    <option value="">{{ __('site.select') }}</option>
                </select>
                @if ($errors->first('state'))
                <p class="text-center"><span class="form-error"> {{ $errors->first('state') }}</span></p>
                @endif
            </div>

            <div class="col-xl-6 form-group">
                <input name="city" type="text" placeholder="المدينة| إختياري" value="{{old('city')}}"
                class="form-control {{ $errors->first('city') ? 'border-red' : 'style2' }}">
                <i class="fal small fa-solid fa-city"></i>
                @if ($errors->first('city'))
                <p class="text-center"><span class="form-error"> {{ $errors->first('city') }}</span></p>
                @endif
            </div>
            <div class="col-xl-6 form-group">
                <input name="height" type="text" placeholder="الطول | إختياري" value="{{old('height')}}"
                class="form-control {{ $errors->first('height') ? 'border-red' : 'style2' }}" >
                <i class="fal small fa-solid fa-line-height"></i>
                @if ($errors->first('height'))
                <p class="text-center"><span class="form-error"> {{ $errors->first('height') }}</span></p>
                @endif
            </div>
            <div class="col-xl-6 form-group">
                <input name="weight" type="text" placeholder="الوزن | إختياري" value="{{old('weight')}}"
                class="form-control {{ $errors->first('weight') ? 'border-red' : 'style2' }}" >
                <i class="fal small fa-solid fa-line-height"></i>
                @if ($errors->first('weight'))
                <p class="text-center"><span class="form-error"> {{ $errors->first('weight') }}</span></p>
                @endif
            </div>
            <div class="col-xl-12 text-center">
                <button type="submit" class="vs-btn style2">إحجز الآن<i class="far fa-calendar-alt"></i>
                </button>
            </div>
        </div>
    </div>
</form>
</div>

        </div>
    </div>
</section>
