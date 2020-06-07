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


//Route::post('/register', 'Api\Auth\UserController@register');

Route::get('/', 'VueController@index')->name('main');
Route::get('/about', 'VueController@about')->name('about');
Route::get('/home', 'HomeController@index')->name('home')->middleware(['verified']);
Auth::routes(['verify' => true]);
Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'verified']], function(){
    Route::resource("/profile", 'ProfileController', ['except' => ['create', 'edit']]);
    Route::resource("/orders", 'UserOrdersController');

});
Route::group(['prefix' =>'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'verified', 'can:admin-panel']], function(){
    Route::get('/', 'DashboardController@index')->name('admin.index');
    Route::resource('/category', 'CategoryController',  ['as' => 'admin']);
    Route::resource('/services', 'ServiceController',  ['as' => 'admin']);
    Route::resource('/car_type', 'CarTypeController',  ['as' => 'admin']);
    Route::resource('/car_mark', 'CarMarkController',  ['as' => 'admin']);
    Route::resource('/car_model', 'CarModelController',  ['as' => 'admin']);
//    Route::resource('/car_category', 'CarCategoryController',  ['as' => 'admin']);

    Route::group(['prefix' =>'user_management', 'namespace' => 'UserManagment' ],function (){
        Route::resource('/user', 'UserController',  ['as' => 'admin.user_management']);
        Route::resource('/orders', 'OrdersController',  ['as' => 'admin.user_management']);
    });

});
