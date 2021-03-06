<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/userview', 'UserController@index')->name('userview');
Route::get('/listofforms', 'FormController@index')->name('listofforms');
Route::get('/userforms', 'UserFormController@index')->name('userforms');

Route::resource('user','UserController');
Route::resource('form','FormController');
Route::resource('userform','UserFormController');

