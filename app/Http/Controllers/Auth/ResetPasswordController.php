<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected function redirectTo()
    {
        if(Auth::user()->status=='0'){
            return '/Doctor/home';
        }elseif (Auth::user()->status=='1'){
            return '/Reciption/home';
        }elseif (Auth::user()->status=='2'){
            return '/patientProfile';
        }elseif (Auth::user()->status=='3') {
            return '/admin/home';
        }else{
            RouteServiceProvider::HOME;
        }
    }
}
