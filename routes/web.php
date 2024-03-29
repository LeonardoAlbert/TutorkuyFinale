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

// Route::get('/', function () {

//     return view('welcome');
// });

Auth::routes();
Route::get('/', 'UserController@home');
Route::get('/home', 'UserController@home');

//TUTOR VERIFICATION
Route::get('/verif/{user}', 'TutorVerificationController@verif');
Route::post('/verif', 'TutorVerificationController@store');
Route::get('/createverif', 'TutorVerificationController@create');

//ADMIN
Route::get('/admin', 'AdminController@index');
Route::get('/admin/managepayment', 'AdminController@managepayment');
Route::get('/admin/manageverif', 'AdminController@manageverif');
Route::get('/admin/managecategory', 'AdminController@managecategory');
Route::get('/admin/manageexistingcategory', 'AdminController@manageexistingcategory');

Route::get('/admin/managetutorspayment', 'AdminController@managetutorspayment');


Route::get('/admin/{category}/managecategorydetails', 'AdminController@categorydetails');

Route::get('/admin/{user}/manageverifdetails', 'AdminController@verifdetails');
Route::get('/admin/{user}/verifdownload', 'AdminController@verifdownload')->name('verif.download');
Route::get('/admin/{order}/categorydownload', 'AdminController@paymentdownload')->name('payment.download');
Route::get('/admin/{order}/managepaymentdetails', 'AdminController@details');

//POST
Route::get('/posts/{post}/details', 'PostController@details');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::put('/posts', 'PostController@update');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts' , 'PostController@store');
Route::delete('/posts/{post}', 'PostController@destroy');
Route::get('/posts/{post}/createlinkmeeting', 'PostController@createlinkmeeting');
Route::post('/posts/linkmeeting', 'PostController@linkmeeting');
Route::post('/posts/uploadmaterial', 'PostController@uploadmaterial');
Route::get('/posts/{post}/materialdownload', 'PostController@materialdownload')->name('material.download');
Route::post('/posts/transfered' , 'PostController@transfered');


//CATEGORY
Route::post('/categories' , 'CategoryController@store');
Route::post('/categories/request' , 'CategoryController@requeststore');
Route::post('/categories/accepted' , 'CategoryController@accepted');
Route::post('/categories/declined' , 'CategoryController@declined');
Route::get('/categories/create', 'CategoryController@create');
Route::get('/categories/index', 'CategoryController@index');
Route::get('/categories/{category}', 'CategoryController@show');

//USER
Route::get('/users/requestcategory', 'UserController@requestcategory')->middleware('auth');
Route::get('/users/upcomingclass', 'UserController@upcomingClass')->middleware('auth');
Route::get('/users/pastclass', 'UserController@pastClass')->middleware('auth');
Route::get('/users/tutorclass', 'UserController@tutorClass')->middleware('auth');
Route::get('/users/tutorupcomingclass', 'UserController@upcomingClassTutor')->middleware('auth');
Route::get('/users/{user}/edit', 'UserController@edit')->middleware(userOwner::class);;
Route::put('/users/{user}', 'UserController@update')->middleware(userOwner::class);;
Route::get('/users/{user}', 'UserController@show');
Route::get('/users/createverify', 'UserController@createverify');
Route::get('/users/{user}/review/{post}', 'UserController@review');

Route::get('/listoftutors', 'UserController@listoftutors');

Route::post('/users/review/submit', 'UserController@reviewsubmit');
Route::post('/users/verifaccepted', 'UserController@verifaccepted');
Route::post('/users/verifdeclined', 'UserController@verifdeclined');

//ORDER
Route::get('/orders/{post}/create/{schedule}', 'OrderController@create')->middleware('auth');
Route::get('/orders/{post}/create', 'OrderController@createNew')->middleware('auth');

Route::get('/orders/{order}/details', 'OrderController@details');
Route::get('/orders/{post}/tutor/details', 'OrderController@tutorDetails');
Route::post('/orders', 'OrderController@store');
Route::post('/orders/accepted', 'OrderController@accepted');
Route::post('/orders/ended', 'OrderController@ended');
Route::get('/orders/history', 'OrderController@history')->middleware('auth');
Route::post('/orders/declined', 'OrderController@declined');
Route::post('/orders/uploadmaterial', 'OrderController@uploadmaterial');
// Route::get('/orders/{order}/materialdownload', 'OrderController@materialdownload')->name('material.download');

//MAILING

Route::get('/kirim-email','MailController@index');

// CHAT

Route::get('/chat', 'ChatController@index')->middleware('auth');
Route::get('/chat/user/{user}', 'ChatController@selectedUser')->middleware('auth');
Route::get('/chat/{room}', 'ChatController@index')->middleware('auth');
Route::post('/chat', 'ChatController@store');
Route::post('/chat/newRoom', 'ChatController@newRoom')->middleware('auth');
