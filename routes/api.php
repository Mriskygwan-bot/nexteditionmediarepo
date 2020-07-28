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

Route::get('/test','AuthController@test');

Route::post('/login','AuthController@login');

Route::post('/pages','PageController@getPages');
Route::post('/page','PageController@getPage');


Route::middleware('auth:api')->post('/authtest','AuthController@authTest');

Route::post('/media','MediaController@index');

Route::post('/mediatypes','MediaController@mediatypes');

Route::post('/media/create','MediaController@createMedia');

