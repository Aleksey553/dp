<?php

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
Route::get('/home', 'HomeController@index')->name('home')->middleware([]);
Auth::routes(['verify' => true]);
Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'verified']], function(){
    Route::get("/{user}", 'ProfileController@index')->name('user.index');
    Route::get("/{user}/edit", 'ProfileController@edit')->name('user.edit');
    Route::put("/{user}", 'ProfileController@update');
});
Route::group(['prefix' =>'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'can:admin-panel']], function(){
    Route::get('/', 'DashboardController@index')->name('admin.index');
    Route::resource('/category', 'CategoryController',  ['as' => 'admin']);
    Route::resource('/services', 'ServiceController',  ['as' => 'admin']);
    Route::resource('/car_category', 'CarCategoryController',  ['as' => 'admin']);

    Route::group(['prefix' =>'user_management', 'namespace' => 'UserManagment' ],function (){
        Route::resource('/user', 'UserController',  ['as' => 'admin.user_management']);
    });

});
