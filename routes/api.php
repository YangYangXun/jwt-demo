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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'prefix' => 'auth',

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group([

    'prefix' => 'admin',

], function ($router) {

    Route::post('login', 'AdminController@loginAdmin');
    Route::post('logout', 'AdminController@logoutAdmin');
    // Route::post('refresh', 'AdminController@refresh');
    Route::post('me', 'AdminController@meAdmin')->middleware('admin');

});
