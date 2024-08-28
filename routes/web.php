<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    $products = Product::where("name", "LIKE", "%" . $request->search . "%")->get();

    return view('welcome', ['products' => $products]);
});

Route::get('/admin/login', [AuthController::class, 'login'])->name('adminLogin');
Route::post('/admin/login', [AuthController::class, 'authenticate'])->name('adminAuthenticate');

Route::resource('/admin/products', ProductController::class);