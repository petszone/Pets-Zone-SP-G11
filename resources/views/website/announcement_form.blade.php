@extends('website.layout')
@section('title') إضافة إعلان جديد|Pets Zone @endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area pt-60 pb-55 pt-sm-30 pb-sm-20">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="/">الرئيسية</a></li>
                    <li class="active"><a href="#">إضافة بلاغ جديد</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <div class="checkout-area pt-30  pb-60">
        <div class="container">
            <form action="{{route('announce.store')}}" method="POST" enctype='multipart/form-data'>    
                @csrf            
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="checkbox-form">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-lg-10 col-md-12">
                                    <div class="checkbox-form">
                                        <h3>أضف معلومات عن الحيوان</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-30">
                                                    <label>اسم مقدم البلاغ</label>
                                                    <input type="text" name="name" value="{{old('name')}}" placeholder="اسم مقدم البلاغ">
                                                    @error('name')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-30">
                                                    <label>الجوال</label>
                                                    <input type="text" name="phone" value="{{old('phone')}}" placeholder="رقم الجوال">
                                                    @error('phone')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-30">
                                                    <label>الإيميل</label>
                                                    <input type="text" name="email" value="{{old('email')}}" placeholder="الإيميل">
                                                    @error('email')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-6">
                                                <div class="checkout-form-list mb-30">
                                                    <label>اسم الحيوان</label>
                                                    <input type="text" name="animalname" value="{{old('animalname')}}" placeholder="اسم الحيوان">
                                                    @error('animalname')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-30">
                                                    <label>نوع الحيوان</label>
                                                    <input type="text" name="animaltype" value="{{old('animaltype')}}" placeholder="نوع الحيوان">
                                                    @error('animaltype')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-30">
                                                    <label>رابط جوجل ماب</label>
                                                    <input type="text" name="google_map_address" value="{{old('google_map_address')}}" placeholder="رابط قوقل ماب">
                                                    @error('google_map_address')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>وصف <span class="required">*</span></label>
                                                    <textarea name="description" id="" cols="30" rows="5"></textarea>
                                                    @error('description')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <div class="checkout-form-list">
                                                    <label>صورة الحيوان <span class="required">*</span></label>
                                                    <input type="file" name="image" value="{{old('image')}}">
                                                    @error('image')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <div class="checkout-form-list mb-30">
                                                    <label>هل يمكنك إبقاء الحيوان عندك لحين تواصل فريق الإنقاذ معك؟</label>
                                                    <input type="text" name="keepanimalwith" value="{{old('keepanimalwith')}}" placeholder=" ">
                                                    @error('keepanimalwith')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list mb-30">
                                                    <label>هل تستطيع احتضان/تبني الحيوان بعد العلاج او خلال فترة العلاج؟ </label>
                                                    <input type="text" name="adoptanimalaftertreatment" value="{{old('adoptanimalaftertreatment')}}" placeholder=" ">
                                                    @error('adoptanimalaftertreatment')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="different-address d-flex justify-content-center">
                            <button type="submit" class="return-customer-btn">إضافة</button>
                        </div>
                    </div>
                </div>
                </form>   
        </div>
    </div>
@endsection
