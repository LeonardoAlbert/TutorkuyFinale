<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\userOwner;
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

Route::get('/home', 'UserController@show'); 

//ADMIN
Route::get('/admin', 'AdminController@index');
Route::get('/admin/managepayment', 'AdminController@managepayment');
Route::get('/admin/{order}/managepaymentdetails', 'AdminController@details');

//POST
Route::get('/posts/{post}/details', 'PostController@details');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::put('/posts/{post}', 'PostController@update');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts' , 'PostController@store');
Route::delete('/posts/{post}', 'PostController@destroy');

//CATEGORY
Route::post('/categories' , 'CategoryController@store');
Route::get('/categories/create', 'CategoryController@create');
Route::get('/categories/index', 'CategoryController@index');
Route::get('/categories/{category}', 'CategoryController@show');

//USER
Route::get('/users/{user}/edit', 'UserController@edit')->middleware(userOwner::class);;
Route::put('/users/{user}', 'UserController@update')->middleware(userOwner::class);;
Route::get('/users/{user}', 'UserController@show');
Route::get('/users/{user}/review', 'UserController@review');
Route::post('/users/review/submit', 'UserController@reviewsubmit');
//ORDER
Route::get('/orders/{post}/create', 'OrderController@create');

Route::get('/orders/{order}/details', 'OrderController@details');
Route::post('/orders', 'OrderController@store');
Route::post('/orders/accepted', 'OrderController@accepted');
Route::post('/orders/ended', 'OrderController@ended');
Route::get('/orders/history', 'OrderController@history');
Route::post('/orders/declined', 'OrderController@declined');

