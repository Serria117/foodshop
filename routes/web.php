<?php

use App\Http\Controllers\client\homeController;
use App\Http\Controllers\client\productController;
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
Route::namespace('client')->group(function(){
    Route::get('/', 'homeController@index')->name('home');
    Route::resource('sanpham', 'productController');
});

Route::prefix('admin')->group(function(){
    Route::get('/', 'adminController@index')->name('admin.dashboard');
});
