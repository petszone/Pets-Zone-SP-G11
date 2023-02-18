@extends('website.layout')
@section('title')  التسوق |Pets Zone @endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-60 ptb-sm-30">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="/">الرئيسية</a></li>
                    <li><a href="/">المتجر</a></li>
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
                                <h2>البحث</h2>
                            </div> 
                            <form action="{{route('shop.index')}}" method="GET" id="form">
                                <input type="text" name="search" id="search" placeholder="اكتب كلمة البحث" value="{{$request->search}}">
                                <input type="submit" id="submit-btn" value="بحث" style="background: #00a873;border: 2px solid #00a873;color: #f8f9fa;">
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
                                @forelse ($products as $item)
                                    <div class="single-product" style="border: 1px solid #ddd;">
                                        <!-- Product Image Start -->
                                        <div class="pro-img" style="width: 240px;">
                                            <a href="{{route('common.product.show', ['id' => $item->id])}}">
                                                <img class="primary-img" src="{{asset($item->media->first()->link)}}" alt="single-product" >
                                            </a> 
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <h4><a href="{{route('common.product.show', ['id' => $item->id])}}">{{$item->name}}</a></h4><br>
                                            <!-- <p><span class="price">$30.00</span></p> -->
                                            <p>{{$item->shortdesc}}</p>
                                        </div>
                                        <!-- Product Content End -->
                                    </div> 
                                @empty
                                <div>نأسف، لم يتطابق كلمة البحث بالمنتجات التي لدينا</div>
                                @endforelse
                            </div>
                            <!-- #list view End -->
                        </div>
                        <!-- Grid & List Main Area End -->
                    </div>
                    <!--Breadcrumb and Page Show Start -->
                    {{$products->links('vendor.pagination.default')}}
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
            $('#search').keydown(function(e) {
                var key = e.which;
                if (key == 13) {
                    $('#form').submit();
                    return false;
                }
            });
    </script>
@endsection