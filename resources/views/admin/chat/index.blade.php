@extends('admin.layout')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Subheader-->
	<div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
		<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap mr-1">
				<!--begin::Page Heading-->
				<div class="d-flex align-items-baseline flex-wrap mr-5">
					<!--begin::Page Title-->
					<h5 class="text-dark font-weight-bold my-1 mr-5">لوحة التحكم</h5>
					<!--end::Page Title-->
				</div>
				<!--end::Page Heading-->
			</div>
			<!--end::Info-->
			 
		</div>
	</div>
	<!--end::Subheader-->
	<!--begin::Entry-->
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Entry-->
		<div class="d-flex flex-column-fluid">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Chat-->
				<div class="d-flex flex-row">
					<!--begin::Aside-->
					<div class="flex-row-auto offcanvas-mobile w-350px w-xl-400px offcanvas-mobile-on" id="kt_chat_aside">
						<!--begin::Card-->
						<div class="card card-custom">
							<!--begin::Body-->
							<div class="card-body">
								<!--begin:Search-->
								<div class="input-group input-group-solid">
									<label for="" class="form-control flaticon-cogwheel-2 text-right mr-1">  حالة الإتصال  </label>
									<input data-switch="true" type="checkbox" @if($employee->connection_status == 1) checked="checked" @endif  data-on-color="primary" id="connection-switch" data-userid="{{$employee->id}}"/>
								</div>
								<!--end:Search-->

								<!--begin:Users-->
								<div class="mt-7 scroll scroll-pull ps ps__rtl ps--active-y" style="height: 578px; overflow: hidden;">
									@foreach ($users as $user)
										<a href="{{route('adm.chats.show', ['userid' => $user->id])}}" >
											<div class="d-flex align-items-center  mb-5">
												<div class="d-flex align-items-center">
													<div class="symbol symbol-circle symbol-50 mr-3">
														<img alt="Pic" src="{{ asset('admin/media/users/blank.png') }}">
													</div>
													<div class="d-flex flex-column">
														<a href="{{route('adm.chats.show', ['userid' => $user->id])}}" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg" style="text-align: right;margin-right: 15px;">{{$user->name}}</a>
														{{-- <span class="text-muted font-weight-bold font-size-sm">Head of Development</span> --}}
													</div>
												</div>
												{{-- <div class="d-flex flex-column align-items-end">
													<span class="text-muted font-weight-bold font-size-sm">7 hrs</span>
													<span class="label label-sm label-success">4</span>
												</div> --}}
											</div>
										</a>
									@endforeach
 
								<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 578px; right: 341px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 300px;"></div></div></div>
								<!--end:Users-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Card-->
					</div><div class="offcanvas-mobile-overlay"></div>
					<!--end::Aside-->
					<!--begin::Content-->
					<div class="flex-row-fluid ml-lg-8" id="kt_chat_content">
						@if (!Route::is('adm.chats.index'))
							<!--begin::Card-->
							<div class="card card-custom">
								{{-- <!--begin::Header-->
								<div class="card-header align-items-center px-4 py-3">
									<div class="text-right flex-grow-1">
										<!--begin::Dropdown Menu-->
										<div class="dropdown dropdown-inline">
											<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="svg-icon svg-icon-lg">
													<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Add-user.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24"></polygon>
															<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
															<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</button>
											<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-md">
												<!--begin::Navigation-->
												<ul class="navi navi-hover py-5">
													<li class="navi-item">
														<a href="#" class="navi-link">
															<span class="navi-icon">
																<i class="flaticon2-drop"></i>
															</span>
															<span class="navi-text">New Group</span>
														</a>
													</li>
													<li class="navi-item">
														<a href="#" class="navi-link">
															<span class="navi-icon">
																<i class="flaticon2-list-3"></i>
															</span>
															<span class="navi-text">Contacts</span>
														</a>
													</li>
													<li class="navi-item">
														<a href="#" class="navi-link">
															<span class="navi-icon">
																<i class="flaticon2-rocket-1"></i>
															</span>
															<span class="navi-text">Groups</span>
															<span class="navi-link-badge">
																<span class="label label-light-primary label-inline font-weight-bold">new</span>
															</span>
														</a>
													</li>
													<li class="navi-item">
														<a href="#" class="navi-link">
															<span class="navi-icon">
																<i class="flaticon2-bell-2"></i>
															</span>
															<span class="navi-text">Calls</span>
														</a>
													</li>
													<li class="navi-item">
														<a href="#" class="navi-link">
															<span class="navi-icon">
																<i class="flaticon2-gear"></i>
															</span>
															<span class="navi-text">Settings</span>
														</a>
													</li>
													<li class="navi-separator my-3"></li>
													<li class="navi-item">
														<a href="#" class="navi-link">
															<span class="navi-icon">
																<i class="flaticon2-magnifier-tool"></i>
															</span>
															<span class="navi-text">Help</span>
														</a>
													</li>
													<li class="navi-item">
														<a href="#" class="navi-link">
															<span class="navi-icon">
																<i class="flaticon2-bell-2"></i>
															</span>
															<span class="navi-text">Privacy</span>
															<span class="navi-link-badge">
																<span class="label label-light-danger label-rounded font-weight-bold">5</span>
															</span>
														</a>
													</li>
												</ul>
												<!--end::Navigation-->
											</div>
										</div>
										<!--end::Dropdown Menu-->
									</div>
								</div>
								<!--end::Header--> --}}
								<!--begin::Body-->
								<div class="card-body">
									<!--begin::Scroll-->
									<div class="scroll scroll-pull ps ps__rtl ps--active-y" data-mobile-height="350" style="height: 429px; overflow: hidden;">
										<!--begin::Messages-->
										<div class="messages">
											@foreach ($user_chat as $chat)
												@if($chat->sender == 'user')
													<!--begin::Message In-->
													<div class="d-flex flex-column mb-5 align-items-start">
														<div class="d-flex align-items-center">
															<div class="symbol symbol-circle symbol-35 mr-3">
																<img alt="Pic" src="{{ asset('admin/media/users/blank.png') }}">
															</div>
															<div>
																{{-- <a href="#" class="text-dark-75 text-hover-primary font-weight-bold ">{{$chat->user->name}}</a> --}}
																{{-- <span class="text-muted font-size-sm">2 Hours</span> --}}
															</div>
														</div>
														<div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">{{$chat->message}}</div>
													</div>
													<!--end::Message In-->
												@else
													<!--begin::Message Out-->
													<div class="d-flex flex-column mb-5 align-items-end">
														<div class="d-flex align-items-center">
															<div>
																{{-- <span class="text-muted font-size-sm">3 minutes</span> --}}
																{{-- <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a> --}}
															</div>
															<div class="symbol symbol-circle symbol-35 ml-3">
																<img alt="Pic" src="{{ asset('admin/media/users/blank.png') }}">
															</div>
														</div>
														<div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">{{$chat->message}}</div>
													</div>
													<!--end::Message Out-->
												@endif
											@endforeach
										</div>
										<!--end::Messages-->
									{{-- <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
										<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
									</div>
									<div class="ps__rail-y" style="top: 0px; height: 429px; right: 410px;">
										<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 180px;"></div>
									</div> --}}
								</div>
									<!--end::Scroll-->
								</div>
								<!--end::Body-->
								<!--begin::Footer-->
								<div class="card-footer align-items-center">
									<!--begin::Compose-->
									<textarea class="form-control border-0 p-0 input-msg" rows="2" placeholder="اكتب رسالة"></textarea>
									<div class="d-flex align-items-center justify-content-between mt-5">
										<div class="mr-3">
											{{-- <a href="#" class="btn btn-clean btn-icon btn-md mr-1">
												<i class="flaticon2-photograph icon-lg"></i>
											</a>
											<a href="#" class="btn btn-clean btn-icon btn-md">
												<i class="flaticon2-photo-camera icon-lg"></i>
											</a> --}}
										</div>
										<div>
											<button type="button" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6" data-userid="{{$user_chat[0]->user->id}}">ارسل</button>
										</div>
									</div>
									<!--begin::Compose-->
								</div>
								<!--end::Footer-->
							</div>
							<!--end::Card-->
						@else
						@endif
					</div>
					<!--end::Content-->
				</div>
				<!--end::Chat-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Entry-->
</div>
@endsection

@section('js')
<script src="{{ asset('website/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{asset('admin/js/pages/custom/chat/chat.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.js" data-turbolinks-track="true"></script>
    
	<script type="text/javascript"> 
	$( window ).load(function(){
		ajax_function();
		setInterval( function(){
			ajax_function();
		}, 5000);  
	});

	function ajax_function(){
		$.ajax({
			type: "POST",
			url: "{{route('adm.chats.update')}}",
			data:{
				userid: $('.chat-send').data('userid'),
				_token:"{{ csrf_token() }}",
			} ,
			success: function(html)
			{
				$.each(html.data, function(key, value){
					var html = '';
					html += '<div class="d-flex align-items-center">';
					html += '	<div>';
					// html += '		<span class="text-muted font-size-sm">2 Hours</span>';
					// html += '		<a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6"></a>';
					html += '	</div>';
					html += '	<div class="symbol symbol-circle symbol-40 ml-3">';
					html += '		<img alt="Pic" src="/admin/media/users/blank.png"/>';
					html += '	</div>';
					html += '</div>';
					html += '<div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">' + value.message  + '</div>';
					$(html).appendTo($('.messages'));
				})
			}
		}); 
	}
</script>

	<script>
	$('.chat-send').click( function(){
		let message = $('.input-msg').val();
		// alert(message)
		$.ajax({
			type: "POST",
			url: "{{route('adm.chats.addNew')}}",
			data:{
				message:message,
				userid: $(this).data('userid'),
				_token:"{{ csrf_token() }}",
			} ,
			success: function(html)
			{
				$('.input-msg').val(null);
			}
		}); 
	})
</script>


	{{-- bootstrap switch --}}
	<script>
		var KTBootstrapSwitch = function() {
			var demos = function() {
				$('[data-switch=true]').bootstrapSwitch();
			};
			return {
				init: function() {
					demos();
				},
			};
		}();
		jQuery(document).ready(function() {
			KTBootstrapSwitch.init();
		});
	</script>
	<script>
		$("#connection-switch").bootstrapSwitch({
			onSwitchChange: function(e, state) { 
				$.ajax({
					type: "POST",
					url: "{{route('adm.chats.change_status')}}",
					data:{
						userid: $(this).data('userid'),
						_token:"{{ csrf_token() }}",
					} ,
					success: function(html)
					{
						$('.input-msg').val(null);
					}
				}); 
			}
		});
	</script>
@endsection