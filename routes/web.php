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

Route::get('about','pagesController@about');
Route::get('songs','SongsController@index');
Route::resource('songs','SongsController');
Route::resource('todo','todocontroller');






Route::get('/lesson', 'indexController@test');
Route::get('/lessonss', 'index1Controller@index1');
Route::get('/delete/{id}',
['uses' => 'IndexController@delete']);

//Route::post('/selected',
//    ['uses' => 'indexController@selected']);
//
//Route::get('/deletechecked',
//    ['uses' => 'IndexController@deletechecked']);

Route::post('/change',
['uses' => 'IndexController@change']);

Route::post('/add',
    ['uses' => 'indexController@add']);

//Route::get('/permission',
//    ['uses' => 'AjaxController@permission']);





