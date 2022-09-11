@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="div1">
                        <div class="card-header create">{{ __('إنشاء حساب جديد') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name"
                                           class="uname col-md-4 col-form-label text-md-end">{{ __('الاسم') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="username form-control @error('name') is-invalid @enderror"
                                               name="name"
                                               value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="قم بادخال الاسم الخاص بك">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                           class="email col-md-4 col-form-label text-md-end">{{ __('البريد الالكتروني') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="email1 form-control @error('email') is-invalid @enderror"
                                               name="email"
                                               value="{{ old('email') }}" required autocomplete="email" placeholder="قم بادخال البريد الالكتروني ">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="mobile" for="mobile">رقم الجوال </label>
                                    <div class="col-md-6">
                                        <input class="mobile1" type="text" placeholder="قم بادخال رقم الجوال "
                                               name="mobile" >
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="bairthday" for="bairthday">تاريخ الميلاد</label>
                                    <div class="col-md-6">
                                        <input class="bairthday1" type="date" placeholder="قم بادخال تاريخ الميلاد"
                                               name="bairthday">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="Living" for="Living">السكن</label>
                                    <div class="col-md-6">
                                        <input class="Living1" type="text" placeholder="قم بادخال السكن" name="Living">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="gender" for="gender">الجنس</label>
                                    <div class="col-md-6">
                                        <input type="radio" name="gender" value="0" class="gendermale">
                                        <label for="html" class="Lgendermale">ذكر</label>
                                        <input type="radio" name="gender" value="1" class="genderfemale">
                                        <label for="html" class="Lgenderfemale">انثى</label></div>
                                </div>
                                <div class="row mb-3">
                                    <label class="Diseases" for="Diseases" >الأمراض المزمنة</label>
                                    <div class="col-md-6">
                                        <input class="Diseases1" type="text" placeholder="سكري ، ضغط ، قلب، سليم، .."
                                               name="Diseases">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password"
                                           class="pass col-md-4 col-form-label text-md-end">{{ __('كلمة المرور') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="pass1 form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="new-password" placeholder="قم بادخال كلمة المرور الخاص بك">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                           class="pass col-md-4 col-form-label text-md-end" style="margin-top:110px;">{{ __('تأكيد كلمة المرور') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class=" pass1 form-control"
                                               name="password_confirmation" required autocomplete="new-password" style="margin-top:110px;" placeholder="قم بتأكيد كلمة المرور الخاصة بك">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="submit btn btn-primary" style="margin-top:160px;">
                                            {{ __('انشاء الحساب') }}
                                        </button>
                                        <a href="http://127.0.0.1:8000/login" class="LoginBtn" style="margin-top:800px; background-color:#d9f9ff; height:40px; text-align: center; color: #15B7D7">تسجيل الدخول</a>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
