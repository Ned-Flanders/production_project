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

Route::view('/home', 'home');

Auth::routes(['verify' => true]);

Route::namespace('Admin') -> prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::Resource('users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

Route::group(array('middleware' => array('can:manage-users')), function() {
    Route::Resource('admin', 'AdminController');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/submitflags', 'FlagController@index')->name('SubmitFlag');
    Route::post('/submmitflags/submit', 'FlagController@submitFlags')->name('flag');
    Route::get('/security/csrf1', 'CsrfChallengeController@index');
    Route::post('/submitanswers', 'CheckAnswersController@checkAnswers')->name('check_answers');
});

Route::view('/security', 'security');
Route::view('/security/csrf1', 'csrf1');

Route::get('/leaderboard_users', 'LeaderboardController@leaderboard');
Route::get('/leaderboard', 'LeaderboardController@index');


Route::get('/contact', 'SendEmailController@index')->name('contact');
Route::post('/sendemail/send', 'SendEmailController@send');



