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
                                          انشاء صلاحية جديدة
                                    </h3>
                                </div>
                                <form class="form form-horizontal" action="{{route('adm.roles.store')}}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">الإسم</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div class="typeahead">
                                                    <input class="form-control" type="text" placeholder="الاسم" name="name" value="{{old('name')}}"/>
                                                    @error('name')
                                                        <div class="form-control-feedback text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5">
                                            <thead>
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                    <th>الدومين</th>
                                                    <th>قراءة</th>
                                                    <th>انشاء</th>
                                                    <th>تعديل</th>
                                                    <th>حذف</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-600 fw-semibold">
                                                @foreach ($permissions as $item) 
                                                    <tr style="border-top: 1px solid #EBEDF3;">
                                                        <td>{{__('general.' . $item->first()->parent)}}</td>
                                                        @foreach ($item as $key=>$value)
                                                            <td>
                                                                <div class="form-check form-check-custom form-check-success form-check-solid keep-sign">
                                                                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{$value->id}}">
                                                                    {{-- <label class="form-check-label" for="" style="margin-right: 17px;">
                                                                        {{$value->name_key }}
                                                                    </label> --}}
                                                                </div>
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @error('permission')
                                            <div class="form-control-feedback text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
 