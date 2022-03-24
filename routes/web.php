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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('category/create','CategoryController@create');
Route::post('category/store','CategoryController@store');
Route::get('category/index','CategoryController@index')->name('c_index');
Route::get('category/edit/{id}','CategoryController@edit')->name('c_edit');
Route::post('category/update','CategoryController@update')->name('c_update');
Route::delete('category/delete','CategoryController@destroy')->name('c_delete');
