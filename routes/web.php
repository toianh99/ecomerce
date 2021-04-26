<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::apiResource('product',ProductController::class);
Route::apiResource('role',RoleController::class);
Route::apiResource('category',CategoryController::class);
Route::apiResource('brand',BrandController::class);
Route::apiResource('province',ProvinceController::class);
Route::apiResource('district',DistrictController::class);
Route::apiResource('address',AddressController::class);
Route::apiResource('ward',WardController::class);
Route::apiResource('order',OrderController::class);
Route::apiResource('payment',PaymentController::class);
Route::apiResource('cart',CartController::class);
