<?php
/**
 * Copyright (c) 2019.
 * sanjay kranthi  kranthi0987@gmail.com
 */

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
Route::group(
/**
 *
 */
    [
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('signup', 'Api\AuthController@signup');
    Route::get('signup/activate/{token}', 'Api\AuthController@signupActivate');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'Api\AuthController@logout');
        Route::get('user', 'Api\AuthController@user');
        Route::post('updateUser', 'Api\AuthController@updateUserAccount');
        Route::post('updateavatar', 'Api\AuthController@update_avatar');
        Route::get('products', 'Api\ProductsApiController@index');
    });
});

Route::group(/**
 *
 */
    [
    'middleware' => 'api'
], function () {


});
Route::group(/**
 *
 */
    [
//    'namespace' => 'Auth',
//    'middleware' => 'api',
    'prefix' => 'password'
], function () {
    Route::post('create', 'Api\PasswordResetController@create');
    Route::get('find/{token}', 'Api\PasswordResetController@find');
    Route::post('reset', 'Api\PasswordResetController@reset');
});

//Route::group(
///**
// *
// */
//    [
//        'middleware' => 'auth:api'
//], function () {
//
//
//});

//Route::group(['middleware' => 'api']
Route::resource('images', 'Api\ImageApiController');
Route::resource('devicemgmt', 'Api\DeviceRegistrationController');
