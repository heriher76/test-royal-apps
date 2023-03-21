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

Route::group(['namespace' => 'App\Http\Controllers'], function(){
    Route::group(['middleware' => 'check-session'], function(){
        Route::get('/', 'HomeController@index');
        Route::get('/profile', 'HomeController@profile');
        
        Route::get('/authors/{id}', 'AuthorController@show');
        Route::get('/authors/{id}/delete', 'AuthorController@destroy');

        Route::get('/books/create', 'BookController@create');
        Route::post('/books', 'BookController@store');
        Route::get('/books/{id}/delete', 'BookController@destroy');
    });
    Route::get('/login', 'AuthController@index');
    Route::post('/login', 'AuthController@login');
    Route::get('/logout', 'AuthController@logout');
});
