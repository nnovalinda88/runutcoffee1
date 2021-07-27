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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard','App\Http\Controllers\AdminController@dashboard');

Route::get('/users','App\Http\Controllers\UserController@index');



Route::get('/kuesioner/show/{kuesioner}', 'App\Http\Controllers\HitungKuesionerController@show');

Route::get('/klasifikasi', 'App\Http\Controllers\HitungKuesionerController@klasifikasi');
//
Route::post('/kuesioner/store', 'App\Http\Controllers\KuesionerController@store');

Route::post('/kuesioner/update/{id}', 'App\Http\Controllers\KuesionerController@update');

Route::get('/kuesioner/edit/{kuesioner}', 'App\Http\Controllers\KuesionerController@edit');

Route::get('/kuesioner','App\Http\Controllers\KuesionerController@index');

Route::get('/hitungkuesioner','App\Http\Controllers\HitungKuesionerController@index');

Route::post('/hitungkuesioner/hitung','App\Http\Controllers\HitungKuesionerController@hitung');

Route::get('/kuesioner/create','App\Http\Controllers\KuesionerController@create');


Route::post('/kuesioner/destroy/{id}', 'App\Http\Controllers\KuesionerController@destroy');

//Route::get('/kuesioner/create', 'KuesionerController@create')->name('kuesioner.create');
