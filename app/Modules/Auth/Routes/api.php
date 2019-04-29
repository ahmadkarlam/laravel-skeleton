<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
	Route::group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function () {
	    Route::post('login', 'LoginController@login');
	    
		Route::group(['middleware' => 'auth:api'], function () {
	    	Route::post('logout', 'LoginController@logout');
		});
	});
});
