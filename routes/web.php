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
    return view('welcome');
});

//Todo
Route::get('/todo', 'TodoController@index');

Route::post('/todo', 'TodoController@update');

Route::delete('/todo/{todo}', 'TodoController@destroy');

//auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/game', 'GameController@index');

Route::post('/insert', 'GameController@insert');

Route::delete('/game/{id}', 'GameController@delete');

Route::get('/update_view/{id}', 'GameController@update_view');
Route::post('/update_view/{id}', 'GameController@update_view');
Route::post('/update/{id}', 'GameController@update');

//文章系統
Route::get('/','ArticleController@index');
Route::resource('article','ArticleController');

