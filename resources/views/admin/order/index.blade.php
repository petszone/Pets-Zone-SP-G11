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
            <!--begin::Container-->
            <div class="container">
                <!--begin::Example-->
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">الطلبات</h3>
                        </div>
                        <div class="card-toolbar">

                        </div>
                    </div>
                    <div class="card card-custom">
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable_2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم المستخدم</th>
                                        <th>حالة الطلب</th>
                                        <th>إجمالي السعر</th>
                                        <th>تاريخ الإنشاء</th>
                                        <th>الأدوات</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    @foreach ($orders as $key=>$item)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$item->user->fullname}}</td>
                                            <td>{{__('general.' . $item->statuspayment)}}</td>
                                            <td>{{$item->total}} ريال</td>
                                            <td>{{$item->created_at}}</td>
                                            <td data-field="Actions" data-autohide-disabled="false" aria-label="null" class="datatable-cell">
                                                <span style="overflow: visible; position: relative; width: 125px;">
                                                    <a href="{{route('adm.order.show', ['id' => $item->id])}}" class="btn btn-sm btn-clean btn-icon mr-2" title="show details">
                                                        <span class="svg-icon svg-icon-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                            </g>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end: Datatable-->
                            <div class="datatable-pager datatable-paging-loaded">
                                 
                            </div>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Card-->
                <!--end::Example-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection
 
@section('js')
    <script src="{{asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
    {{-- <script src="{{asset('assets/js/pages/features/datatables/basic/basic.js')}}"></script> --}}
    <script>
        "use strict";
        var KTDatatablesBasicBasic = function() {
            var initTable2 = function() {
                var table = $('#kt_datatable_2');
                // begin first table
                table.DataTable({
                    responsive: true,
                    lengthMenu: [5, 10, 25, 50],
                    pageLength: 10,
                    language: {
                        'lengthMenu': 'Display _MENU_',
                    },
                    // Order settings
                    order: [[1, 'desc']],
                    searching: false,
                    "bPaginate": false,
                    "ordering": false,
                });
            };
            return {
                //main function to initiate the module
                init: function() {
                    initTable2();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTDatatablesBasicBasic.init();
        });
    </script>
    <script>
        $(".deleteRecord").click(function(e){
            e.preventDefault();
            let answer = window.confirm('هل أنت متأكد من عملية الحذف؟');
            let id = $(this).data("id");
            let url = "{{route('adm.product.destroy', ['ID'])}}";
            var $tr = $(this).closest('tr');
            if (answer)
            {
            $.ajax({
                type:"POST",
                url: url.replace('ID', id),
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
                    swal("تم الحذف بنجاح", "", "success");
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