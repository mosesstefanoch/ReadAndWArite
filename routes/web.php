<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcomepage');
});

Route::get('/updatestationary', function () {
    return abort(403);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/addstationary', 'HomeController@getstationary')->name('addstationary')->middleware('auth', 'role'); 
Route::post('/addstationary', 'HomeController@addstationary')->name('poststationary')->middleware('auth', 'role'); 

Route::get('/viewstationary/{id}', 'HomeController@getstationaryid')->name('viewstationary')->middleware('auth'); 
Route::get('/editstationary/{id}', 'HomeController@editstationaryid')->name('editstationary')->middleware('auth', 'role');
Route::post('/updatestationary', 'HomeController@updatestationaryid')->name('updatestationary')->middleware('auth', 'role'); 
Route::post('/deletestationary', 'HomeController@updatestationary')->name('deletestationary')->middleware('auth', 'role');

Route::get('/addtype', 'HomeController@gettype')->name('addtype')->middleware('auth', 'role');
Route::post('/addtype', 'HomeController@addtype')->name('posttype')->middleware('auth', 'role'); 

Route::get('/edittype', 'HomeController@gettype')->name('edittype')->middleware('auth', 'role'); 
Route::post('/edittype', 'HomeController@updatetype')->name('updatetype')->middleware('auth', 'role');