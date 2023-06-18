<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('login.index'); 
    }
    public function auth (Request $request){
        if ($request->email != ADMIN_EMAIL){
            return redirect(route('auth.index'))->withErrors('You does not have permissions !');
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect(route('home')); 
        }
        return back()->withErrors('Invalid password !'); 
    }
    public function logout(){
        Auth::logout(); 
        return redirect(route('auth.index')); 
    }
}
