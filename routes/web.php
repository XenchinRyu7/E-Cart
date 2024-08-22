<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [AuthController::class, 'login'])->name('adminLogin');
Route::post('/admin/login', [AuthController::class, 'authenticate'])->name('adminAuthenticate');

Route::resource('/admin/products', ProductController::class);