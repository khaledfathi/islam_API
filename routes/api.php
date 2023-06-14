<?php

use App\Http\Controllers\API\UserController;
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
    Route::get('create' , [UserController::class , 'create']); 
    Route::post('store' , [UserController::class , 'store']); 
    Route::get('{id}' , [UserController::class , 'show']); 
    Route::delete('{id}' , [UserController::class , 'destroy']); 
    Route::get('{id}/edit' , [UserController::class , 'edit']); 
    Route::put('{id}/update' , [UserController::class , 'update']); 
}); 
