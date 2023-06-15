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
    Route::post('' , [UserController::class , 'store']); 
    Route::get('create' , [UserController::class , 'create']); 
    Route::get('{id}/edit' , [UserController::class , 'edit']); 
    Route::get('{id}' , [UserController::class , 'show']); 
    Route::delete('{id}' , [UserController::class , 'destroy']); 
    Route::post('{id}/update' , [UserController::class , 'update']);//it should use PUT  but php PUT method doesn't send file 
}); 
