@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="LoginBox" >
                <div class="header"style="width:200px; left:30%;" >{{ __('تغيير كلمة المرور') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" >
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class=" uname col-md-4 col-form-label text-md-end" style="width:200px;">{{ __('البريد الالكتروني') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class=" username form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="uname col-md-4 col-form-label text-md-end" style="width:200px; margin-top:120px;">{{ __('كلمة المرور') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class=" pass1 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style=" margin-top:-210px;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class=" uname col-md-4 col-form-label text-md-end" style="width:200px; margin-top:240px;">{{ __('تأكيد كلمة المرور') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class=" username form-control" name="password_confirmation" required autocomplete="new-password" style=" margin-top:240px; ">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class=" submit btn btn-primary" style="margin-top:-500px;">
                                    {{ __('تغيير كلمة المرور') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
