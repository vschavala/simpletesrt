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
Route::get('users', 'UserController@index')->name('users.index');
Route::post('usercommen','UserController@commentSave')->name('usercomment.post');

Route::get('thanks-recievers', 'UserController@thanksRecievers')->name('thanks.recievers');
Route::get('thanks-senders', 'UserController@thanksSenders')->name('thanks.senders');

Route::get('latest-activity', 'UserController@latestActivity')->name('latest.activity');
Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');