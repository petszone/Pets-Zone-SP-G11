@extends('admin.layout')

@section('content')

    <!--begin::Content-->
    <div class="content  mt-15" id="kt_content">
        <div class=" ">
            <div class="container">
                <div class="  justify-content-center py-8 px-8 py-md-10 px-md-0 card card-custom">
                    <div class="col-md-12">
                        <div class="mb-10 mb-md-0">
                            <div class="row">
                                <label class="col-2 col-form-label">الإسم كاملاً:</label>
                                <div class="col-9 col-form-label">
                                    <div class="checkbox-inline">
                                        {{$address->fullname}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-2 col-form-label">البريد الإلكتروني:</label>
                                <div class="col-9 col-form-label">
                                    <div class="checkbox-inline">
                                        {{$address->email}}
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <label class="col-2 col-form-label">المدينة:</label>
                                <div class="col-9 col-form-label">
                                    <div class="checkbox-inline">
                                        {{$address->city->name}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-2 col-form-label">موبايل:</label>
                                <div class="col-9 col-form-label">
                                    <div class="checkbox-inline">
                                        {{$address->telephone}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-2 col-form-label">الرمز البريدي:</label>
                                <div class="col-9 col-form-label">
                                    <div class="checkbox-inline">
                                        {{$address->postal}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-2 col-form-label">عنوان1:</label>
                                <div class="col-9 col-form-label">
                                    <div class="checkbox-inline">
                                        {{$address->address1}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-2 col-form-label">عنوان2:</label>
                                <div class="col-9 col-form-label">
                                    <div class="checkbox-inline">
                                        {{$address->address2}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid mt-5">
            <div class="container">
                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0 card card-custom">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="pl-0 font-weight-bold text-muted text-uppercase">#</th>
                                        <th class="pl-0 font-weight-bold text-muted text-uppercase">صورة المنتج</th>
                                        <th class="text-right font-weight-bold text-muted text-uppercase">الإسم</th>
                                        <th class="text-right font-weight-bold text-muted text-uppercase">السعر</th>
                                        <th class="text-right font-weight-bold text-muted text-uppercase">الكمية</th>
                                        <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">الإجمالي</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php $total = 0 ?>
                                    @foreach ($order->orderProduct as $key=>$item)
                                    <?php $subtotal =  $item->price * $item->quantity ?>
                                    <?php $total +=  $item->price * $item->quantity ?>
                                        <tr class="font-weight-boldest font-size-lg">
                                            <td class="pl-0 pt-7">{{$key + 1}}</td>
                                            <td class="pl-0 pt-7"><img src="{{asset($item->product->media->first()->link)}}" alt="" style="width: 90px;"></td>
                                            <td class="text-right pt-7">{{$item->product->name}}</td>
                                            <td class="text-right pt-7">{{$item->product->price}} ريال</td>
                                            <td class="text-right pt-7">{{$item->quantity}}</td>
                                            <td class="text-danger pr-0 pt-7 text-right">{{$subtotal}} ريال</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between flex-column flex-md-row font-size-lg">
                            <div class="d-flex flex-column mb-10 mb-md-0">
                                 الإجمالي
                            </div>
                            <div class="d-flex flex-column text-md-right">
                                {{-- <span class="font-size-lg font-weight-bolder mb-1">TOTAL AMOUNT</span> --}}
                                <span class="font-size-h2 font-weight-boldest text-danger mb-1">{{$total}} ريال</span>
                                {{-- <span>Taxes Included</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection
 
 