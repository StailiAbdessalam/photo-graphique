<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

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
 Route::post('Authantification',[AuthController::class,'register']);
 Route::post('Login',[AuthController::class,'Login']);
 Route::post('register',[AuthController::class,'checkEmail']);
 Route::get('getAllPost',[PostController::class,'getAll']);
 Route::post('AddPost',[PostController::class,'Add']);
 Route::delete('deletPost/{id}',[PostController::class,'delete']);
 Route::post('UpdatePost/{id}',[PostController::class,'Update']);
