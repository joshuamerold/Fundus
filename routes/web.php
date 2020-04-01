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
    return redirect('/home');
})->middleware('auth');



Route::get('/test', 'TestController@test');

Auth::routes();
Route::post('/register/create', 'Auth\RegisterController@registerNEW');

Route::get('/home', 'MainController@showContent')->middleware('auth');

//Lessonsthings
Route::get('/{lesson}/show/{zusammenfassung}', 'LessonController@showContent')->middleware('auth');
Route::get('/{lesson}/show/{altklausur}', 'LessonController@showContent')->middleware('auth');
Route::get('/{lesson}/show/{karteikarte}', 'LessonController@showContent')->middleware('auth');
Route::get('/{lesson}/show/', 'LessonController@showAllContent')->middleware('auth');
Route::get('/{lesson}/edit/show', 'LessonController@editForm')->middleware('auth');
Route::post('/{lesson}/edit/show/add', 'LessonController@edit')->middleware('auth');
Route::get('/{semester}/add/lesson', 'LessonController@show')->middleware('auth');
Route::post('/{semester}/add/lesson/create/{type}', 'LessonController@add')->middleware('auth');

//Modulethings
Route::get('/add/{semester}/module', 'ModuleController@show')->middleware('auth');
Route::post('/add/{semester}/module/create', 'ModuleController@add')->middleware('auth');
Route::get('/edit/module/{module}', 'ModuleController@editShow')->middleware('auth');
Route::post('/edit/module/{module}/store', 'ModuleController@edit')->middleware('auth');
Route::post('/delete/module/{module}', 'ModuleController@delete')->middleware('auth');


//Files Side
Route::get('/download/{file}', 'FileController@download')->middleware('auth');
Route::get('/{lesson}/add/File', 'FileController@add')->middleware('auth');
Route::post('/{lesson}/add/File/store', 'FileController@store')->middleware('auth');

Route::get('{type}/{lesson}/{file}/delete', 'FileController@destroy')->middleware('auth');

//Comments SQLiteDatabase
Route::get('/{lesson}/{file}/add/comment', 'CommentController@show')->middleware('auth');
Route::post('/{lesson}/{file}/add/comment/store', 'CommentController@store')->middleware('auth');

//Votes
Route::get('/{lesson}/{file}/add/comment/up', 'VoteController@up')->middleware('auth');
Route::get('/{lesson}/{file}/add/comment/down', 'VoteController@down')->middleware('auth');

//User Profile
Route::get('/profile/{username}', 'ProfileController@showProfile')->middleware('auth');
Route::post('/profile/{username}/update', 'ProfileController@updateProfile')->middleware('auth');

//Dates
Route::get('/add/date', 'DateController@show')->middleware('auth');
Route::post('/add/date/create', 'DateController@add')->middleware('auth');
Route::post('/{date}/delete', 'DateController@delete')->middleware('auth');

//rights
Route::post('/add/adminuser/{coursename}', 'MainController@add')->middleware('auth');
