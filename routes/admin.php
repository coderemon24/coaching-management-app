<?php

use Illuminate\Support\Facades\Route;


# admin/*
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
    # admin/settings/*
    ->prefix('settings')
    ->group(function () {
        Route::get('/', 'showSettings')->name('admin.settings');
        # general settings
        Route::get('/general-settings', 'showGeneralSettings')->name('admin.general.settings');
        Route::post('/update-general-settings', 'updateGeneralSettings')->name('admin.update.general.settings');
        # email settings
        Route::get('/email-settings', 'showEmailSettings')->name('admin.email.settings');
        Route::post('/update-email-settings', 'updateEmailSettings')->name('admin.update.email.settings');
        # email templates
        Route::get('/email-templates', 'showEmailTemplates')->name('admin.email.templates');
        Route::post('/store/email-template', 'storeEmailTemplate')->name('admin.store.email.template');
        Route::get('/edit/email-template/{id}', 'editEmailTemplate')->name('admin.edit.email.template');
        Route::post('/update/email-template', 'updateEmailTemplate')->name('admin.update.email.template');
        Route::post('/delete/email-template', 'deleteEmailTemplate')->name('admin.delete.email.template');

    });


});
