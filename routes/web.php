<?php

use App\Helpers\Sepay;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\AgentController;
use App\Http\Controllers\User\WalletController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\FavoritesController;
use App\Http\Controllers\User\WatchedPostController;
use App\Http\Controllers\Admin\Manage\NewsController;
use App\Http\Controllers\Admin\Manage\TypeController;
use App\Http\Controllers\Admin\Manage\UserController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Admin\Manage\StatusController;
use App\Http\Controllers\Admin\Manage\NewsTypeController;
use App\Http\Controllers\Admin\Manage\PropertyController;
use App\Http\Controllers\Admin\Manage\ConstructionController;
use App\Http\Controllers\Admin\Manage\LegalController;
use App\Http\Controllers\Admin\Manage\PricingPlanController;
use App\Http\Controllers\User\SePayController;

Route::name('admin.')->prefix('admin')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'displayAdminLogin')->name('login.show');
        Route::post('/login', 'onAdminLogin')->name('login.store');

        // Route::get('/signup', 'displayAdminSignup')->name('signup.show');
        // Route::post('/signup', 'onAdminSignup')->name('signup.store');
    });

    Route::middleware(['admin.auth'])->group(function () {
        Route::get      ('/logout', [AuthController::class, 'onAdminLogout'])->name('logout');
        Route::get      ('/profile', [AuthController::class, 'displayAdminProfile'])->name('profile.show');
        // Route::post     ('/profile', [AuthController::class, 'getAdminProfileInfomation'])->name('profile.data');
        Route::get      ('/profile/edit', [AuthController::class, 'editAdminProfile'])->name('profile.edit');
        Route::post     ('/profile/update', [AuthController::class, 'updateAdminProfile'])->name('profile.update');
        Route::post     ('/profile/delete-image/{imagePath}', [AuthController::class, 'deleteImage'])->name('profile.delete-image');

        // TIN DANG
        Route::get      ('/properties', [PropertyController::class, 'index'])->name('properties.index');
        Route::get      ('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
        // Route::post     ('/properties/store', [PropertyController::class, 'store'])->name('properties.store');
        Route::get      ('/properties/data', [PropertyController::class, 'get'])->name('properties.get');
        // Route::get      ('/properties/edit/{id}', [PropertyController::class, 'edit'])->name('properties.edit');
        // Route::put      ('/properties/update/{id}', [PropertyController::class, 'update'])->name('properties.update');
        // Route::delete   ('/properties/{id}', [PropertyController::class, 'destroy'])->name('properties.destroy');

        // DANH MUC
        Route::get      ('/types', [TypeController::class, 'index'])->name('types.show');
        Route::get      ('/types/data', [TypeController::class, 'get'])->name('types.get-types');
        Route::get      ('/types/all-data', [TypeController::class, 'getAllTypes'])->name('types.get-all-types');
        Route::put      ('/types/toggle-active/{id}', [TypeController::class, 'toggleActive'])->name('types.toggle-active');

        Route::post     ('/types/store', [TypeController::class, 'store'])->name('types.store');
        Route::post     ('/types/{id}', [TypeController::class, 'update'])->name('types.update');
        Route::delete   ('/types/{id}', [TypeController::class, 'destroy'])->name('types.destroy');

        // DU AN
        Route::get      ('/constructions', [ConstructionController::class, 'index'])->name('constructions.index');
        Route::get      ('/constructions/get', [ConstructionController::class, 'get'])->name('constructions.get');
        Route::post     ('/constructions/store', [ConstructionController::class, 'store'])->name('constructions.store');
        Route::put      ('/constructions/{id}', [ConstructionController::class, 'update'])->name('constructions.update');
        Route::put      ('/constructions/toggle-active/{id}', [ConstructionController::class, 'toggleActive'])->name('constructions.toggle-active');
        Route::delete   ('/constructions/{id}', [ConstructionController::class, 'destroy'])->name('constructions.destroy');



        // TIN TUC
        Route::get      ('/news', [NewsController::class, 'index'])->name('news.show');
        Route::get      ('/news/get', [NewsController::class, 'get'])->name('news.get');
        Route::get      ('/news/create', [NewsController::class, 'create'])->name('news.create');
        Route::post     ('/news/store', [NewsController::class, 'store'])->name('news.store');
        Route::get      ('/news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
        Route::put      ('/news/update/{id}', [NewsController::class, 'update'])->name('news.update');
        Route::put      ('/news/toggle-active/{id}', [NewsController::class, 'toggleActive'])->name('news.toggle-active');
        Route::delete   ('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

        // LOAI TIN TUC
        Route::get      ('/news-types', [NewsTypeController::class, 'index'])->name('news-types.index');
        Route::post     ('/news-types/store', [NewsTypeController::class, 'store'])->name('news-types.store');
        Route::get      ('/news-types/get', [NewsTypeController::class, 'get'])->name('news-types.get');
        Route::put      ('/news-types/update/{id}', [NewsTypeController::class, 'update'])->name('news-types.update');
        Route::put      ('/news-types/toggle-active/{id}', [NewsTypeController::class, 'toggleActive'])->name('news-types.toggle-active');

        // DANH SACH NGUOI DUNG
        Route::get      ('/users', [UserController::class, 'index'])->name('users.index');
        Route::get      ('/users/get', [UserController::class, 'get'])->name('users.get');
        Route::get      ('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post     ('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get      ('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put      ('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete   ('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::put      ('/users/toggle-active/{id}', [UserController::class, 'toggleActive'])->name('users.toggle-active');

        // DANH SACH GOI
        Route::get      ('/pricing-plans', [PricingPlanController::class, 'index'])->name('pricing-plans.index');
        Route::get      ('/pricing-plans/create', [PricingPlanController::class, 'create'])->name('pricing-plans.create');

        // DANH SACH PHAP LY
        Route::get      ('/legals', [LegalController::class, 'index'])->name('legals.index');
        Route::get      ('/legals/get', [LegalController::class, 'get'])->name('legals.get');
        Route::post     ('/legals/store', [LegalController::class, 'store'])->name('legals.store');
        Route::put      ('/legals/{id}', [LegalController::class, 'update'])->name('legals.update');
        Route::delete   ('/legals/{id}', [LegalController::class, 'destroy'])->name('legals.destroy');

        // DANNH SACH TINH TRANG
        Route::get      ('/statuses', [StatusController::class, 'index'])->name('statuses.index');
        Route::get      ('/statuses/get', [StatusController::class, 'get'])->name('statuses.get');
        Route::post     ('/statuses/store', [StatusController::class, 'store'])->name('statuses.store');
        Route::put      ('/statuses/{id}', [StatusController::class, 'update'])->name('statuses.update');
        Route::delete   ('/statuses/{id}', [StatusController::class, 'destroy'])->name('statuses.destroy');
    });
});

Route::name('user.')->prefix('user')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'displayUserLogin')->name('login.show');
        Route::post('/login', 'onUserLogin')->name('login.store');
        
        Route::get('/signup', 'displayUserSignup')->name('signup.show');
        Route::post('/signup', 'onUserSignup')->name('signup.store');

    });
    Route::controller(PasswordResetController::class)->group(function () {
        Route::get      ('/password/request', 'showRequestForm')->name('password.request');
        Route::post     ('/password/email', 'sendResetLinkEmail')->name('password.email');
        Route::post     ('/password/reset', 'reset')->name('password.update');
        Route::get      ('/password/reset/{token}/{email}', 'showResetTokenForm')->name('password.reset');
    });

    Route::get      ('/home', [HomeController::class, 'index'])->name('home.index');

    Route::get      ('/agents', [AgentController::class, 'index'])->name('agents.index');
    Route::get      ('/agents/{slug}', [AgentController::class, 'show'])->name('agents.show');

    Route::get      ('/wallet/pricing', [WalletController::class, 'pricing'])->name('wallet.pricing');
         

    Route::middleware(['users.auth'])->group(function () {
        // TRANG CA NHAN
        Route::get      ('/logout', [AuthController::class, 'onUserLogout'])->name('logout');
        Route::get      ('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::post     ('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
        Route::get      ('/profile/favorites', [FavoritesController::class, 'index'])->name('profile.favorites');
        Route::post     ('/profile/favorites/toggle', [FavoritesController::class, 'toggleFavorite'])->name('profile.favorites.toggle');
        Route::get      ('/profile/watched-posts', [WatchedPostController::class, 'index'])->name('profile.watched-posts');

        // VI TIEN
        Route::get      ('/wallet', [WalletController::class, 'index'])->name('wallet.index');
        Route::post     ('/wallet/deposit', [SePayController::class, 'requestDeposit'])->name('wallet.deposit');
        Route::get      ('/wallet/check-pending-payment', [SePayController::class, 'checkPendingPayment'])->name('wallet.check-pending-payment');
        Route::get      ('/wallet/schedule-check-pending-payment', [SePayController::class, 'scheduleCheckPendingPayment'])->name('wallet.schedule-check-pending-payment');
        Route::post     ('/wallet/cancel-pending-payment', [SepayController::class, 'cancelPendingPayment'])->name('wallet.cancel-pending-payment');
        Route::get      ('/wallet/transactions', [WalletController::class, 'get'])->name('wallet.transactions');

        // TIN DANG
        Route::get      ('/posts', [PostController::class, 'index'])->name('posts.index');
        Route::get      ('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post     ('/posts/store', [PostController::class, 'store'])->name('posts.store');
        Route::get      ('/posts/edit/{slug}', [PostController::class, 'edit'])->name('posts.edit');
        Route::post     ('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
        Route::post     ('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    });

    Route::get      ('/posts/search', [PostController::class, 'search'])->name('posts.search');

    // !!!! these lines should be placed after /posts/create to prevent error!!!! 
    Route::get      ('/posts-by-type/{slug}', [PostController::class, 'showByType'])->name('posts.show-by-type');
    Route::get      ('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

    // TIN TUC 
    Route::get     ('/news', [NewsController::class, 'userIndex'])->name('news.index');
    Route::get     ('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
    Route::get     ('/news-by-type/{slug}', [NewsController::class, 'showByType'])->name('news.show-by-type');

});

Route::redirect('/', '/user/home');
Route::redirect('/user', '/user/home');

Route::redirect('/admin', '/admin/login');
