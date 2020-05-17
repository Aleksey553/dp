<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/users', function (Request $request) {
//    return $request->user();
//});


Route::post('/login', 'Api\Auth\UserController@login');
Route::post('/register', 'Api\Auth\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('/logout', 'Api\Auth\UserController@logout');
});
