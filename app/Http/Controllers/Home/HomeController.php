<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repository\Contract\UserRepositoryContract;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home.index'); 
    }
}
