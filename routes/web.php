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

Route::get('/', [\App\Http\Controllers\FrontendController::class, 'index'])->name('home');
Route::get('shop', [\App\Http\Controllers\FrontendController::class, 'shop'])->name('shop');
Route::get('about', [\App\Http\Controllers\FrontendController::class, 'about'])->name('about');
Route::get('contact', [\App\Http\Controllers\FrontendController::class, 'contact'])->name('contact');
Route::get('cart', [\App\Http\Controllers\FrontendController::class, 'cart'])->name('cart');
Route::get('checkout', [\App\Http\Controllers\FrontendController::class, 'checkout'])->name('checkout');
Route::get('thanks', [\App\Http\Controllers\FrontendController::class, 'thanks'])->name('thanks');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
