@extends('layouts.app')

@section('content')
<div class="container" style="background-color:white;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="LoginBox" style="height:350px;" >
                <div class="header" style="width:200px; left:30%;" >{{ __('تغيير كلمة المرور') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class=" uname col-md-4 col-form-label text-md-end" style="width:200px;">{{ __('البريد الالكتروني') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class=" username form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="LoginBtn btn btn-primary" style="margin-top:-170px;">
                                    {{ __('ارسال') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img class="image" src="{{ asset('assets/images/image 1.png')}}">
                    <h2 class="Oscar">Oscar
                        <text style="color: #82C8E5;">Clinic</text>
                    </h2>
                    <div class="LoginBox">
                        <h3 class="header" style="width:150px;">{{ __('تغيير كلمة المرور') }}</h3><br><br>

                        <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email"
                                           class="uname col-md-6 col-form-label text-md-end" style="width:200px">{{ __('البريد الالكتروني') }}</label>

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
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="LoginBtn btn btn-primary" style="margin-top:-170px;">
                                            {{ __('ارسال') }} 
                                        </button>

                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection
