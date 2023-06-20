<?php

use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\LoginTester\LoginTesterController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Schema\SchemaController;
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
Route::get('/' , fn ()=>redirect(route('auth.index')))->name('root'); 

//auth web 
Route::get ('login', [AuthController::class , 'index'])->name('auth.index')->middleware('guest'); 
Route::get ('auth', [AuthController::class , 'auth'])->name('auth.login'); 

//home
Route::get('home' , [HomeController::class , 'index'])->name('home'); 


//middle ware auth.web
Route::middleware('auth')->group(function (){
    //logout
    Route::get ('logout', [AuthController::class , 'logout'])->name('auth.logout'); 

    //API 
    Route::get('api', fn ()=> view('api.index'))->name('api'); 

    //users
    Route::group(['prefix'=>'user'] , function (){
        Route::get('' , [UserController::class , 'index'])->name('user.index'); 
        // Route::get('show/{id}' , [UserController::class , 'show'])->name('user.show'); 
        Route::get('create' , [UserController::class , 'create'])->name('user.create'); 
        Route::post('store' , [UserController::class , 'store'])->name('user.store'); 
        Route::get('edit/{id}' , [UserController::class , 'edit'])->name('user.edit'); 
        Route::post('update' , [UserController::class , 'update'])->name('user.update'); 
        Route::get('destroy/{id}' , [UserController::class , 'destroy'])->name('user.destroy'); 
    }); 

    //products
    route::group(['prefix'=>'product'] , function (){
        Route::get('' , [ProductController::class , 'index'])->name('product.index'); 
        // Route::get('show/{id}' , [ProductController::class , 'show'])->name('product.show'); 
        Route::get('create' , [ProductController::class , 'create'])->name('product.create'); 
        Route::post('store' , [ProductController::class , 'store'])->name('product.store'); 
        Route::get('edit/{id}' , [ProductController::class , 'edit'])->name('product.edit'); 
        Route::post('update' , [ProductController::class , 'update'])->name('product.update'); 
        Route::get('destroy/{id}' , [ProductController::class , 'destroy'])->name('product.destroy'); 
    }); 

    //blogs
    route::group(['prefix'=>'blog'] , function (){
        Route::get('' , [BlogController::class , 'index'])->name('blog.index'); 
        Route::get('show/{id}' , [BlogController::class , 'show'])->name('blog.show'); 
        Route::get('create' , [BlogController::class , 'create'])->name('blog.create'); 
        Route::post('store' , [BlogController::class , 'store'])->name('blog.store'); 
        Route::get('edit/{id}' , [BlogController::class , 'edit'])->name('blog.edit'); 
        Route::post('update' , [BlogController::class , 'update'])->name('blog.update'); 
        Route::get('destroy/{id}' , [BlogController::class , 'destroy'])->name('blog.destroy'); 
    }); 


    //Services
    route::group(['prefix'=>'service'] , function (){
        route::get('' , [ServiceController::class , 'index'])->name('service.index'); 
        // route::get('show/{id}' , [ServiceController::class , 'show'])->name('service.show'); 
        route::get('create' , [ServiceController::class , 'create'])->name('service.create'); 
        route::post('store' , [ServiceController::class , 'store'])->name('service.store'); 
        route::get('edit/{id}' , [ServiceController::class , 'edit'])->name('service.edit'); 
        route::post('update' , [ServiceController::class , 'update'])->name('service.update'); 
        route::get('destroy/{id}' , [ServiceController::class , 'destroy'])->name('service.destroy'); 
    }); 
    

    //Login tester
    route::group(['prefix'=>'login-tester'] , function (){
        route::get('' , [LoginTesterController::class , 'index'])->name('loginTester.index'); 
        route::get('login' , [LoginTesterController::class , 'login'])->name('loginTester.login'); 
    }); 

    //schema
    Route::get('schema' , [SchemaController::class , 'index'])->name('schema.index'); 

    //Postman download file 
    Route::get('postman', function (){
        return response()->download('download/Islam API.postman_collection.json');
    })->name('download.postman'); 
});

// ######################
Route::get('test' , function (){
    return view('test'); 
}); 

