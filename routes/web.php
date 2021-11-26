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

Route::get('/admin', 'UserController@show');


Route::get('/posts/create', 'PostController@create');
Route::post('/posts' , 'PostController@store');

//CATEGORY
Route::post('/categories' , 'CategoryController@store');
Route::get('/categories/create', 'CategoryController@create');
Route::get('/categories/index', 'CategoryController@index');

