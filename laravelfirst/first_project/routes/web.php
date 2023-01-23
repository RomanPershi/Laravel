<?php

use App\Http\Middleware\AdminPanelMiddleware;
use App\Http\Middleware\ModeratorPanelMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::get('/register', 'CreateUserController')->name('admin.user.create');
    Route::get('/fetch/User', 'AjaxPaginate\AdminUserPaginationController@fetch_data')->name('admin.fetch.product');
    Route::get('/User', 'LoadPage\AdminUserPageController')->name('admin.user.main');
});
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin|worker']], function () {
    Route::get('/fetch/Order', 'AjaxPaginate\AdminOrderPaginationController@fetch_data')->name('admin.fetch.title');
    Route::get('/Order', 'LoadPage\AdminOrderPageController')->name('admin.order.main');
    Route::get('/Order/{some_order}', 'LoadPage\OrderController')->name('admin.order');
});
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin|moder']], function () {
    Route::get('/update/', 'UpdateController')->name('admin.update');
    Route::post('/create/', 'CreateController')->name('admin.store');
    Route::get('/trash', 'TrashController')->name('admin.trash');
    Route::get('/Product/{some_product}', 'LoadPage\ProductController')->name('admin.product');
    Route::get('/Product', 'LoadPage\AdminProductPageController')->name('admin.product.main');
    Route::get('/fetch/OnlyTitle', 'AjaxPaginate\AdminTitlePaginationController@fetch_data')->name('admin.fetch.title');
    Route::get('/{some_table}', 'LoadPage\AdminPageController');
    Route::post('/ProductUpdate/{product_id}', 'ProductUpdateController')->name('admin.productUpdate');
    Route::post('/{product}/edit/', 'UpdateController')->name('product.edit');
    Route::post('/countup/', 'CountController@countup')->name('countup');
    Route::post('/countdown/', 'CountController@countdown')->name('countup');
    Route::get('/fetch/Product', 'AjaxPaginate\AdminProductPaginationController@fetch_data')->name('admin.fetch.product');
});
Route::get('/fetch', 'Shop\AjaxPaginate\ShopPaginationController@fetch_data')->name('shop.fetch');
Route::get('/basked', 'Cart\BaskedController');
Route::group(['middleware' => 'verified'], function () {
    Route::group(['middleware' => 'verified', 'prefix' => 'sign', 'namespace' => 'Auth'], function () {
        Route::get('reset', 'ResetPasswordController@showResetForm')->name('sign.reset');
        Route::post('reset/update', 'ResetController')->name('pass.update');
    });
    Route::get('/cart', 'Cart\CartController')->name("cart");
    Route::group(['namespace' => 'Order'], function () {
        Route::get('/order', 'OrderController')->name("order");
        Route::get('/orderConfirm', 'ConfirmController');
        Route::group(['middleware' => AdminPanelMiddleware::class], function () {
            Route::get('/changeStatus', 'ChangeStatusController');
        });
    });
});
Route::get('/sign', 'HomeController@index')->name('sign');
Route::get('/baskedDelete', 'Cart\BaskedController@delete');
Route::get('/', 'WelcomeController');
Route::get('/thanks', 'ThanksController');
Route::get('/shop', 'Shop\LoadPage\ShopPageController')->name('shop');
Route::get('/shop/{some_product}', 'Shop\LoadPage\ProductController')->name('shop.product');
//pagination

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
