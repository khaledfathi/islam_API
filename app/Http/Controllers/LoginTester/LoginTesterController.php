<?php

namespace App\Http\Controllers\LoginTester;

use App\Http\Controllers\Controller;
use App\Repository\Contract\UserRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginTesterController extends Controller
{
    public UserRepositoryContract $userProvider ; 
    public function __construct(
        UserRepositoryContract $userProvider           
    ){
        $this->userProvider = $userProvider; 
    }
    public function index(){
        return view('loginTester.index'); 
    }
    public function login (Request $request){
        $found = $this->userProvider->showByEmail($request->email); 
        if ($found){
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password]) ){
                return back()->with(['ok'=>'Login Successfuly.']); 
            }else {
                return back()->withErrors("Invalid Password"); 
            }
        }
        return back()->withErrors("Email - $request->email - dosen't exist !"); 
    }
}
