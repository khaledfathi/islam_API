<?php

use App\Http\Controllers\Home\HomeController;
use App\Models\User as UserModel;
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

Route::get('/', function () {
    $data = UserModel::get(); 
    return view('welcome', ['data'=>$data]);
});

Route::get('/' , [HomeController::class , 'index'])->name('root'); 
Route::get('/user-table' , [HomeController::class , 'userTable'])->name('userTable'); 
Route::get('/product-table' , [HomeController::class , 'ProductTable'])->name('ProductTable'); 

