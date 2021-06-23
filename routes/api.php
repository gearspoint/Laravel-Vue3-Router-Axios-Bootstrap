<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sharkController2;
use App\Http\Controllers\sharkController;
use App\Http\Controllers\ProductController;
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

// Route::resource("sharks", [sharkController::class]);
Route::get("list",[sharkController2::class,'list'] );
Route::post("add",[sharkController2::class,'add'] );
Route::put("update",[sharkController2::class,'update'] );
Route::put("update",[sharkController::class,'myupdate'] );

Route::get("sharks/search/{name?}",[sharkController::class,'index'] );
Route::middleware('api')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('sharks', sharkController::class);
});

