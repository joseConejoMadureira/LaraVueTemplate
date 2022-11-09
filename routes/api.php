<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
$ProductController = 'App\Http\Controllers\ProductController';
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
});
//products
//metodos padrão crud get put post etc etc
Route::apiResource('products',$ProductController);
Route::get('products/service/abcde',$ProductController.'@abcde');