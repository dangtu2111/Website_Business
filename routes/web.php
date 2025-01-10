<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\StatisticalController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\Backend\ConfigController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthenticateMiddleware;


Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');
Route::post('/admin/auth', [AuthController::class, 'login'])->name('admin.auth');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');


Route::group(['prefix' => 'admin', 'middleware' => AuthenticateMiddleware::class], function () {
    Route::get('/', [StatisticalController::class, 'index'])->name('admin.home');
    Route::get('account', [AccountController::class, 'user'])->name('admin.account.accountUser');
    Route::get('account/admin', [AccountController::class, 'administrator'])->name('admin.account.accountAdmin');
    Route::get('category/blogs', [BlogController::class, 'category_blogs'])->name('admin.category.blogs');
    Route::get('category/products', [ProductController::class, 'category_products'])->name('admin.category.products');
    Route::get('category/attribute', [AttributeController::class, 'category_attribute'])->name('admin.category.attribute');
    Route::get('blogs', [BlogController::class, 'blogs'])->name('admin.blogs');
    Route::get('products', [ProductController::class, 'products'])->name('admin.products');
    // Route::get('referral', [AccountController::class, 'administrator'])->name('admin.referral');
    Route::get('config/info', [ConfigController::class, 'config_info'])->name('admin.config');
    Route::get('config/seo', [ConfigController::class, 'config_seo'])->name('admin.seo');
    Route::get('display', [LocationController::class, 'location'])->name('admin.location');
    Route::get('menu', [MenuController::class, 'menu'])->name('admin.menu');
});