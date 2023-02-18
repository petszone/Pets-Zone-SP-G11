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
                        <!--begin::Page Title-->
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
                                        تفاصيل البلاغ
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">اسم المرسل</label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <div class="typeahead">
                                                <input class="form-control" type="text" value="{{ $announce->name }}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">جوال المرسل</label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <div class="typeahead">
                                                <input class="form-control" type="text" value="{{ $announce->phone }}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">ايميل المرسل</label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <div class="typeahead">
                                                <input class="form-control" type="text" value="{{ $announce->email }}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">اسم الحيوان</label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <div class="typeahead">
                                                <input class="form-control" type="text" value="{{ $announce->animalname }}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">نوع الحيوان</label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <div class="typeahead">
                                                <input class="form-control" type="text" value="{{ $announce->animaltype }}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">وصف الحالة</label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <div class="typeahead">
                                                <input class="form-control" type="text" value="{{ $announce->description }}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">هل يمكنك إبقاء الحيوان عندك لحين تواصل فريق الإنقاذ معك؟</label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <div class="typeahead">
                                                <input class="form-control" type="text"  value="{{ $announce->keepanimalwith }}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">هل تستطيع احتضان/تبني الحيوان بعد العلاج او خلال فترة العلاج؟</label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <div class="typeahead">
                                                <input class="form-control" type="text" value="{{ $announce->adoptanimalaftertreatment }}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">صورة البلاغ</label>
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <div class="typeahead" style="text-align: right;">
                                                <img src="{{$announce->image}}" alt="" style="width: 100px;display:inline-block;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
 