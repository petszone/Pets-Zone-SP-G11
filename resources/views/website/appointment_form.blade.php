@extends('website.layout')
@section('title') إضافة حجز جديد |Pets Zone @endsection
@section('content')
<div class="appointment">
    <!-- <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12"> -->
                <div class="about-img">
                    <img class="img" src="{{asset('website/img/banner/15.jpg')}}" alt="about-us" style="width: -webkit-fill-available;">
                    <div class="ptb-60" style="position: absolute;top: 501px;left: 50%;transform: translate(-50%, -50%);text-align: center;background-color: #1e2c40d1;color: #ffff !important;border-radius: 12px;width: 45%;">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 style="color: #ffff;">احجز في العيادة</h3>
                                    <p class="text-capitalize mb-40">يمكنك حجز موعد الآن</p>
                                    @if (Session::has('error'))
                                            <div class="row">
                                            <div class="col-md-12 col-md-offset-1">
                                                <div class="alert alert-danger alert-dismissible">
                                                        <h5>{!! Session::get('error') !!}</h5>   
                                                </div>
                                            </div>
                                            </div>
                                    @endif
                                    <form id="contact-form" class="contact-form" action="{{route('home.storeAppointment')}}" method="POST">
                                        @csrf
                                        <div class="address-wrapper">
                                            <div class="row mt-3">    
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="address-fname text-left">
                                                        <input type="text" name="name" placeholder="اسم مقتني الحيوان" required>
                                                        @error('name')
                                                            <span  class="text-danger"  role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>
                                            <div class="row mt-3">    
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="address-fname text-left">
                                                        <input type="text" name="email" placeholder="الإيميل" required>
                                                        @error('email')
                                                            <span  class="text-danger"  role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>
                                            <div class="row mt-3">    
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="address-fname text-left">
                                                        <input type="text" name="animaltype" placeholder="نوع الحيوان" required>
                                                        @error('animaltype')
                                                            <span  class="text-danger"  role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>
                                            <div class="row mt-3">    
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="address-fname text-left">
                                                        <input type="date" name="appointdate" >
                                                        @error('appointdate')
                                                            <span  class="text-danger"  role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>
                                            <div class="row mt-3">    
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="address-fname text-left">
                                                        <select name="appointtime">
                                                            <option value="">اختر</option>
                                                            <option value="08:00 - 09:00">08:00 - 09:00</option>
                                                            <option value="09:00 - 10:00">09:00 - 10:00</option>
                                                            <option value="10:00 - 11:00">10:00 - 11:00</option>
                                                            <option value="11:00 - 12:00">11:00 - 12:00</option>
                                                            <option value="12:00 - 13:00">12:00 - 13:00</option>
                                                            <option value="13:00 - 14:00">13:00 - 14:00</option>
                                                            <option value="14:00 - 15:00">14:00 - 15:00</option>
                                                            <option value="15:00 - 16:00">15:00 - 16:00</option>
                                                            <option value="16:00 - 17:00">16:00 - 17:00</option>
                                                            <option value="17:00 - 18:00">17:00 - 18:00</option>
                                                            <option value="18:00 - 19:00">18:00 - 19:00</option>
                                                            <option value="19:00 - 20:00">19:00 - 20:00</option>
                                                            <option value="20:00 - 21:00">20:00 - 21:00</option>
                                                            <option value="21:00 - 22:00">21:00 - 22:00</option>
                                                        </select>
                                                        @error('appointtime')
                                                            <span  class="text-danger"  role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>
                                        </div>
                                        <p class="form-message ml-15"></p>
                                        <div class="col-xs-12 footer-content mail-content">
                                            <div class="send-email">
                                                <input type="submit" value="إرسال" class="submit">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div>
        </div>
    </div> -->
</div>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function(){
            $(".submit").click(function(e){
                e.preventDefault();
                var form = $('.contact-form');
                swal({
                    // buttons: ["الرجوع للرئيسية", "نعم"],
                    title: "هل أنت متأكد",
                    text: "هل أنت متأكد من إرسال طلب الحجز؟",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#5ea975",
                    confirmButtonText: "نعم",
                    closeOnConfirm: false
                } ).then((confirmed) => {
                    if (confirmed) {
                        form.submit();
                    } else {
                        swal("عذرا", "لم يتم الإرسال", 'error');
                    }
                    });
            });
        });
    </script>
@endsection