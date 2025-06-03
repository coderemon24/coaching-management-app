<?php

use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;


# admin/*
Route::prefix('admin')->middleware(['admin.auth', 'admin.lang'])->group(function () {
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
        Route::get('/edit/email-template/{id}', 'editEmailTemplate')->name('admin.edit.email.template');
        Route::patch('/update/email-template', 'updateEmailTemplate')->name('admin.update.email.template');
        # contact infos
        Route::get('/contact-infos', 'showContactInfos')->name('admin.contact.infos');
        Route::post('/update/contact-info', 'updateContactInfo')->name('admin.update.contact.info');
        # maintenance mode
        Route::get('/maintenance-mode', 'showMaintenanceMode')->name('admin.maintenance.mode');
        Route::post('/update/maintenance-mode', 'updateMaintenanceMode')->name('admin.update.maintenance.mode');
    });

    # product management
    Route::prefix('product-management')->group(function () {
        # categories
        Route::controller('App\\Http\\Controllers\\Admin\\CategoryController')
        ->prefix('categories')
        ->group(function () {
            Route::get('/', 'index')->name('admin.categories');
            Route::get('/create', 'create')->name('admin.categories.create');
            Route::post('/store', 'store')->name('admin.categories.store');
            Route::get('/edit/{id}', 'edit')->name('admin.categories.edit');
            Route::post('/update/{id}', 'update')->name('admin.categories.update');
            Route::delete('/delete/{id}', 'destroy')->name('admin.categories.destroy');
            Route::get('/status/{id}', 'changeStatus')->name('admin.categories.status');
            Route::get('/featured/{id}', 'changeFeatured')->name('admin.categories.featured');
        });
    });

    # languages
    Route::controller('App\\Http\\Controllers\\Admin\\LanguageController')
    ->prefix('languages')
    ->group(function () {
       Route::get('/', 'index')->name('admin.languages');
       Route::post('/store', 'store')->name('admin.languages.store');
       Route::get('/edit/{id}', 'edit')->name('admin.languages.edit');
       Route::post('/update/{id}', 'update')->name('admin.languages.update');
       Route::delete('/delete/{id}', 'destroy')->name('admin.languages.destroy');
       Route::get('/frontend/default/{id}', 'frontDefault')->name('admin.languages.frontend.default');
       Route::get('/dashboard/default/{id}', 'dashDefault')->name('admin.languages.dashboard.default');
       Route::post('/add-frontend-keyword', 'addFrontendKeyword')->name('admin.languages.frontend.keyword');
       Route::post('/add-dashboard-keyword', 'addDashboardKeyword')->name('admin.languages.dashboard.keyword');
    });


});
