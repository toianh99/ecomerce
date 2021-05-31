<?php

use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SupplierController;
use App\Models\Product;
use Illuminate\Support\Arr;
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
//    $searchParams= $request->all();
    //kiểm tra biết limit
//    $limmit=Arr::get($searchParams,'limit',static::ITEM_PER_PAGE);
    //kiểm tra keyword search
//    $keyword=Arr::get($searchParams,'keyword','');
//    //gọi query product
    $query=Product::query();

    if (!empty($keyword)) {
        $query->where('name_product', 'LIKE', '%' . $keyword . '%');
    }
    $products=$query->paginate(12);
    return view('web/index',compact('products'));
})->name('web-home');
Route::get('/admin', function () {
    return view('home');
});

//Route::get('/web/product',function (){
//   return view('web/products');
//})->name('web-product');
//
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
Route::Resource('order',OrderController::class);
Route::Resource('payment',PaymentController::class)->middleware('auth');
Route::Resource('shipment', \App\Http\Controllers\ShipmentController::class)->middleware('auth');
//Route::apiResource('cart',CartController::class);
Route::apiResource('user',\App\Http\Controllers\UserController::class);
Route::Resource('permission',\App\Http\Controllers\PermissionController::class)->middleware('auth');
Route::Resource('product-color',\App\Http\Controllers\ProductColorController::class)->middleware('auth');
Route::Resource('product-size',\App\Http\Controllers\ProductSizeController::class)->middleware('auth');
Route::Resource('product-variant',\App\Http\Controllers\ProductVariantController::class)->middleware('auth');
//Route::get('/products',[ProductController::class,'indexs'])->middleware('auth');
Route::get('/test',[\App\Http\Controllers\TestController::class,'index'])->middleware('auth');
Route::post('/test',[\App\Http\Controllers\TestController::class,'create'])->middleware('auth')->name('test.create');
Route::Resource('import',\App\Http\Controllers\ImportController::class)->middleware('auth');
Route::Resource('export',\App\Http\Controllers\ExportController::class)->middleware('auth');
Route::Resource('importDetail',\App\Http\Controllers\ImportDetailController::class)->middleware('auth');
Route::post('/importDetail/updateID',[\App\Http\Controllers\ImportDetailController::class,'updateID'])->middleware('auth');
Route::Resource('exportDetail',\App\Http\Controllers\ExportDetailController::class)->middleware('auth');
Route::post('/exportDetail/updateID',[\App\Http\Controllers\ExportDetailController::class,'updateID'])->middleware('auth');
Route::apiResource('api-product',\App\Http\Controllers\Api\ProductApiController::class);
Route::get('/api-product/detail',[\App\Http\Controllers\Api\ProductApiController::class,'detail'])->name('product-detail');
Route::Resource('cart',CartController::class);
Route::Resource('cartDetail',\App\Http\Controllers\CartDetailController::class);
Route::get('web/login',[\App\Http\Controllers\LoginController::class,'index'])->name('web.login.index');
Route::post('web/login',[\App\Http\Controllers\LoginController::class,'login'])->name('web.login');
Route::post('web/register',[\App\Http\Controllers\RegisterController::class,'register'])->name('web.register');
Route::Resource('checkout',CheckOutController::class)->middleware('auth');
Route::Resource('supplier',SupplierController::class)->middleware('auth');
Route::Resource('cart',CartController::class)->middleware('auth');
Route::post('/login/comment',[\App\Http\Controllers\LoginCommentController::class,'login'])->name('login.comment');
Route::get('/login/comment',[\App\Http\Controllers\LoginCommentController::class,'index'])->name('login.comment');
Route::post('cartDetail/updateQuantity',[\App\Http\Controllers\CartDetailController::class,'updateQuantity'])->middleware('auth');
Route::Resource('comment',CommentController::class);
Route::Resource('promotion',PromotionController::class);
Route::post('promotion/search',[PromotionController::class,'search']);
Route::post('cart/save',[CartController::class,'save']);
Route::post('/check/save',[CheckOutController::class,'save'])->name('checkout.save');
Route::get('/success_order',[HomeController::class,'success'])->name('success');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
