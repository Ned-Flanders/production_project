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

Route::get('/log', function() {
    Auth::logout();
    Session::flush();

    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::namespace('Admin') -> prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::Resource('users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

Route::group(array('middleware' => array('can:manage-users')), function() {
    Route::Resource('admin', 'AdminController');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/security/flag', 'SecurityController@store')->name('security');
    Route::get('/security/csrf1', 'CsrfChallenge@index');
    Route::post('/security/csrf1/submit', 'CsrfChallenge@CheckAnswers')->name('csrf_1');

});
Route::get('/security', 'SecurityController@index');

Route::get('/leaderboard_users', 'SecurityController@leaderboard');
Route::get('/leaderboard', 'LeaderboardController@index');


Route::get('/contact', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');



