<?php
/**
 * Copyright (c) 2018.
 * sanjay kranthi  kranthi0987@gmail.com
 */

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::resource('products', 'ProductsController');
Route::get('/products', 'ProductsController@index');
Route::get('/products/create-step1', 'ProductsController@createStep1');
Route::post('/products/create-step1', 'ProductsController@postCreateStep1');
Route::get('/products/create-step2', 'ProductsController@createStep2');
Route::post('/products/create-step2', 'ProductsController@postCreateStep2');
Route::post('/products/remove-image', 'ProductsController@removeImage');
Route::get('/products/create-step3', 'ProductsController@createStep3');
Route::post('/products/store', 'ProductsController@store');
Route::get('/viewproduct/{id}', 'ProductsController@viewproduct');
