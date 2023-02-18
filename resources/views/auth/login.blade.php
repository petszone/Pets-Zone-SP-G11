@extends('website.layout')

@section('content')

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area ptb-60 ptb-sm-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">الرئيسية</a></li>
                        <li class="active"><a href="#">تسجيل الدخول</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- LogIn Page Start -->
        <div class="log-in pb-60">
            <div class="container">
                <div class="row">
                    <!-- Returning Customer Start -->
                    <div class="col-sm-6">
                        <div class="well">
                            <div class="return-customer">
                                <h3 class="mb-10">تسجيل الدخول</h3>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label">أدخل إيميلك هنا...</label>
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="أدخل إيميلك هنا..." id="input-email" class="form-control">
                                        @error('email')
                                            <span  class="text-danger"  role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">كلمة المرور</label>
                                        <input type="password" name="password" placeholder="كلمة المرور" id="input-password" class="form-control">
                                        @error('password')
                                            <span  class="text-danger"  role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group">
                                        <input class="form-control" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="control-label" for="remember">
                                            تذكرني
                                        </label>
                                    </div> --}}
                                    <p class="lost-password"><a href="{{route('password.request')}}">نسيت كلمة المرور؟</a></p>
                                    <input type="submit" value="تسجيل دخول" class="return-customer-btn">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Returning Customer End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- LogIn Page End -->
@endsection
