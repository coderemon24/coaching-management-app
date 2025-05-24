<?php

use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function () {
    Route::controller('App\\Http\\Controllers\\Admin\\Auth\\LoginController')->group(function () {
        Route::get('/login', 'showLoginForm')->name('admin.login');
        Route::post('/login-form', 'login')->name('admin.login.submit');
        Route::post('/logout', 'logout')->name('admin.logout');
    });
    Route::get('/', function () {
        return view('backend.dashboard');
    })->middleware(['admin.auth'])->name('admin.dashboard');
});
