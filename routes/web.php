<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Admin\TransactionController as AllTransaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\AuthController as UserAuth;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\Admin\DashboardController;
use App\Models\Product;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    $products = Product::where("name", "LIKE", "%" . $request->search . "%")->get();

    return view('welcome', ['products' => $products]);
})->name('welcome');


Route::resource('/carts', CartController::class);
Route::resource('/transaction', TransactionController::class);

Route::get('/admin/login', [AuthController::class, 'login'])->name('adminLogin');
Route::post('/admin/login', [AuthController::class, 'authenticate'])->name('adminAuthenticate');
Route::resource('/admin/products', ProductController::class);

Route::get('/login', [UserAuth::class, 'login'])->name(name: 'userLogin');
Route::post('/login', [UserAuth::class, 'authenticate'])->name(name: 'authenticate');
Route::post('/logout', [UserAuth::class, 'logout'])->name(name: 'logout');
Route::get('/register', [UserAuth::class, 'register'])->name(name: 'register');
Route::post('/register', [UserAuth::class, 'registration'])->name(name: 'registration');

Route::get('/admin/dashboard', DashboardController::class);
Route::get('/admin/transaction', AllTransaction::class);
