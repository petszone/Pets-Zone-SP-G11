@extends('admin.layout')

@section('content')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        {{-- <h5 class="text-dark font-weight-bold my-1 mr-5">إضافة موظف جديد</h5> --}}
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        {{-- <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted">Features</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted">Widgets</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted">Stats</a>
                            </li>
                        </ul> --}}
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card card-custom">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        تعديل المنتج
                                    </h3>
                                </div>
                                <form class="form" action="{{route('adm.product.update', ['id' => $product->id])}}" method="POST" enctype='multipart/form-data'>
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">اسم المنتج</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <input class="form-control" type="text" name="name"  value="{{ $product->name }}"/>
                                                    @error('name')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">وصف قصير</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <input class="form-control" type="text" name="shortdesc" value="{{ $product->shortdesc }}"/>
                                                    @error('shortdesc')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">وصف طويل</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <input class="form-control" type="text" name="longdesc" value="{{ $product->longdesc }}"/>
                                                    @error('longdesc')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">السعر</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <input class="form-control" type="text" name="price" value="{{ $product->price }}"/>
                                                    @error('price')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">الكمية الموجودة</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <input class="form-control" type="text" name="instock"  value="{{ $product->instock }}"/>
                                                    @error('instock')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">نسبة الخصم</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <input class="form-control" type="text" name="rebate" placeholder="نسبة الخصم" value="{{ $product->rebate }}"/>
                                                    @error('rebate')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">الضريبة</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <input class="form-control" type="text" name="taxrate" placeholder="الضريبة" value="{{ $product->taxrate }}"/>
                                                    @error('taxrate')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">الحالة</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <span class="form-control" style="text-align: right;">
                                                        <input class="" type="radio" name="status" value="1" style="width:10%;" @if($product->status == 1) checked @endif/> 
                                                        <label for="">مفعل</label>
                                                        <input class="" type="radio" name="status" value="0" style="width:10%;" @if($product->status == 0) checked @endif/>
                                                        <label for="">غير مفعل</label>
                                                    </span>
                                                    
                                                    @error('taxrate')
                                                        <span  class="text-danger"  role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">صور المنتج</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead" style="text-align: right;">
                                                    @foreach ($product->media as $item)
                                                        <img src="{{$item->link}}" alt="" style="width: 100px;display:inline-block;">
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row justify-content-center">
                                            <div >
                                                <button type="submit" class="btn btn-primary mr-2">حفظ</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
 
@section('js')
    <script src="{{asset('assets/js/pages/widgets.js')}}"></script>
    <script >
        var avatar5 = new KTImageInput('kt_image_5');
        avatar5.on('cancel', function(imageInput) {
        swal.fire({
            title: 'تمت الإضافة بنجاح',
            type: 'success',
            buttonsStyling: false,
            confirmButtonText: 'موافق',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
        });

        avatar5.on('change', function(imageInput) {
        swal.fire({
            title: 'تمت إضافة الصورة بنجاح',
            type: 'success',
            buttonsStyling: false,
            confirmButtonText: 'موافق',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
        });

        avatar5.on('remove', function(imageInput) {
        swal.fire({
            title: 'مشكلة في إضافة الصورة',
            type: 'error',
            buttonsStyling: false,
            confirmButtonText: 'موافق',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
        });
    </script>
@endsection