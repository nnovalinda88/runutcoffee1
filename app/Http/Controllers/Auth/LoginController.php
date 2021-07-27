<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers; 
use Auth;
use Hash;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function login() 
    {
        return view('auth.login');
    }

  

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

     public function showLoginForm()
    {
        return view('admin.auth.login');
    }
}
