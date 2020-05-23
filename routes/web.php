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


Auth::routes();

Route::group(['middleware' => 'auth'], function (){

    Route::get('/create', 'CompanyController@create')->name('create');
    Route::get('/{id}', 'CommentController@show')->name('show');
    Route::post('/store', 'CompanyController@store')->name('company.store');
    Route::post('/comment/{id}', 'CommentController@store')->name('store');
    Route::delete('/delete/{id}', 'CommentController@destroy')->name('delete');
    Route::get('/markAsRead',function(){
        auth()->user()->unreadNotifications->markAsRead();
    });
});

Route::get('/', 'CompanyController@index')->name('home');


