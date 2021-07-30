<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showFormLogin()
    { 
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
        //Login Success
        return redirect()->route('dashboard');
    }
        return view('auths.login');
    }
   
    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];
  
        $messages = [
            'email.required'        => 'Email is required',
            'email.email'           => 'Email is invalid',
            'password.required'     => 'Password is required',
            'password.string'       => 'Password needs to be string'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
  
        Auth::attempt($data);
  
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('dashboard');
  
        } else { // false
  
            //Login Fail
//Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
  
    }
  
    public function showFormRegister()
    {
        return view('auths.register');
    }
  
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];
  
        $messages = [
            'name.required'         => 'Nama Lengkap is required',
            'name.min'              => 'Nama lengkap min 3 characters',
            'name.max'              => 'Nama lengkap max 35 characters',
            'email.required'        => 'Email is required',
            'email.email'           => 'Email is invalid',
            'email.unique'          => 'Email is already exist',
            'password.required'     => 'Password is required',
            'password.confirmed'    => 'Password doesnt match the confirmed pass'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();
  
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
  
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}
