@extends('website.layout')
@section('title')  الدفع | Pets Zone @endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area pt-60 pb-55 pt-sm-30 pb-sm-20">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="#">الرئيسية</a></li>
                    <li class="active"><a href="#">الدفع</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- checkout-area start -->
    <div class="checkout-area pt-30  pb-60">
        <div class="container">
            <form action="{{route('checkout.placeOrder')}}" method="POST">          
                @csrf      
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        {{-- <div class="checkbox-form">
                            <h3>عناويني</h3>
                            <div class="row">
                                @foreach ($addresses as $item)
                                    <div class="col-sm-10">
                                        <label class="radio-inline">
                                            <input type="radio" name="newsletter" value="1" checked>
                                            &nbsp; {{$item->firstname . $item->lastname}}
                                        </label>
                                        <div class="address-subdetail">
                                            <span>
                                                <i class="fa fa-globe" aria-hidden="true"></i> {{$item->country}}
                                            </span>&nbsp;&nbsp;&nbsp;
                                            <span>
                                                <i class="fa fa-map-marker" aria-hidden="true"></i> {{$item->country->city}}
                                            </span>&nbsp;&nbsp;&nbsp;
                                            <span>
                                                <i class="fa fa-home" aria-hidden="true"></i> 00542
                                            </span>
                                        </div>
                                    </div>   
                                @endforeach
                            </div>
                        </div> --}}
                        <div class="mt-3">
                            <h4>تفاصيل الفاتورة</h4>
                            <div class="register-form login-form clearfix mt-4">
                                <div class="row">
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
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>الإسم الأول <span class="required">*</span></label>
                                            <input type="text" name="firstname" placeholder="الإسم الأول">
                                            @error('firstname')
                                                <span  class="text-danger"  role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>الإسم الأخير<span class="required">*</span></label>
                                            <input type="text" name="lastname" placeholder="الإسم الأخير">
                                            @error('lastname')
                                                <span  class="text-danger"  role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-30">
                                            <label>جوال<span class="required">*</span></label>
                                            <input type="text" name="telephone" placeholder="جوال">
                                            @error('telephone')
                                                <span  class="text-danger"  role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>البريد الإلكتروني<span class="required">*</span></label>
                                            <input type="email" name="email" placeholder="البريد الإلكتروني">
                                            @error('email')
                                                <span  class="text-danger"  role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>الرمز البريدي<span class="required">*</span></label>
                                            <input type="text" name="postal" placeholder="الرمز البريدي">
                                            @error('postal')
                                                <span  class="text-danger"  role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-30">
                                            <label>العنوان الأول<span class="required">*</span></label>
                                            <input type="text" name="address1" placeholder="العنوان الأول">
                                            @error('address1')
                                                <span  class="text-danger"  role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-30">
                                            <label>العنوان الثاني</label>
                                            <input type="text" name="address2" placeholder="العنوان الثاني">
                                            @error('address2')
                                                <span  class="text-danger"  role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="order-notes">
                                    <div class="checkout-form-list">
                                        <label>ملاحظات</label>
                                        <textarea id="checkout-mess" name="comment" cols="30" rows="10" placeholder="اكتب ملاحظات حول الطلب"></textarea>
                                        @error('comment')
                                            <span  class="text-danger"  role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="register-box d-flex justify-content-center">
                                    <button type="submit" class="return-customer-btn f-right">حفظ</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="your-order">
                            <h3>طلبك</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">المنتج</th>
                                            <th class="product-total">الإجمالي</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0 ?>
                                        @foreach ($user_cart as $item)
                                        <?php $subtotal =  $item->price * $item->quantity ?>
                                        <?php $total +=  $item->price * $item->quantity ?>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{$item->product->name}} <strong class="product-quantity"> × {{$item->quantity}}</strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{{$subtotal}} ريال</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        {{-- <tr class="cart-subtotal">
                                            <th>إجمالي فرعي</th>
                                            <td><span class="amount">{{$total}} ريال</span></td>
                                        </tr> --}}
                                        <tr class="order-total">
                                            <th>إجمالي كلي</th>
                                            <td><strong><span class="amount">{{$total}} ريال</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a role="button">طريقة الدفع</a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse  in show" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <div class="col-sm-10">
                                                        <label class="radio-inline">
                                                        <input type="radio" name="payment_method" value="1" checked>&nbsp;&nbsp;&nbsp;PayTabs</label>
                                                    </div>                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-button-payment">
                                        <input type="submit" value="إتمام الدفع">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>   
        </div>
    </div>
    <!-- checkout-area end -->
@endsection
