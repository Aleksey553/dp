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

Route::group(['namespace' => 'Api'], function (){
    Route::get('/types/', 'ContentController@getTypes');
    Route::get('/marks/', 'ContentController@getMarks');
    Route::get('/models/', 'ContentController@getModels');
    Route::get('/categories/', 'ContentController@getCategories');
    Route::get('/services/', 'ContentController@getServices');
    Route::post('/orders/', 'ContentController@postOrder');
    Route::group(['namespace' => 'Auth'], function (){
        Route::post('/login', 'UserController@login');
        Route::post('/register', 'UserController@register');
    });
});



