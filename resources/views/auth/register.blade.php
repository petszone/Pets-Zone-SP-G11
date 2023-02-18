@extends('website.layout')

@section('content')

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area ptb-60 ptb-sm-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">الرئيسية</a></li>
                        <li class="active"><a href="#">تسجيل جديد</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Register Account Start -->
        <div class="register-account pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="register-title">
                            <h3 class="mb-10">تسجيل مستخدم جديد</h3>
                            {{-- <p class="mb-10">If you already have an account with us, please login at the login page.</p> --}}
                        </div>
                    </div>
                </div>
                <!-- Row End -->
                <div class="row">
                    <div class="col-sm-12">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            @csrf
                            <fieldset>
                                <legend>بياناتك الشخصية</legend>
                                <div class="form-group">
                                    <label class="control-label" for="f-name"><span class="require">*</span>الإسم الأول</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="f-name" name="firstname" placeholder="الإسم الأول" value="{{ old('firstname') }}">
                                        @error('firstname')
                                            <span  class="text-danger"  role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="l-name"><span class="require">*</span>الإسم الأخير</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="l-name" name="lastname"  placeholder="الإسم الأخير" value="{{ old('lastname') }}">
                                        @error('lastname')
                                            <span  class="text-danger"  role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="email"><span class="require">*</span>أدخل إيميلك هنا</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="أدخل إيميلك هنا" value="{{ old('email') }}">
                                        @error('email')
                                            <span  class="text-danger"  role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="number"><span class="require">*</span>جوال</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="number" name="telephone" value="{{ old('telephone') }}" placeholder="جوال" maxlength="10">
                                        @error('telephone')
                                            <span  class="text-danger"  role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>كلمةالمرور</legend>
                                <div class="form-group">
                                    <label class="control-label" for="pwd"><span class="require">*</span>كلمة المرور:</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="pwd" placeholder="كلمة المرور">
                                        @error('password')
                                            <span  class="text-danger"  role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="pwd-confirm"><span class="require">*</span>تأكيد كلمة المرور</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password_confirmation" id="pwd-confirm" placeholder="تأكيد كلمة المرور">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="buttons newsletter-input">
                                <div class="pull-right">
                                    <input type="submit" value="تسجيل" class="newsletter-btn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Register Account End -->
@endsection
