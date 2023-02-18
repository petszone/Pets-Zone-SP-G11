@extends('website.layout')

@section('content')

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area ptb-60 ptb-sm-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">الرئيسية</a></li>
                        <li class="active"><a href="#">استرجاع كلمة المرور</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->

        <div class="register-account pb-20">
            <div class="container">
                <div class="register-title" style="text-align: center">
                    <h3 class="mb-10">استرجاع كلمة المرور</h3>
                    <p class="mb-10">إذا كنت تمتلك حساب لدينا، أدخل البريد الإلكتروني الخاص بك</p>
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-horizontal pb-100" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <fieldset>
                        <div class="row form-group mt-5">
                            <div class="col-2"></div>
                            <div class="col-8">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required placeholder="البريد الإلكتروني">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <div class="buttons newsletter-input">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="return-customer-btn mr-20">إرسال</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Container End -->
        </div>
@endsection
