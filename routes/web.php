<?php

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
    return view('auth.login');
});

Route::get('/404', function () {
    return view('Error.404');
})->name('error.404');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'Client\DashboardController@index')->name('home')->middleware('auth');;
Route::get('/dashboard', 'Client\DashboardController@index')->name('client.dashboard')->middleware('auth');;
Route::get('/profile', 'Client\DashboardController@profile')->name('client.dashboard-profile')->middleware('auth');;
Route::get('/request-collector', 'Client\DashboardController@requestCollector')->name('client.requestCollector')->middleware('auth');

Route::get('/logout', 'Auth\LoginController@logout')->name('auth.logout')->middleware('auth');

Route::get('/transaction-simulator', 'Client\DashboardController@simulator')->name('client.transaction-simulator')->middleware('guest');;
