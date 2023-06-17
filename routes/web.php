<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\LoginTester\LoginTesterController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//root 

Route::get('/' , fn ()=>redirect(route('home')))->name('root'); 

//home
Route::get('home' , [HomeController::class , 'index'])->name('home'); 

//API 
Route::get('api', fn ()=> view('api.index'))->name('api'); 

//users
Route::group(['prefix'=>'user'] , function (){
    Route::get('' , [UserController::class , 'index'])->name('user.index'); 
    Route::get('show/{id}' , [UserController::class , 'show'])->name('user.show'); 
    Route::get('create' , [UserController::class , 'create'])->name('user.create'); 
    Route::post('store' , [UserController::class , 'store'])->name('user.store'); 
    Route::get('edit/{id}' , [UserController::class , 'edit'])->name('user.edit'); 
    Route::post('update' , [UserController::class , 'update'])->name('user.update'); 
    Route::get('destroy/{id}' , [UserController::class , 'destroy'])->name('user.destroy'); 
}); 

//products
route::group(['prefix'=>'product'] , function (){
    Route::get('' , [ProductController::class , 'index'])->name('product.index'); 
    Route::get('show/{id}' , [ProductController::class , 'show'])->name('product.show'); 
    Route::get('create' , [ProductController::class , 'create'])->name('product.create'); 
    Route::post('store' , [ProductController::class , 'store'])->name('product.store'); 
    Route::get('edit/{id}' , [ProductController::class , 'edit'])->name('product.edit'); 
    Route::post('update' , [ProductController::class , 'update'])->name('product.update'); 
    Route::get('destroy/{id}' , [ProductController::class , 'destroy'])->name('product.destroy'); 
}); 

//Services
route::group(['prefix'=>'service'] , function (){
    route::get('' , [ServiceController::class , 'index'])->name('service.index'); 
    route::get('show/{id}' , [ServiceController::class , 'show'])->name('service.show'); 
    route::get('create' , [ServiceController::class , 'create'])->name('service.create'); 
    route::get('edit/{id}' , [ServiceController::class , 'edit'])->name('service.edit'); 
    route::get('destroy/{id}' , [ServiceController::class , 'destroy'])->name('service.destroy'); 
}); 


route::group(['prefix'=>'login-tester'] , function (){
    route::get('' , [LoginTesterController::class , 'index'])->name('loginTester.index'); 
    route::get('login' , [LoginTesterController::class , 'login'])->name('loginTester.login'); 
}); 


// ######################
Route::get('test' , function (){
    return view('test'); 
}); 

