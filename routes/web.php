<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ShowPropertiesByType;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\AgentController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Home\DashboardController;
use App\Http\Controllers\User\FavoritesController;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Http\Controllers\Admin\Manage\TypeController;
use App\Http\Controllers\Admin\Manage\StatusController;
use App\Http\Controllers\Admin\Manage\PropertyController;
use App\Http\Controllers\Admin\Manage\ConstructionController;

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
        // Route::get      ('/properties', [PropertyController::class, 'index'])->name('properties.show');
        // Route::get      ('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
        // Route::post     ('/properties/store', [PropertyController::class, 'store'])->name('properties.store');
        // Route::get      ('/properties/data', [PropertyController::class, 'getProperties'])->name('properties.get-properties');
        // Route::get      ('/properties/edit/{id}', [PropertyController::class, 'edit'])->name('properties.edit');
        // Route::put      ('/properties/update/{id}', [PropertyController::class, 'update'])->name('properties.update');
        // Route::delete   ('/properties/{id}', [PropertyController::class, 'destroy'])->name('properties.destroy');

        // DANH MUC
        Route::get      ('/types', [TypeController::class, 'index'])->name('types.show');
        Route::get      ('/types/data', [TypeController::class, 'getTypes'])->name('types.get-types');
        Route::get      ('/types/all-data', [TypeController::class, 'getAllTypes'])->name('types.get-all-types');
        Route::post     ('/types/store', [TypeController::class, 'store'])->name('types.store');
        Route::post     ('/types/{id}', [TypeController::class, 'update'])->name('types.update');
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

    Route::get      ('/agents', [AgentController::class, 'index'])->name('agents.index');
    Route::get      ('/agents/{slug}', [AgentController::class, 'show'])->name('agents.show');
         

    Route::middleware(['users.auth'])->group(function () {
        Route::get      ('/logout', [AuthController::class, 'onUserLogout'])->name('logout');
        Route::get      ('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::get      ('/profile/favorites', [FavoritesController::class, 'index'])->name('profile.favorites');
        Route::post     ('/profile/favorites/toggle', [FavoritesController::class, 'toggleFavorite'])->name('profile.favorites.toggle');

        // TIN DANG
        Route::get      ('/posts', [PostController::class, 'index'])->name('posts.index');
        Route::get      ('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post     ('/posts/store', [PostController::class, 'store'])->name('posts.store');
    });

    Route::get      ('/posts/search', [PostController::class, 'search'])->name('posts.search');

    // !!!! this line should be plade after /posts/create to prevent error!!!! 
    Route::get      ('/posts-by-type/{slug}', [PostController::class, 'showByType'])->name('posts.show-by-type');
    Route::get      ('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');
});

Route::redirect('/', '/user/home');
Route::redirect('/user', '/user/home');
