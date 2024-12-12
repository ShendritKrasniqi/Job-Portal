<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jobs\JobsController;
use App\Http\Controllers\Auth\GoogleController;

// Auth routes for default login
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

// Jobs routes
Route::group(['prefix' => 'jobs'], function() {
    Route::get('single/{id}', [JobsController::class, 'single'])->name('single.job');
    Route::post('save', [JobsController::class, 'saveJob'])->name('save.job');
    Route::post('apply', [JobsController::class, 'jobApply'])->name('apply.job');
    Route::any('search', [JobsController::class, 'search'])->name('search.job');
});

// Categories routes
Route::group(['prefix' => 'categories'], function() {
    Route::get('/single/{name}', [App\Http\Controllers\Categories\CategoriesController::class, 'singleCategory'])->name('categories.single');
});

// Users routes
Route::group(['prefix' => 'users'], function() {
    Route::get('profile', [App\Http\Controllers\Users\UsersController::class, 'profile'])->name('profile');
    Route::get('applications', [App\Http\Controllers\Users\UsersController::class, 'applications'])->name('applications');
    Route::get('savedjobs', [App\Http\Controllers\Users\UsersController::class, 'savedJobs'])->name('saved.jobs');

    Route::get('edit-details', [App\Http\Controllers\Users\UsersController::class, 'editDetails'])->name('edit.details');
    Route::post('edit-details', [App\Http\Controllers\Users\UsersController::class, 'updateDetails'])->name('update.details');

    Route::get('edit-cv', [App\Http\Controllers\Users\UsersController::class, 'editCV'])->name('edit.cv');
    Route::post('/edit-cv', [App\Http\Controllers\Users\UsersController::class, 'updateCV'])->name('update.cv');
});

// Admin login routes
Route::get('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login')->middleware('checkforauth');
Route::post('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');
Route::post('admin/logout', [App\Http\Controllers\Admins\AdminsController::class, 'logout'])->name('admin.logout');


// Admin routes (protected by auth:admin middleware)
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('/', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');
    Route::get('/all-admins', [App\Http\Controllers\Admins\AdminsController::class, 'admins'])->name('view.admins');

    Route::get('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'createAdmins'])->name('create.admins');
    Route::post('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'storeAdmins'])->name('store.admins');

    Route::get('/display-categories', [App\Http\Controllers\Admins\AdminsController::class, 'displayCategories'])->name('display.categories');
    Route::get('/create-cates', [App\Http\Controllers\Admins\AdminsController::class, 'createCategories'])->name('create.categories');
    Route::post('/create-cates', [App\Http\Controllers\Admins\AdminsController::class, 'storeCategories'])->name('store.categories');

    // Update categories
    Route::get('/edit-cates/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editCategories'])->name('edit.categories');
    Route::post('/edit-cates/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateCategories'])->name('update.categories');
    Route::get('/delete-cates/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteCategories'])->name('delete.categories');

    // Jobs
    Route::get('/display-jobs', [App\Http\Controllers\Admins\AdminsController::class, 'allJobs'])->name('display.jobs');
    Route::get('/create-jobs', [App\Http\Controllers\Admins\AdminsController::class, 'createJobs'])->name('create.jobs');
    Route::post('/create-jobs', [App\Http\Controllers\Admins\AdminsController::class, 'storeJobs'])->name('store.jobs');
    Route::get('/delete-jobs/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteJobs'])->name('delete.jobs');

    // Applications
    Route::get('/display-apps', [App\Http\Controllers\Admins\AdminsController::class, 'displayApps'])->name('display.apps');
    Route::get('/delete-apps/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteApps'])->name('delete.apps');
});

// Google Authentication Routes
Route::get('auth/google', [GoogleController::class, 'loginWithGoogle'])->name('login.google');
Route::get('auth/google/callback', [GoogleController::class, 'callbackFromGoogle'])->name('login.google.callback');