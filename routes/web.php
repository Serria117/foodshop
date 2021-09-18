<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminLoginController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\homeController;

/*
|-------------------------------------------------------------------------|
|                               Web Routes                                |
|-------------------------------------------------------------------------|
|
*/
Route::get('/', [homeController::class, 'index'])->name('home');

Route::group(['prefix'=>'sanpham'], function(){
    Route::get('/', [shopController::class, 'index'])->name('sanpham');
    Route::get('chitiet/{id}', 'shopController@detail')->name('chitiet');
});

Route::group(['prefix'=>'admin'], function(){
    Route::get('login', [adminLoginController::class, 'index'])->name('login');
    Route::middleware('auth')->group(function(){
        Route::post('login/store', [adminLoginController::class, 'store'])->name('admin.store');
        Route::get('/', [adminController::class, 'index'])->name('admin.dashboard');
    });
});
