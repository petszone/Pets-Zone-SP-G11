<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class EmployeeLoginController extends Controller
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
    // protected $redirectTo = 'adm/chats';

    public function redirectTo() 
    {
        $role = auth()->guard('employee')->user()->roles->first()->id ?? 2; 
        switch ($role) {
          case 2:
            return 'adm/chats';
            break;
          case 3:
            return 'adm/appointments';
            break; 
      
          default:
            return 'adm/chats'; 
          break;
        }
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

    public function guard()
    {
        return Auth::guard('employee');
    }

    public function showLoginForm()
    {
        return view('admin.auth.employee_login');
    }
}
