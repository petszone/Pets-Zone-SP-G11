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
                                          تعديل صلاحية
                                    </h3>
                                </div>
                                <form class="form form-horizontal" action="{{route('adm.employees.update', ['id'=> $employee->id])}}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">الإسم الأول</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <input class="form-control" type="text" placeholder="الاسم الأول" name="firstname" value="{{$employee->firstname}}"/>
                                                    @error('firstname')
                                                        <div class="form-control-feedback text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">الإسم الثاني</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <input class="form-control" type="text" placeholder="الاسم الثاني" name="lastname" value="{{$employee->lastname}}"/>
                                                    @error('lastname')
                                                        <div class="form-control-feedback text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">البريد الإلكتروني</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <input class="form-control" type="text" placeholder="البريد الإلكتروني" name="email" value="{{$employee->email}}"/>
                                                    @error('email')
                                                        <div class="form-control-feedback text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                         
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">الجوال</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <input class="form-control" type="text" placeholder="الجوال" name="phone" value="{{$employee->phone}}" />
                                                    @error('phone')
                                                        <div class="form-control-feedback text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">الصلاحية</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead"> 
                                                    <select class="form-control" data-control="select2" data-placeholder="{{$employeeRole->name ?? ''}}" name="roles">
                                                        <option></option>
                                                        @foreach ($roles as $item)
                                                            <option value="{{$item->id}}" @if($item->id == $employeeRole->id ?? '') selected @endif>{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('roles')
                                                        <div class="form-control-feedback text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
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
 