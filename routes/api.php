<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/lists/create','Api\ListsApiController@store')->name('api.lists.submit');
Route::get('/lists','Api\ListsApiController@index')->name('lists.index');
Route::get('/lists/{id}','Api\ListsApiController@show')->name('lists.api.show');
Route::put('/lists/{id}','Api\ListsApiController@store')->name('lists.api.update');
Route::delete('/lists/{id}','Api\ListsApiController@destroy')->name('lists.api.delete');