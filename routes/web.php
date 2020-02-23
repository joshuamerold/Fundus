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
Route::post('/register/create', 'Auth\RegisterController@registerNEW');

Route::get('/home', 'MainController@showContent')->middleware('auth');

Route::get('/lesson_{lesson}/show', 'LessonController@showContent')->middleware('auth');


Route::get('/add/lesson', 'LessonController@show')->middleware('auth');

Route::post('/add/lesson/create', 'LessonController@add')->middleware('auth');



Route::get('/add/module', function() {
  return view('forms.addModule');
})->middleware('auth');

Route::post('/add/module/create', 'ModuleController@add')->middleware('auth');
