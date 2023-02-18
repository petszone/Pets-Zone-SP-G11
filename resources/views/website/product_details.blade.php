@extends('website.layout')
@section('title')  {{$product->name}} |Pets Zone @endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-60 ptb-sm-30">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="/">الرئيسية</a></li>
                    <li><a href="/">المتجر</a></li>
                    <li class="active"><a href="/">{{$product->name}}</a></li>
                </ul>
            </div>
        </div> 
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Product Thumbnail Start -->
    <div class="main-product-thumbnail pb-60">
        <div class="container">
            <div class="row">
                <!-- Main Thumbnail Image Start -->
                <div class="col-lg-5">
                    <!-- Thumbnail Large Image start -->
                    <div class="tab-content">
                         
                        @foreach ($product->media as $key=>$value)
                            @if ($key === array_key_first($product->media->toArray()))
                                <div id="thumb1" class="tab-pane active">
                                    <a data-fancybox="images" href="{{$value->link}}"><img src="{{$value->link}}" alt="product-view"></a>
                                </div>
                            @else
                                <div id="thumb{{$key + 1}}" class="tab-pane">
                                    <a data-fancybox="images" href="{{$value->link}}"><img src="{{$value->link}}" alt="product-view"></a>
                                </div>
                            @endif
                            
                        @endforeach
                    </div>
                    <!-- Thumbnail Large Image End -->

                    <!-- Thumbnail Image End -->
                    <div class="product-thumbnail">
                        <div class="thumb-menu nav">
                            @foreach ($product->media as $key=>$value)
                                @if ($key === array_key_first($product->media->toArray()))
                                    <a class="active" data-toggle="tab" href="#thumb{{$key + 1}}"> <img src="{{$value->link}}" alt="product-thumbnail"></a>
                                @else
                                    <a data-toggle="tab" href="#thumb{{$key + 1}}"> <img src="{{$value->link}}" alt="product-thumbnail"></a>
                                @endif
                                
                            @endforeach
                        </div>
                    </div>
                    <!-- Thumbnail image end -->
                </div>
                <!-- Main Thumbnail Image End -->
                <!-- Thumbnail Description Start -->
                <div class="col-lg-7">
                    <div class="thubnail-desc fix">
                        <h3 class="product-header">{{$product->name}}</h3>
                        <div class="pro-price mb-10">
                            <p>
                                <span class="price">{{$product->price}} ريال</span>
                                @if($product->rebate > 0)
                                    <del class="prev-price">{{$product->price * (1 + $product->rebate)}} ريال</del>
                                @endif
                            </p>
                        </div>
                        <div class="pro-ref mb-15">
                            <p><span class="in-stock">في المخزن</span><span class="sku">{{$product->instock}} قطعة</span></p>
                        </div>
                        <div class="box-quantity">
                            <form action="{{route('cart.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input class="number" id="numeric" type="number" min="1" value="1" name="qnty">
                                <input type="submit" class="add-cart" value="أضف إلى السلة" style="background: #5ea975 none repeat scroll 100% 0;border-color: #5ea975;height: 35px;padding: 0 10px;text-align: center;width: 117px;">
                            </form>
                        </div>
                        <p class="ptb-20">{{$product->shortdesc}}</p>
                    </div>
                </div>
                <!-- Thumbnail Description End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail End -->
    <!-- Product Thumbnail Description Start -->
    <div class="thumnail-desc pb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="main-thumb-desc nav">
                        <li><a class="active" data-toggle="tab" href="#dtail">تفاصيل المنتج</a></li>
                    </ul>
                    <!-- Product Thumbnail Tab Content Start -->
                    <div class="tab-content thumb-content border-default">
                        <div id="dtail" class="tab-pane in active">
                            {{$product->longdesc}}
                        </div>
                    </div>
                    <!-- Product Thumbnail Tab Content End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail Description End -->
@endsection


