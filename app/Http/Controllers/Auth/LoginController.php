<?php

namespace App\Http\Controllers\admin\Auth;

use App\Http\Controllers\admin\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        if (auth()->user()->hasRole('jobseeker')) {
            return '/jobseeker/profile';
        }
        if (auth()->user()->hasRole('employer')) {
            return '/employer/profile';
        }
        if (auth()->user()->hasRole(['admin','super_admin'])) {
            return '/admin/dashboard';
        }
        return '/home';
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
