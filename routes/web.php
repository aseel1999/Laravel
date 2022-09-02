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
//http://localhost:8000/welcome/to/laravel/
//MVC

Route::get('/home', '\App\Http\Controllers\HomeController@index')->name('dashboard-home');

Route::middleware('guest')->group(function () {
    Route::get('/admin-login', '\App\Http\Controllers\AdminController@showLogin')->name('admin-login');
    Route::post('/admin_log', '\App\Http\Controllers\AdminController@adminLogin')->name('dashboard_login');
});
Route::prefix('/dashboard')->middleware('auth:admin')->group(function () {
    Route::resource('/users','\App\Http\Controllers\UserController');
    Route::resource('/ministries','\App\Http\Controllers\MinistryController');
    Route::resource('/documents','\App\Http\Controllers\DocumentController');
    Route::resource('/ministry_documents','\App\Http\Controllers\MinistryDocumentController');
    Route::resource('/order_documents','\App\Http\Controllers\OrderDocumentController');
    Route::resource('/orders','\App\Http\Controllers\OrderController');
    Route::post('Search_documents', '\App\Http\Controllers\OrderController@Search_documents');
});



















//Request methods
//Route::get('/welcome/to/laravel','App/Http/Controllers/WelcomeController@welcome');//get and head
//Route::post();
//Route::put();
//Route::ptach();
//Route::delete();
//Route::options();

//other helper methods
//Route::view();
//Route::redirect();
//Route::resource();
//Route::apiResource();
//Route::group();