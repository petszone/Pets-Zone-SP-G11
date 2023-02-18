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
                                        تفاصيل الحجز
                                    </h3>
                                </div>
                                <form action="{{route('adm.appointments.change_status', $appointment->id)}}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">اسم مقتني الحيوان</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <input class="form-control" type="text" value="{{ $appointment->name }}" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">الإيميل</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <input class="form-control" type="text" value="{{ $appointment->email }}" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">نوع الحيوان</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <input class="form-control" type="text" value="{{ $appointment->animaltype }}" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">تارخ الحجز</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <input class="form-control" type="text" value="{{ $appointment->appointdate }}" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">الحالة</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <select name="status" class="form-control">
                                                        <option value="">اختر</option>
                                                        <option value="0" @if($appointment->status == 0) selected @endif>في انتظار التأكيد</option>
                                                        <option value="1" @if($appointment->status == 1) selected @endif>تأكيد الحجز</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn btn-primary btn-sm">
                                            <button type="submit" class="btn d-flex justify-content-center">
                                                <span class="indicator-label text-white">حفظ</span>
                                            </button>
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
 