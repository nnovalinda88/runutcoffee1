<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuesioner;
use App\Models\NilaiKuesioner;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }


    public function login(){
        return view('user.login');
    }
}
