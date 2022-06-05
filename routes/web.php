<?php

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

Route::get('/home', [\App\Http\Controllers\FrontendController::class, 'index'])->name('home');
Route::get('/', [\App\Http\Controllers\FrontendController::class, 'index']);
Route::get('shop', [\App\Http\Controllers\FrontendController::class, 'shop'])->name('shop');
Route::get('shop/{slug}', [\App\Http\Controllers\FrontendController::class, 'show'])->name('shop.show');
Route::get('about', [\App\Http\Controllers\FrontendController::class, 'about'])->name('about');
Route::get('contact', [\App\Http\Controllers\FrontendController::class, 'contact'])->name('contact');
Route::get('cart', [\App\Http\Controllers\FrontendController::class, 'cart'])->name('cart');
Route::get('checkout', [\App\Http\Controllers\FrontendController::class, 'checkout'])->name('checkout');
Route::get('thanks', [\App\Http\Controllers\FrontendController::class, 'thanks'])->name('thanks');
Route::post('add-to/cart/{slug}', [\App\Http\Controllers\FrontendController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('remove-to/cart/{slug}', [\App\Http\Controllers\FrontendController::class, 'removeFromCart'])->name('remove_from_cart');

Auth::routes();

Route::group([
    'prefix' => 'pharma',
    'middleware' => ['auth', 'pharma'],
    'namespace' => 'App\Http\Controllers\Pharma',
    'as' => 'pharma.'],
    function () {
        Route::resource('drugs', 'DrugController');
        Route::resource('orders', 'OrderController');
    });

Route::group([
    'prefix' => 'customer',
    'middleware' => ['auth', 'customer'],
    'namespace' => 'App\Http\Controllers\Customer',
    'as' => 'customer.'],
    function () {
        Route::resource('orders', 'orderController');
    });
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
