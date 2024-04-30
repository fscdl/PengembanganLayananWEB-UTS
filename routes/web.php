<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;



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

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, '_create_']);
Route::get('/products/{product_id}', [ProductController::class, '_destroy']);
Route::get('/products/sells/{product_id}', [ProductController::class, 'jual']);
Route::post('/products/sells/{product_id}', [ProductController::class, 'jual_post']);





Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, '_create']);
Route::get('/categories/{category_id}', [CategoryController::class, '_destroy']);



Route::get('/suppliers', [SupplierController::class, 'index']);
Route::post('/suppliers', [SupplierController::class, '_create']);
Route::get('/suppliers/{supplier_id}', [SupplierController::class, '_destroy']);



Route::get('/transactions', [TransactionController::class, 'index']);