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
    return view('checkout');
});

Route::get('/test', 'TestController@test');

Auth::routes();

Route::get('/home', 'MainController@showContent')->middleware('auth');


Route::get('/lesson_{lesson}/show', 'LessonController@showContent')->middleware('auth');
