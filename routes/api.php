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

Route::group(['namespace' => 'Api', ['as' => 'apiPhoness']], function (){
    Route::get('/types/', 'ContentController@getTypes');
    Route::get('/marks/', 'ContentController@getMarks');
    Route::get('/models/', 'ContentController@getModels');
    Route::get('/categories/', 'ContentController@getCategories');
    Route::get('/services/', 'ContentController@getServices');
    Route::post('/orders/', 'ContentController@postOrder');
    Route::group(['namespace' => 'Auth'], function (){
        Route::post('/login', 'UserController@login');
        Route::post('/register', 'UserController@register');
        // Route::post('/logout', 'UserController@logout');
        Route::post('/refresh', 'UserController@refresh');
    });
});
Route::group(['namespace' => 'Api',['as' => 'apiPhone'] , 'middleware' =>['auth:api']], function (){
    Route::get('/p_types', 'ContentControllerPhone@getTypes');
    Route::get('/p_marks', 'ContentControllerPhone@getMarks');
    Route::get('/p_models', 'ContentController@getModels');
    Route::get('/p_categories', 'ContentController@getCategories');
    Route::get('/p_services', 'ContentController@getServices');
    Route::post('/p_orders', 'ContentController@postOrder');
    Route::get('user/', function (Request $request) {
        return $request->user();
    });
    Route::post('logout', 'Auth\UserController@logout');
    Route::get('/p_my_orders', 'ContentControllerPhone@getOrders');
});
// Route::group(['namespace' => 'Api', 'as' => ['api'], 'middleware' =>['auth:api']], function (){
//     // Route::get('/marks/', 'Api\ContentController@getMarks');
//
// });

Route::middleware('auth:api')->group(function () {




    // Route::get('posts', 'Api\PostController@index');
});


