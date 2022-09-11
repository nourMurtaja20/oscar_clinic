@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img class="image" src="{{ asset('assets/images/image 1.png')}}">
                    <h2 class="Oscar">Oscar
                        <text style="color: #82C8E5;">Clinic</text>
                    </h2>
                    <div class="LoginBox">
                        <h3 class="header">تسجيل الدخول </h3><br><br>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email"
                                           class="uname col-md-6 col-form-label text-md-end">{{ __('الاسم') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="username form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-end pword">{{ __('كلمة المرور') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class=" password form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4" style="margin-top: 300px; text-align:left; margin-left:70px;">
                                        <div class="form-check">
                                            <input class=" form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class=" orm-check-input" for="remember" >
                                                {{ __('تذكرني') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="LoginBtn btn btn-primary">
                                            {{ __('تسجيل الدخول') }}
                                        </button>
                                        <a href="http://127.0.0.1:8000/register" class="LoginBtn" style="margin-top:60px; background-color:#d9f9ff; height:40px; text-align: center; color: #15B7D7">انشاء حساب </a>

                                        @if (Route::has('password.request'))
                                            <a class="rePassword btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('هل نسيت كلمة المرور?') }}
                                            </a>
                                        @endif
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
