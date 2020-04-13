<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login-ui');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/list/create','HomeController@store')->name('lists.submit');
Route::get('/lists','HomeController@index')->name('lists.all');
Route::get('/lists/form','HomeController@create')->name('lists.form');
Route::put('/lists/{id}','HomeController@update')->name('lists.update');