@extends('website.layout')
@section('title')  حسابي |Pets Zone @endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-60 ptb-sm-30">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="#">الرئيسية</a></li>
                    <li class="active"><a href="#">حسابي</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- My Account Page Start Here -->
    <div class="my-account white-bg pb-60">
        <div class="container">
            <div class="account-dashboard">
                <div class="row">
                    <div class="col-lg-2">
                        <!-- Nav tabs -->
                        <ul class="nav flex-column dashboard-list" role="tablist">
                            <li><a class="active" data-toggle="tab" href="#account-details">معلوماتي الشخصية</a></li>
                            <li><a data-toggle="tab" href="#orders">طلباتي</a></li>
                            <li><a data-toggle="tab" href="#address">عناويني</a></li>
                            <li><a data-toggle="tab" href="#ads">اعلاناتي</a></li>
                            <li><a data-toggle="tab" href="#appointment">طلبات الحجز</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">خروج</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-10">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard-content mt-all-40">
                            <div id="account-details" class="tab-pane active">
                                <h3>بياناتي الشخصية</h3> 
                                <div class="register-form login-form clearfix">
                                    <form action="{{route('account.update', ['id' => $user->id])}}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="f-name" class="col-lg-3 col-md-4 col-form-label">الإسم الأول</label>
                                            <div class="col-lg-6 col-md-8">
                                                <input type="text" class="form-control" id="f-name" name="firstname" value="{{$user->firstname}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="l-name" class="col-lg-3 col-md-4 col-form-label">الإسم الأخير</label>
                                            <div class="col-lg-6 col-md-8">
                                                <input type="text" class="form-control" id="l-name" name="lastname" value="{{$user->lastname}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="l-name" class="col-lg-3 col-md-4 col-form-label">رقم الجوال</label>
                                            <div class="col-lg-6 col-md-8">
                                                <input type="text" class="form-control" id="l-name" name="telephone" value="{{$user->telephone}}">
                                            </div>
                                        </div>
                                        <div class="register-box mt-40">
                                            <button type="submit" class="return-customer-btn f-right">حفظ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="orders" class="tab-pane fade">
                                <h3>الطلبات</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>التاريخ</th>
                                                <th>حالة الدفع</th>
                                                <th>الإجمالي</th>
                                                <th>الأدوات</th>	 	 	 	
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($my_orders as $key=>$value)
                                                <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td>{{$value->created_at}}</td>
                                                    <td>{{__('general.' . $value->statuspayment)}}</td>
                                                    <td>{{$value->total}}</td>
                                                    <td><a class="view" href="{{route('account.order.details', ['orderId' => $value->id])}}">عرض</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="address" class="tab-pane">
                                <h3>عنواني</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الإسم</th>
                                                <th>البريد الإلكتروني</th>
                                                {{-- <th>الدولة</th> --}}
                                                <th>المدينة</th>
                                                <th>العنوان</th>
                                                {{-- <th>الأدوات</th>	 	 	 	 --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($my_addersses as $key=>$value)
                                                <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td>{{$value->fullname}}</td>
                                                    <td>{{$value->email}}</td>
                                                    {{-- <td>{{$value->country->name}}</td> --}}
                                                    <td>{{$value->city->name}}</td>
                                                    <td>{{$value->address1}}</td>
                                                    {{-- <td><a class="view" href="cart.html">عرض</a></td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="ads" class="tab-pane">
                                <h3>اعلاناتي</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم الحيوان</th>
                                                <th>العنوان</th>
                                                <th>المدينة</th>
                                                <th>الأدوات</th>	 	 	 	
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ads as $key=>$value)
                                                <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td>{{$value->title}}</td>
                                                    <td>{{$value->address}}</td>
                                                    <td>{{$value->city->name}}</td>
                                                    <td><button class="deleteRecord" data-id="{{$value->id}}">حذف</button> </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="appointment" class="tab-pane">
                                <h3>طلبات الحجز</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>نوع الحيوان</th>
                                                <th>تاريخ الحجز</th>
                                                <th>الحالة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($appointments as $key=>$value)
                                                <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td>{{$value->animaltype}}</td>
                                                    <td>{{$value->appointdate}}</td>
                                                    <td>{{$value->status == 0 ? 'في انتظار التأكيد' : 'تم التأكيد'}}</td>
                                                </tr>
                                            @empty
                                                لا توجد حجوزات
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Account Page End Here -->
@endsection

@section('js')
    <script>
        $(".deleteRecord").click(function(e){
        e.preventDefault();
        let answer = window.confirm('هل أنت متأكد من عملية الحذف؟');
        let id = $(this).data("id");
        let url = "{{route('ads.destroy', ['ID'])}}";
        var $tr = $(this).closest('tr');
        if (answer)
        {
            $.ajax({
            type:"POST",
            url : url.replace('ID', id),
            data:{
                id:id,
                _token:"{{ csrf_token() }}",
            },
            success: function(response) {
                if(response)
                {
                    //on success, hide element user wants to delete.
                    $tr.find('td').fadeOut(1000,function(){
                        $tr.remove();
                    });
                }
            }
            });
        }
        else {
            e.stopImmediatePropagation();
            e.preventDefault();
        }
        });
    </script>
@endsection