@extends('website.layout')
@section('title')  الرئيسية |Pets Zone @endsection
@section('content')
    <!-- Slider Area Start -->
    <div class="slider-area pb-60">
        <div class="slider-wrapper theme-default  nivo2">
            <!-- Slider Background  Image Start-->
            <div id="slider" class="nivoSlider">
                <a href="/"><img src="{{ asset('website/img/slider/3.jpg') }}" data-thumb="img/slider/3.jpg') }}" alt=""
                        title="#slider-1-caption1" /></a>
                <a href="/"><img src="{{ asset('website/img/slider/4.jpg') }}" data-thumb="img/slider/4.jpg') }}" alt=""
                        title="#slider-1-caption2" /></a>
            </div>
            <!-- Slider Background  Image Start-->
            <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
                <div class="text-content-wrapper">
                    <div class="container">
                        <div class="text-content">
                            <h4 class="title2 wow bounceInLeft mb-16" data-wow-duration="2s" data-wow-delay="0s">Pets zone</h4>
                            <h1 class="title1 wow bounceInRight mb-16" data-wow-duration="2s" data-wow-delay="1s">أكبر موقع<br>لكل ما يتعلق بالحيوانات الأليفة</h1>
                            <div class="banner-readmore wow bounceInUp mt-35" data-wow-duration="2s" data-wow-delay="2s">
                                <a class="button slider-btn" href="{{route('shop.index')}}">تسوق الان</a>                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            <div id="slider-1-caption2" class="nivo-html-caption nivo-caption">
                <div class="text-content-wrapper">
                    <div class="container">
                        <div class="text-content slide-2">
                           
                            <div class="banner-readmore wow bounceInUp mt-35" data-wow-duration="1s" data-wow-delay="2s">
                            </div>
                        </div>
                    </div>       
                </div>
            </div> 
        </div>
    </div>
    <!-- Slider Area End -->
    <!-- Company Policy Start -->
    <div class="company-policy pb-60 pb-sm-25">
        <div class="container">
            <div class="row">
                <!-- Single Policy Start -->
                <div class="col-lg-3 col-sm-6">
                    <div class="single-policy">
                        <div class="icone-img">
                            <img src="{{ asset('website/img/icon/1.png') }}" alt="">
                        </div>
                        <div class="policy-desc">
                            <h3>حجز مواعيد في العيادة </h3>
                            <p>استشارة أطباء بيطريين مجانا</p>
                        </div>
                    </div>
                </div>
                <!-- Single Policy End -->
                <!-- Single Policy Start -->
                <div class="col-lg-3 col-sm-6">
                    <div class="single-policy">
                        <div class="icone-img">
                            <img src="{{ asset('website/img/icon/2.png') }}" alt="">
                        </div>
                        <div class="policy-desc">
                            <h3>إرشادات </h3>
                            <p>للتعامل مع حيواناتكم الاليفة</p>
                        </div>
                    </div>
                </div>
                <!-- Single Policy End -->
                <!-- Single Policy Start -->
                <div class="col-lg-3 col-sm-6">
                    <div class="single-policy">
                        <div class="icone-img">
                            <img src="{{ asset('website/img/icon/3.png') }}" alt="">
                        </div>
                        <div class="policy-desc">
                            <h3>متجر</h3>
                            <p> لمستلزمات الحيوانات الاليفة مع وسيلة دفع امنة</p>
                        </div>
                    </div>
                </div>
                <!-- Single Policy End -->
                <!-- Single Policy Start -->
                <div class="col-lg-3 col-sm-6">
                    <div class="single-policy">
                        <div class="icone-img">
                            <img src="{{ asset('website/img/icon/4.png') }}" alt="">
                        </div>
                        <div class="policy-desc">
                            <h3>تقديم بلاغات</h3>
                            <p>تقديم بلاغات للحيوانات التي بحاجة للمساعدة </p>
                        </div>
                    </div>
                </div>
                <!-- Single Policy End -->
            </div>
        </div>
    </div>
    <!-- Company Policy End -->
    <!-- Banner Start -->
    <div class="upper-banner banner pb-60">
        <div class="container">
            <div class="row">
                <!-- Single Banner Start -->
                <div class="col-sm-4">
                    <div class="single-banner zoom">
                        <a href="#"><img src="{{ asset('website/img/banner/3.jpg') }}" alt="slider-banner"></a>
                    </div>
                </div>
                <!-- Single Banner End -->
                <!-- Single Banner Start -->
                <div class="col-sm-4">
                    <div class="single-banner zoom">
                        <a href="#"><img src="{{ asset('website/img/banner/4.jpg') }}" alt="slider-banner"></a>
                    </div>
                </div>
                <!-- Single Banner End -->
                <!-- Single Banner Start -->
                <div class="col-sm-4">
                    <div class="single-banner zoom">
                        <a href="#"><img src="{{ asset('website/img/banner/5.jpg') }}" alt="slider-banner"></a>
                    </div>
                </div>
                <!-- Single Banner End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Banner End -->
    <!-- Best Products Start -->
    <div class="best-seller-product pb-30">
        <div class="container">
            <div class="group-title">
                <h2>اخر المنتجات</h2>
            </div>
            <!-- Best Product Activation Start -->
            <div class="hand-tool-active owl-carousel">
                @foreach ($products as $item)
                    <div class="single-product"> 
                        <!-- Product Image Start -->
                        <div class="pro-img"> 
                            <a href="{{route('common.product.show', ['id' => $item->id])}}">
                                    <img class="primary-img" src="{{ $item->media->first()->link }}" alt="single-product">
                                    {{-- <img class="secondary-img" src="{{ $image->link }}" alt="single-product"> --}}
                            </a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <h4><a href="{{route('common.product.show', ['id' => $item->id])}}">{{ $item->name }}</a></h4>
                            <p>
                                <span class="price">{{ $item->price }} ريال</span>
                                @if($item->rebate > 0)
                                    <del class="prev-price">{{$item->price * (1 + $item->rebate)}} ريال</del>
                                @endif
                            </p>
                            <div class="pro-actions">
                                <div class="actions-secondary">
                                    {{-- <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a> --}}
                                    <button class="add-cart" data-toggle="tooltip" title="Add to Cart" data-productid="{{$item->id}}" style="border: unset;">أضف الى السلة</button>
                                    {{-- <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                @endforeach
            </div>
            <!-- Best Product Activation End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Best Product End -->
    <!-- Banner Start -->
    {{-- <div class="upper-banner banner pb-60">
        <div class="container">
            <div class="row">
                <!-- Single Banner Start -->
                <div class="col-sm-6">
                    <div class="single-banner zoom">
                        <a href="#"><img src="{{ asset('website/img/banner/1.png') }}" alt="slider-banner"></a>
                    </div>
                </div>
                <!-- Single Banner End -->
                <!-- Single Banner Start -->
                <div class="col-sm-6">
                    <div class="single-banner zoom">
                        <a href="#"><img src="{{ asset('website/img/banner/2.png') }}" alt="slider-banner"></a>
                    </div>
                </div>
                <!-- Single Banner End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div> --}}
    <!-- Banner End -->

 
@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function(){
            $(".add-cart").click(function(e){
                e.preventDefault();
                @if(!auth()->check() == true)
                    swal('عذرا', 'لا يمكنك الإضافة إلا عند تسجيل الدخول', 'error');
                @else
                    let productid = $(this).data('productid');
                    let url = "{{route('cart.store', ['ID'])}}";
                    $.ajax({
                        type:"post",
                        url: url.replace('ID', productid),
                        data:{
                            product_id:productid,
                            qnty:1,
                            _token:"{{ csrf_token() }}",
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                @endif
            });
        });
    </script>
    @if( session()->has('msg_status') == 'success')
        <script>
            $( document ).ready(function(){
                swal('{{session('msg_title')}}', '{{session('msg_content')}}', '{{session('msg_status')}}');
            });
        </script>
    @endif
@endsection