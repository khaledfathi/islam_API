<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repository\Contract\UserRepositoryContract;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public UserRepositoryContract $userProvider ; 
    public function __construct(
        UserRepositoryContract $userProvider
    )
    {
        $this->userProvider = $userProvider; 
    }

    public function index(){
        dd($this->userProvider->index()); 
        // return view('user.index'); 
    }
    public function userTable(){
        return "userTable"; 
    }
    public function productTable(){
        return "productTable"; 
    }
   
}
