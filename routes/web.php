<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\StatisticalController;
use App\Http\Controllers\Backend\MessagerController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\Backend\ConfigController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthenticateMiddleware;
use Illuminate\Support\Facades\Log;



Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');
Route::post('/admin/auth', [AuthController::class, 'login'])->name('admin.auth');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');



// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     Lfm::routes();  // Đăng ký các route của laravel-filemanager
// });


Route::group(['prefix' => 'admin', 'middleware' => AuthenticateMiddleware::class], function () {
    Route::get('/', [StatisticalController::class, 'index'])->name('admin.home');
    Route::get('account', [AccountController::class, 'user'])->name('admin.account.accountUser');
    Route::get('account/create', [AccountController::class, 'createUser'])->name('admin.account.createUser');
    Route::post('account/create/post', [AccountController::class, 'createUserPost'])->name('admin.account.createUser.post');
    Route::get('category', [BlogController::class, 'category'])->name('admin.category');
    Route::get('category/insert', [BlogController::class, 'category_insert'])->name('admin.category.insert');
    Route::get('category/edit/{id}', [BlogController::class, 'category_edit'])->name('admin.category.edit');
    Route::post('category/post', [BlogController::class, 'category_post'])->name('admin.category.post');
    Route::get('category/products', [ProductController::class, 'category_products'])->name('admin.category.products');
    Route::get('category/attribute', [AttributeController::class, 'category_attribute'])->name('admin.category.attribute');
    Route::get('post/{category}', [BlogController::class, 'post'])->name('admin.post');
    Route::get('post/edit/{id}', [BlogController::class, 'post_edit'])->name('admin.post.edit');
    Route::get('post', [BlogController::class, 'post_home'])->name('admin.post.home');
    Route::get('home_user', [BlogController::class, 'home_user'])->name('admin.post.home_user');
    Route::get('home_user/edit/{name}', [BlogController::class, 'home_user_edit'])->name('admin.post.home_user_edit');
    Route::post('home_user/edit/post', [BlogController::class, 'home_user_post'])->name('admin.post.home_user_post');


    Route::get('blogs/insert', [BlogController::class, 'insert'])->name('admin.blogs.insert');
    Route::post('blogs/insert/post', [BlogController::class, 'insertPost'])->name('admin.blogs.insertPost');
    Route::get('products', [ProductController::class, 'products'])->name('admin.products');
    // Route::get('referral', [AccountController::class, 'administrator'])->name('admin.referral');
    Route::get('config/info', [ConfigController::class, 'config_info'])->name('admin.config');
    Route::post('config/info/post', [ConfigController::class, 'config_info_post'])->name('admin.config.post');
    Route::get('config/seo', [ConfigController::class, 'config_seo'])->name('admin.seo');
    Route::get('display', [LocationController::class, 'location'])->name('admin.location');
    Route::get('menu', [MenuController::class, 'menu'])->name('admin.menu');
    Route::post('menu/insert/post', [MenuController::class, 'menu_insert_post'])->name('admin.menu_insert_post');
    Route::post('menu/insert/group', [MenuController::class, 'menu_insert_group'])->name('admin.menu_insert_group');
    Route::post('menu/update', [MenuController::class, 'menu_update'])->name('admin.menu_update');
    Route::get('menu/delete/{id}', [MenuController::class, 'menu_delete'])->name('admin.deleteMenu');
    Route::get('/messager', [MessagerController::class, 'index'])->name('admin.messager');
    Route::delete('/messager/remove', [MessagerController::class, 'removeChat'])->name('admin.messager.remove');
    Route::get('/get-chat-messages/{chatId}', [MessagerController::class, 'getMessages']);
});
// Route::get('/', function () {
//     return redirect()->route('user.home');
// });
Route::group(['prefix' => 'client'], function () {
    Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('user.home');
    Route::get('/tin-tuc', [App\Http\Controllers\Frontend\NewsController::class, 'index'])->name('user.news');
    Route::get('/su-kien', [App\Http\Controllers\Frontend\EventController::class, 'index'])->name('user.event');
    Route::get('/dang-ki-hoi-vien', [App\Http\Controllers\Frontend\HomeController::class, 'register'])->name('user.register');
    Route::get('/quyen-loi-hoi-vien', [App\Http\Controllers\Frontend\HomeController::class, 'interest'])->name('user.interest');
    Route::get('/hoi-vien-doanh-nghiep', [App\Http\Controllers\Frontend\HomeController::class, 'parner'])->name('user.business');
    Route::get('/doi-tac', [App\Http\Controllers\Frontend\HomeController::class, 'parner'])->name('user.parner');
    Route::get('/lien-he', [App\Http\Controllers\Frontend\HomeController::class, 'contact'])->name('user.contact');
    Route::get('/post/{category}/{post}', [App\Http\Controllers\Frontend\BlogController::class, 'post'])->name('user.post');
    Route::get('post/{slug}', [App\Http\Controllers\Frontend\BlogController::class, 'category'])->name('user.category');
    Route::get('menu/get-menu', [MenuController::class, 'getMenu'])->name('user.getMenu');
    Route::get('posts/get-posts/{category}', [App\Http\Controllers\Frontend\BlogController::class, 'get_posts'])->name('user.get_posts');
});
Route::get('/', function () {
    return view('showNotification');
});

Route::get('getPusher', function () {
    return view('form_pusher');
});

Route::get('/pusher', function (Illuminate\Http\Request $request) {

    event(new App\Events\HelloPusherEvent($request));
    return redirect('getPusher');
});
Route::post('/chats', [App\Http\Controllers\ChatController::class, 'createChat']);
Route::post('/messages', [App\Http\Controllers\ChatController::class, 'sendMessage']);
Route::get('/chats/{chatId}/messages', [App\Http\Controllers\ChatController::class, 'getMessages']);
