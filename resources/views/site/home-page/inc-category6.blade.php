<section class="appointment-wrapper space-top space-md-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 mb-30">
                <div class="about-content">
                    <h2 class="h1 mb-3">لماذا نحن</h2>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <ul class="vs-list list-unstyled text-title">
                                @foreach($questions as $question)
                                <li style="font-size: 17px;font-weight: 500;">
                                    {{$question->description}}
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
                                <a href="tel:{{$phone->value}}" class="ripple-icon style2">
                                    <i class="fas fa-phone"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                        <div class="form-box">
                            <div class="row">
                                <div class="col-xl-6 form-group">
                                    <input name="name" type="text" class="form-control style2" placeholder="الإسم">
                                    <i class="fal small fa-user"></i>
                                </div>
                                <div class="col-xl-6 form-group">
                                    <input name="phone" type="number" class="form-control style2"
                                    placeholder="رقم الموبايل"> 
                                    <i class="fal small fa-phone"></i>
                                </div>
                                <div class="col-xl-6 form-group">
                                    <input name="governorate" type="text" class="form-control style2" placeholder="المحافظة"> 
                                    <i class="fal small fa-solid fa-city"></i>
                                </div>
                                    <div class="col-xl-6 form-group">
                                        <input name="city" type="text" class="form-control style2"
                                        placeholder="المدينة"> 
                                        <i class="fal small fa-solid fa-city"></i>
                                    </div>
                                    <div class="col-xl-6 form-group">
                                        <input name="height" type="text" class="form-control style2" placeholder="الطول">
                                        <i class="fal small fa-solid fa-line-height"></i>
                                    </div>
                                    <div class="col-xl-6 form-group">
                                        <input name="weight" type="text" class="form-control style2" placeholder="الوزن"> 
                                        <i class="fal small fa-solid fa-line-height"></i>
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