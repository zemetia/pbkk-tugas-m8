<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/carts', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [CartController::class, 'create'])->name('cart.create');
Route::get('/cart/{id}', [CartController::class, 'show'])->name('cart.show');
Route::get('/cart/{id}/add', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/{id}/add', [CartController::class, 'update'])->name('cart.add.submit');
Route::delete('/cart/{cart_id}/remove/{product_id}', [CartController::class, 'remove'])->name('cart.product.remove');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.delete');

Route::get('/products', [ProductController::class, 'index'])->name('product');
