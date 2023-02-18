@extends('website.layout')
@section('title') إضافة إعلان جديد|Pets Zone @endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area pt-60 pb-55 pt-sm-30 pb-sm-20">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="/">الرئيسية</a></li>
                    <li class="active"><a href="#">إضافة إعلان جديد</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <div class="checkout-area pt-30  pb-60">
        <div class="container">
            <form action="{{route('ads.store')}}" method="POST" enctype='multipart/form-data'>    
                @csrf            
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="checkbox-form">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="checkbox-form">
                                        <h3>أضف معلومات الإعلان</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="checkout-form-list mb-30">
                                                    <label>عنوان الإعلان</label>
                                                    <input type="text" name="title" value="{{old('title')}}" placeholder="عنوان الإعلان">
                                                    @error('title')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
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
                                            <div class="col-md-12">
                                                <div class="checkout-form-list mb-30">
                                                    <label>الجوال</label>
                                                    <input type="text" name="phone" value="{{old('phone')}}" placeholder="الجوال">
                                                    @error('phone')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="country-select mb-30">
                                                    <label>المدينة <span class="required">*</span></label>
                                                    <select name="city_id" id="city">
                                                        <option value="">اختر</option>
                                                        @foreach ($cities as $item)
                                                            <option value="{{$item->id}}" @if(old('city_id') == $item->id) selected @endif>{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('city_id')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="country-select mb-30">
                                                    <label>التصنيف<span class="required">*</span></label>
                                                    <select name="ads_type">
                                                        <option value="">اختر</option>
                                                        <option value="adoption" @if(old('ads_type') == 'adoption') selected @endif>تبني</option>
                                                        <option value="mating" @if(old('ads_type') == 'mating') selected @endif>تزاوج</option>
                                                        <option value="hosting" @if(old('ads_type') == 'hosting') selected @endif>إستضافة</option>
                                                    </select>
                                                    @error('ads_type')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>العنوان <span class="required">*</span></label>
                                                    <input type="text" name="address" value="{{old('address')}}" placeholder="العنوان">
                                                    @error('address')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4">
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
                                                    <label>أضف صورة<span class="required">*</span></label>
                                                    <input type="file" name="image" value="{{old('image')}}">
                                                    @error('image')
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
                    <div class="col-lg-6 col-md-6" style="background-image: url({{asset('website/img/products/12.jpg')}});">
                            <!-- <img src="img/products/10.jpg" alt="" style="width:-webkit-fill-available;"> -->
                            <span class="vc_row-overlay" ></span>
                    </div>
                </div>
                </form>   
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function(){
            $(".product-remove").click(function(e){
                e.preventDefault();
                let productid = $(this).data('productid');
                let url = "{{route('cart.destroy', ['ID'])}}";
                $.ajax({
                    type:"post",
                    url: url.replace('ID', productid),
                    data:{
                    productid:productid,
                    _token:"{{ csrf_token() }}",
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endsection