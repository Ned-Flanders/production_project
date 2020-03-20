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
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::namespace('Admin') -> prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::Resource('users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

Route::group(array('middleware' => array('can:manage-users')), function() {
    Route::Resource('admin', 'AdminController');
});


Route::get('/contact', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');

Route::get('/security', 'SecurityController@index');
