@extends('website.layout')
@section('title') الإعلانات |Pets Zone @endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area pt-60 pb-55 pt-sm-30 pb-sm-20">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="/">الرئيسية</a></li>
                    <li class="active"><a href="#">الإعلانات</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Shop Page Start -->
    <div class="main-shop-page pb-60">
        <div class="container">
            <!-- Row End -->
            <div class="row">   
                <div class="col-lg-3  order-2">
                    <div class="sidebar white-bg">
                        <div class="single-sidebar">
                            <div class="group-title">
                                <h2>التصنيفات</h2>
                            </div> 
                            <form action="{{route('ads.index')}}" method="GET">
                                <ul>
                                    <li>
                                        نوع الإعلان
                                        <select name="ads_type" onchange="this.form.submit()" class="mt-1">
                                            {{$ads_type = request()->get('ads_type')}}
                                            <option value="">اختر</option>
                                            <option value="adoption" @if($ads_type  == 'adoption') selected @endif>تبني</option>
                                            <option value="mating" @if($ads_type  == 'mating') selected @endif>تزاوج</option>
                                            <option value="hosting" @if($ads_type  == 'hosting') selected @endif>إستضافة</option>
                                        </select>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>               
                <!-- Product Categorie List Start -->
                <div class="col-lg-9 order-lg-2">
                    <div class="main-categorie">
                        <!-- Grid & List Main Area End -->
                        <div class="tab-content fix">
                            <div id="list-view" class="tab-pane active">
                                @foreach ($ads as $item)
                                    <div class="single-product" style="border: 1px solid #ddd;">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="#">
                                                <img class="primary-img" src="{{asset($item->image)}}" alt="single-product">
                                            </a> 
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="#">{{$item->title}}</a></h4><br>
                                            <!-- <p><span class="price">$30.00</span></p> -->
                                            <p>{{$item->description}}</p>
                                        </div>
                                        <!-- Product Content End -->
                                        <div class="row" style="margin-top: 5rem;">
                                            {{-- <div class="col-md-4">
                                                <h6 style="font-size: 12px;color: #00a872;">الإسم:</h6>
                                                {{$item->name}}
                                            </div> --}}
                                            <div class="col-md-6">
                                                <h6 style="font-size: 12px;color: #00a872;">العنوان:</h6>
                                                {{$item->address}}
                                            </div>
                                            <div class="col-md-6">
                                                <h6 style="font-size: 12px;color: #00a872;">الجوال:</h6>
                                                {{$item->phone}}
                                            </div>
                                        </div>
                                    </div> 
                                @endforeach
                            </div>
                            <!-- #list view End -->
                        </div>
                        <!-- Grid & List Main Area End -->
                    </div>
                    <!--Breadcrumb and Page Show Start -->
                    {{$ads->links('vendor.pagination.default')}}
                    {{-- <div class="pagination-box fix">
                        <ul class="blog-pagination ">
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                        <div class="toolbar-sorter-footer">
                            <label>show</label>
                            <select class="sorter" name="sorter">
                                <option value="Position" selected="selected">12</option>
                                <option value="Product Name">15</option>
                                <option value="Price">30</option>
                            </select>
                            <span>per page</span>
                        </div>
                    </div> --}}
                    <!--Breadcrumb and Page Show End -->
                </div>
                <!-- product Categorie List End -->

            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Shop Page End -->
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