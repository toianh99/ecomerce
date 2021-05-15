<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController as RoleCon;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::namespace('Api')->group(function() {
//    Route::group(['middleware' => 'auth:sanctum'], function () {
//        Route::apiResource('roles', [RoleCon::class]);
//        Route::apiResource('users', [UserController::class]);
//        Route::apiResource('permissions', [PermissionController::class]);
//
//    });
//});

