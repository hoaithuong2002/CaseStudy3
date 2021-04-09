<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ProductController::class, 'shopProducts'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login');

//Route::get('/dashboard',[OrderController::class,'index']);
Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('users')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/{id}/update', [UserController::class, 'update'])->name('user.update');
        Route::post('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::get('/{id}/delete', [UserController::class, 'delete'])->name('user.delete');
        Route::post('/search', [UserController::class, 'search'])->name('user.search');

    });
    Route::prefix('product')->group(function () {
        Route::get('/index', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/create', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/edit/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::post('/search', [ProductController::class, 'search'])->name('product.search');

    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});

 Route::prefix('cart')->group(function (){
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add/{id}',[CartController::class,'addToCart'])->name('cart.add');
    Route::get('/{id}/remove-product', [CartController::class, 'removeProduct'])->name('cart.removeProduct');
    Route::post('/update', [CartController::class, 'deleteAllProduct'])->name('cart.deleteProduct');
    Route::get('/delete', [CartController::class, 'deleteCart'])->name('cart.delete');
    Route::post('/update-cart', [CartController::class, 'updateProduct']);
});

Route::get('check-out', [CartController::class, 'showFormCheckOut'])->name('cart.checkout');
Route::post('check-out', [CartController::class, 'checkOut'])->name('cart.submit_checkout');
