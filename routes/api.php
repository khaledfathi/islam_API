<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Blog\BlogController;
use App\Http\Controllers\API\Product\ProductController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\Service\ServiceController;
use App\Http\Controllers\API\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//users
Route::group(['prefix'=>'user'] , function (){
    Route::get('' , [UserController::class , 'index']); 
    Route::post('' , [UserController::class , 'store']); 
    Route::get('create' , [UserController::class , 'create']); 
    Route::get('{id}/edit' , [UserController::class , 'edit']); 
    Route::get('{id}' , [UserController::class , 'show']); 
    Route::delete('{id}' , [UserController::class , 'destroy']); 
    Route::post('{id}/update' , [UserController::class , 'update']);//it should use PUT  but php PUT method doesn't send file 
}); 

//product 
Route::group(['prefix'=>'product'], function (){
    Route::get('' , [ProductController::class , 'index']); 
    Route::post('' , [ProductController::class , 'store']); 
    Route::get('create' , [ProductController::class , 'create']); 
    Route::get('{id}/edit' , [ProductController::class , 'edit']); 
    Route::get('{id}' , [ProductController::class , 'show']); 
    Route::delete('{id}' , [ProductController::class , 'destroy']); 
    Route::post('{id}/update' , [ProductController::class , 'update']);//it should use PUT  but php PUT method doesn't send file 
});

//blogs 
Route::group(['prefix'=>'blog'], function (){
    Route::get('' , [BlogController::class , 'index']); 
    Route::post('' , [BlogController::class , 'store']); 
    Route::get('create' , [BlogController::class , 'create']); 
    Route::get('{id}/edit' , [BlogController::class , 'edit']); 
    Route::get('{id}' , [BlogController::class , 'show']); 
    Route::delete('{id}' , [BlogController::class , 'destroy']); 
    Route::post('{id}/update' , [BlogController::class , 'update']);//it should use PUT  but php PUT method doesn't send file 
});

//services 
Route::group(['prefix'=>'service'], function (){
    Route::get('' , [ServiceController::class , 'index']); 
    Route::post('' , [ServiceController::class , 'store']); 
    Route::get('create' , [ServiceController::class , 'create']); 
    Route::get('{id}/edit' , [ServiceController::class , 'edit']); 
    Route::get('{id}' , [ServiceController::class , 'show']); 
    Route::delete('{id}' , [ServiceController::class , 'destroy']); 
    Route::post('{id}/update' , [ServiceController::class , 'update']);//it should use PUT  but php PUT method doesn't send file 
});


//register
route::group(['prefix'=>'register'] , function (){
    Route::post('', [RegisterController::class , 'store'])->name('register.store');
    Route::get('create', [RegisterController::class , 'create'])->name('register.create');
});

//auth
route::group(['prefix'=>'auth'] , function (){
    Route::post('login', [AuthController::class , 'login'])->name('auth.login');
});

