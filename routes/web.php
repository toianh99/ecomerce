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
Route::get('/admin', function () {
    return view('home');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::Resource('product',ProductController::class)->middleware('auth');
Route::Resource('roles',RoleController::class)->middleware('auth');
//Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy')->middleware('auth');
Route::Resource('category',CategoryController::class)->middleware('auth');
Route::Resource('brand',BrandController::class)->middleware('auth');
Route::Resource('province',ProvinceController::class);
Route::Resource('district',DistrictController::class);
Route::Resource('address',AddressController::class);
Route::Resource('ward',WardController::class);
Route::apiResource('order',OrderController::class);
Route::apiResource('payment',PaymentController::class);
Route::apiResource('cart',CartController::class);
Route::apiResource('user',\App\Http\Controllers\UserController::class);
Route::Resource('permission',\App\Http\Controllers\PermissionController::class)->middleware('auth');
Route::Resource('product-color',\App\Http\Controllers\ProductColorController::class)->middleware('auth');
Route::Resource('product-size',\App\Http\Controllers\ProductSizeController::class)->middleware('auth');
Route::Resource('product-variant',\App\Http\Controllers\ProductVariantController::class)->middleware('auth');
Route::get('/products',[ProductController::class,'indexs'])->middleware('auth');
Route::get('/test',[\App\Http\Controllers\TestController::class,'index'])->middleware('auth');
Route::post('/test',[\App\Http\Controllers\TestController::class,'create'])->middleware('auth')->name('test.create');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
