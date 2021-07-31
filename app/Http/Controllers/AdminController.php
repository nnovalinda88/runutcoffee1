<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kuesioner;
use App\Models\NilaiKuesioner;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
      
        
            return view('admin.dashboard');
    }


    public function login(){
        return view('user.login');
    }
}
