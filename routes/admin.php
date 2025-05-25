<?php

use Illuminate\Support\Facades\Route;



Route::prefix('admin')->middleware(['admin.auth'])->group(function () {
    Route::controller('App\\Http\\Controllers\\Admin\\Auth\\LoginController')->group(function () {
        Route::get('/login', 'showLoginForm')->name('admin.login');
        Route::post('/login-form', 'login')->name('admin.login.submit');
        Route::post('/logout', 'logout')->name('admin.logout');
    });


    Route::controller('App\\Http\\Controllers\\Admin\\AdminController')->group(function () {
        Route::get('/', 'index')->name('admin.dashboard');
    });

    Route::controller('App\\Http\\Controllers\\Admin\\SettingController')
    ->prefix('settings')
    ->group(function () {
        Route::get('/', 'showSettings')->name('admin.settings');
        Route::get('/general-settings', 'showGeneralSettings')->name('admin.general.settings');
        Route::post('/update-general-settings', 'updateGeneralSettings')->name('admin.update.general.settings');
        Route::get('/email-settings', 'showEmailSettings')->name('admin.email.settings');
        Route::post('/update-email-settings', 'updateEmailSettings')->name('admin.update.email.settings');
    });

});
