<?php

use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function () {
    Route::controller('App\\Http\\Controllers\\Admin\\Auth\\LoginController')->group(function () {
        Route::get('/login', 'showLoginForm')->name('admin.login');
        Route::post('/loginform', 'login')->name('admin.login.submit');
        Route::post('/logout', 'logout')->name('admin.logout');
    });
    Route::get('/', function () {
        return view('backend.dashboard');
    })->middleware(['auth:admin'])->name('admin.dashboard');
});
