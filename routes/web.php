<?php

use App\Http\Controllers\Admin\Manage\ConstructionController;
use App\Http\Controllers\Admin\Manage\PropertyController;
use App\Http\Controllers\Admin\Manage\StatusController;
use App\Http\Controllers\Admin\Manage\TypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\Home\DashboardController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PostController;

Route::name('admin.')->prefix('admin')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'displayAdminLogin')->name('login.show');
        Route::post('/login', 'onAdminLogin')->name('login.store');

        Route::get('/signup', 'displayAdminSignup')->name('signup.show');
        Route::post('/signup', 'onAdminSignup')->name('signup.store');
    });

    Route::middleware(['admin.auth'])->group(function () {
        Route::get      ('/logout', [AuthController::class, 'onAdminLogout'])->name('logout');
        Route::get      ('/profile', [AuthController::class, 'displayAdminProfile'])->name('profile.show');
        Route::post     ('/profile', [AuthController::class, 'getAdminProfileInfomation'])->name('profile.data');
        Route::get      ('/profile/edit', [AuthController::class, 'editAdminProfile'])->name('profile.edit');
        Route::post     ('/profile/update', [AuthController::class, 'updateAdminProfile'])->name('profile.update');
        Route::post     ('/profile/delete-image/{imagePath}', [AuthController::class, 'deleteImage'])->name('profile.delete-image');

        // TIN DANG
        Route::get      ('/properties', [PropertyController::class, 'index'])->name('properties.show');
        Route::get      ('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
        Route::post     ('/properties/store', [PropertyController::class, 'store'])->name('properties.store');
        Route::get      ('/properties/data', [PropertyController::class, 'getProperties'])->name('properties.get-properties');
        Route::get      ('/properties/edit/{id}', [PropertyController::class, 'edit'])->name('properties.edit');
        Route::put      ('/properties/update/{id}', [PropertyController::class, 'update'])->name('properties.update');
        Route::delete   ('/properties/{id}', [PropertyController::class, 'destroy'])->name('properties.destroy');

        // DANH MUC
        Route::get      ('/types', [TypeController::class, 'index'])->name('types.show');
        Route::get      ('/types/data', [TypeController::class, 'getTypes'])->name('types.get-types');
        Route::get      ('/types/all-data', [TypeController::class, 'getAllTypes'])->name('types.get-all-types');
        Route::post     ('/types/store', [TypeController::class, 'store'])->name('types.store');
        Route::post      ('/types/{id}', [TypeController::class, 'update'])->name('types.update');
        Route::delete   ('/types/{id}', [TypeController::class, 'destroy'])->name('types.destroy');

        // DU AN
        Route::get      ('/constructions', [ConstructionController::class, 'index'])->name('constructions.show');
        Route::get      ('/constructions/get', [ConstructionController::class, 'get'])->name('constructions.get');
        Route::post     ('/constructions/store', [ConstructionController::class, 'store'])->name('constructions.store');
        Route::put      ('/constructions/{id}', [ConstructionController::class, 'update'])->name('constructions.update');
        Route::delete   ('/constructions/{id}', [ConstructionController::class, 'destroy'])->name('constructions.destroy');

        // TRANG THAI
        Route::get      ('/statuses/all-data', [StatusController::class, 'getAllStatuses'])->name('statuses.get-all-statuses');

        Route::controller(DashboardController::class)->name('dashboard.')->prefix('dashboard')->group(function () {
            Route::get('/', 'index')->name('show');
        });

    });
});

Route::name('user.')->prefix('user')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'displayUserLogin')->name('login.show');
        Route::post('/login', 'onUserLogin')->name('login.store');
        
        Route::get('/signup', 'displayUserSignup')->name('signup.show');
        Route::post('/signup', 'onUserSignup')->name('signup.store');
    });

    Route::get      ('/home', [HomeController::class, 'index'])->name('home.index');

    
    

    Route::middleware(['users.auth'])->group(function () {
        Route::get      ('/logout', [AuthController::class, 'onUserLogout'])->name('logout');

        // TIN DANG
        Route::get      ('post/create', [PostController::class, 'create'])->name('post.create');
        Route::get      ('post/{id}', [PostController::class, 'show'])->name('post.show');
    });
});

