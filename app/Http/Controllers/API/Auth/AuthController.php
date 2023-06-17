<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Repository\Contract\UserRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public UserRepositoryContract $userProvider; 
    public function __construct(
        UserRepositoryContract $userProvider
    ){
        $this->userProvider = $userProvider; 
    }
    public function login (Request $request){
        if (Auth::attempt(['email'=>$request->email , 'password'=>$request->password])){
            $record = $this->userProvider->showByEmail($request->email); 
            return response()->json([
                'status'=>true,
                'msg'=>'OK',
                'record'=>$record
            ]); 
        }
        return response()->json([
            'status'=>false,
            'msg'=>'Invalid Email or Password !',
        ]); 
    }
}
