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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

/** Download File */
Route::get('/download', 'FileController@get')->name('download');

/** Import File */
Route::get('/import', 'FileController@create')->name('main-import');
Route::post('/import', 'FileController@post');

/** List Item */
Route::get('/list-{listid}', 'FileController@update')->name('main-list');
Route::post('/list-create', 'FileController@put'); 

/** Make Call */ 
Route::post('/make-call', 'Ami\CallController@index');
 