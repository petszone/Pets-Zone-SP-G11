@extends('website.layout')
@section('title') تفاصيل الطلب |Pets Zone @endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area pt-60 pb-55 pt-sm-30 pb-sm-20">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="#">الرئيسية</a></li>
                    <li class="active"><a href="#">تفاصيل الطلب</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Cart Main Area Start -->
    <div class="cart-main-area pb-80 pb-sm-50">
        <div class="container">
            <h2 class="text-capitalize sub-heading">العنوان المرسل إليه الطلب</h2>
            <div class="row">
                <div class="col-md-12"> 
                    <div>{{$address->fullname}}</div>
                    <div>{{$address->email}}</div>
                    <div>{{$address->address1}}</div>
                    <div>{{$address->address2}}</div>
                    <div>{{$address->postal}}</div>
                    <div>{{$address->city->name}}</div>
                    {{-- <div>{{$address->country->name}}</div> --}}
                    <div>{{$address->telephone}}</div>
                </div>
            </div>
                <!-- Row End -->
        </div>
        <div class="container mt-5">
            <h2 class="text-capitalize sub-heading">تفاصيل الطلب</h2>
            <div class="row">
                <div class="col-md-12"> 
                    <!-- Form Start -->
                    {{-- <form action="#"> --}}
                        <!-- Table Content Start -->
                        <div class="table-content table-responsive mb-50">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">صورة المنتج</th>
                                        <th class="product-name">اسم المنتج</th>
                                        <th class="product-price">السعر</th>
                                        <th class="product-quantity">الكمية</th>
                                        <th class="product-subtotal">الإجمالي</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0 ?>
                                    @foreach ($order->orderProduct as $item)
                                    
                                    <?php $subtotal =  $item->price * $item->quantity ?>
                                    <?php $total +=  $item->price * $item->quantity ?>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="{{asset($item->product->media->first()->link)}}" alt="cart-image" /></a>
                                            </td>
                                            <td class="product-name"><a href="#">{{$item->product->name}}</a></td>
                                            <td class="product-price"><span class="amount">{{$item->product->price}} ريال</span></td>
                                            <td class="product-quantity"><input type="number" value="{{$item->quantity}}" /></td>
                                            <td class="product-subtotal">{{$subtotal}} ريال</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Table Content Start -->
                        <div class="row">
                            <!-- Cart Button Start -->
                            <div class="col-lg-8 col-md-7">
                            </div>
                            <!-- Cart Button Start -->
                            <!-- Cart Totals Start -->
                            <div class="col-lg-4 col-md-12">
                                <div class="cart_totals">
                                    <h2>إجمالي السعر</h2>
                                    <br />
                                    <table>
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>إجمالي فرعي</th>
                                                <td><span class="amount">{{$total}} ريال</span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>إجمالي كلي</th>
                                                <td>
                                                    <strong><span class="amount">{{$total}} ريال</span></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Cart Totals End -->
                        </div>
                        <!-- Row End -->
                    {{-- </form> --}}
                    <!-- Form End -->
                </div>
            </div>
                <!-- Row End -->
        </div>
    </div>
    <!-- Cart Main Area End -->
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