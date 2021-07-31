<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/postlogin', 'App\Http\Controllers\AuthController@postlogin');

Route::get('/','App\Http\Controllers\UserSelectController@main');

Route::get('/dashboard','App\Http\Controllers\AdminController@dashboard')->name('dashboard');

Route::get('/users','App\Http\Controllers\UserController@index');



Route::get('/kuesioner/show/{kuesioner}', 'App\Http\Controllers\KuesionerController@show');

Route::get('/klasifikasi', 'App\Http\Controllers\HitungKuesionerController@klasifikasi');

Route::post('/kuesioner/store', 'App\Http\Controllers\KuesionerController@store');

Route::post('/kuesioner/update/{id}', 'App\Http\Controllers\KuesionerController@update');

Route::get('/kuesioner/edit/{id}', 'App\Http\Controllers\KuesionerController@edit');

Route::get('/kuesioner','App\Http\Controllers\KuesionerController@index');

Route::get('/hitungkuesioner','App\Http\Controllers\HitungKuesionerController@index');

Route::post('/hitungkuesioner/hitung','App\Http\Controllers\HitungKuesionerController@hitung');

Route::get('/kuesioner/create','App\Http\Controllers\KuesionerController@create');
Route::get('/kuesioner/createcus','App\Http\Controllers\CustomerController@create');

Route::get('/login','App\Http\Controllers\AuthController@showFormlogin')->name('login');


Route::get('/register','App\Http\Controllers\AuthController@showFormRegister');

Route::post('/register','App\Http\Controllers\AuthController@register');

Route::group(['middleware' => 'auth'], function () {
 
Route::get('/logout','App\Http\Controllers\AuthController@logout')->name('logout');
 
});

Route::post('/login','App\Http\Controllers\AuthController@login');

Route::get('/main','App\Http\Controllers\UserSelectController@main')->name('main');


Route::get('/customer','App\Http\Controllers\CustomerController@customer');

Route::post('/kuesioner/destroy/{id}', 'App\Http\Controllers\KuesionerController@destroy');

//Route::get('/kuesioner/create', 'KuesionerController@create')->name('kuesioner.create');
