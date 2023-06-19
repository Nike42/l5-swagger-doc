<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}) ;

#Route::get('/', function () {
 #   return response()->json([
   #     'message' => 'Welcome to the laravel API'
    #]);
#});

  Route::post('login', 'Api\AuthController@login');
      Route::post('register', 'Api\AuthController@register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});

Route::group(["prefix"=>"seller"],function(){
    Route::get("/get/{id}",[SellerController::class,"get"]);
    Route::get("/gets",[SellerController::class,"gets"]);
    Route::post("/store",[SellerController::class,"store"]);
    Route::put("/update/{id}",[SellerController::class,"update"]);
    Route::delete("/delete/{id}",[SellerController::class,"delete"]);
});

Route::group(["prefix"=>"products"],function(){
  Route::get("/get/{id}",[ProductsController::class,"get"]);
  Route::get("/gets",[ProductsController::class,"gets"]);
  Route::post("/store",[ProductsController::class,"store"]);
  Route::put("/update/{id}",[ProductsController::class,"update"]);
  Route::delete("/delete/{id}",[ProductsController::class,"delete"]);
});